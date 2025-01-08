document.addEventListener('DOMContentLoaded', function () {
    // Story Modal Elements
    const addStoryBtn = document.getElementById('addStoryButton');
    const storyModal = new bootstrap.Modal(document.getElementById('storyUploadModal'));
    const storyForm = document.getElementById('storyUploadForm');
    const storyFileInput = document.getElementById('storyFile');
    const storyDropArea = document.getElementById('storyDropArea');
    const storyPreviewContainer = document.getElementById('storyPreviewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const videoPreview = document.getElementById('videoPreview');

    // Story Viewer Modal Elements
    const storyViewerModal = document.getElementById('storyModal');
    const storyModalContent = document.getElementById('modalContent');
    const storyCloseModal = document.querySelector('.close-modal');

    // Post Modal Elements
    const fileInput = document.getElementById('fileInput');
    const postPreviewContainer = document.getElementById('imagePreviewContainer');
    const previewGrid = postPreviewContainer?.querySelector('.preview-grid');
    const dropArea = document.getElementById('dropArea');
    const postForm = document.getElementById('postForm');
    const submitButton = document.querySelector('.cmn-btn[onclick="submitPost()"]');

    // Story Viewer State Variables
    let currentStoryIndex = 0;
    let stories = [];
    let storyTimeout;

    const style = document.createElement('style');
    style.textContent = `
        .story-modal {
            position: fixed;
            inset: 0;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background: rgba(0,0,0,0.95) !important;
            z-index: 999999999;
            display: none;
        }
        .story-modal .modal-content {
            position: relative;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background: transparent !important;
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
        }
        .story-modal #modalContent {
            width: 100% !important;
            height: 100% !important;
            background: transparent !important;
        }
        .story-content {
            width: 100%;
            height: 100%;
            position: relative;
        }
        .story-content img,
        .story-content video {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }
        .close-modal {
        margin-top: 20px;
            position: fixed;
            right: 20px;
            top: 20px;
            width: 40px;
            height: 40px;
            background: rgba(0,0,0,0.5);
            border-radius: 50%;
            color: white;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 9999999999;
        }
    `;
    document.head.appendChild(style);

    // Utility Functions
    const getCsrfToken = () => {
        const metaTag = document.querySelector('meta[name="csrf-token"]');
        return metaTag ? metaTag.getAttribute('content') : '';
    };

    const isLocalStorageSupported = () => {
        try {
            localStorage.setItem('test', 'test');
            localStorage.removeItem('test');
            return true;
        } catch (e) {
            return false;
        }
    };

    // Story View Management
    const saveStoryViewStatus = (storyId) => {
        if (isLocalStorageSupported()) {
            const viewedStories = JSON.parse(localStorage.getItem('viewedStories') || '[]');
            if (!viewedStories.includes(storyId)) {
                viewedStories.push(storyId);
                localStorage.setItem('viewedStories', JSON.stringify(viewedStories));
            }
        }
    };

    const saveStoryViewStatusToServer = async (storyId) => {
        try {
            const response = await fetch('/api/story/view', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify({ story_id: storyId })
            });

            if (response.ok) {
                const data = await response.json();
                markStoryAsSeen(storyId);
            }
        } catch (error) {
            console.error('Error recording view:', error);
        }
    };

    const markStoryAsSeen = (storyId) => {
        const storyElement = document.querySelector(`[data-story-id="${storyId}"]`);
        if (storyElement) {
            const parentSlide = storyElement.closest('.single-slide');
            if (parentSlide) {
                parentSlide.classList.remove('story-unseen');
                parentSlide.classList.add('story-seen');
            }
        }
    };

    // Story Viewer Display and Navigation
    const showStory = (storyData) => {
        clearTimeout(storyTimeout);

        const contentHTML = storyData.type === 'video' ?
            `<video class="story-video" src="${storyData.media}" controls autoplay playsinline></video>` :
            `<img src="${storyData.media}" alt="story">`;

        storyModalContent.innerHTML = `
            <div class="story-content">
                ${contentHTML}
                <div class="story-overlay" style="position:absolute; inset:0; z-index:2;">
                    <div class="story-info" style="position:absolute; bottom:0; left:0; right:0; background:linear-gradient(to top, rgba(0,0,0,0.9), transparent); padding:20px;">
                        <div class="story-user" style="display:flex; align-items:center; gap:12px;">
                            <img src="${storyData.userAvatar}" alt="${storyData.username}" style="width:40px; height:40px; border-radius:50%; border:2px solid rgba(255,255,255,0.8);">
                            <span style="color:white; font-size:16px; font-weight:500;">${storyData.username}</span>
                        </div>
                    </div>
                    <div class="story-progress" style="position:absolute; top:20px; left:0; right:0; padding:12px 20px; display:flex; gap:4px; z-index:3;">
                        ${stories.map((_, index) =>
            `<div class="progress-bar ${index <= currentStoryIndex ? 'completed' : ''}" style="height:2px; flex:1; background:${index <= currentStoryIndex ? 'white' : 'rgba(255,255,255,0.3)'}; border-radius:2px;"></div>`
        ).join('')}
                    </div>
                </div>
            </div>
        `;

        saveStoryViewStatus(storyData.id);
        saveStoryViewStatusToServer(storyData.id);

        if (storyData.type === 'image') {
            storyTimeout = setTimeout(nextStory, 5000);
        } else if (storyData.type === 'video') {
            const video = storyModalContent.querySelector('video');

            video.addEventListener('loadedmetadata', () => {
                const playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.catch(error => {
                        console.error('Error playing video:', error);
                    });
                }
            });

            video.addEventListener('ended', nextStory);
            video.addEventListener('error', nextStory);
        }
    };

    const nextStory = () => {
        if (currentStoryIndex < stories.length - 1) {
            currentStoryIndex++;
            showStory(stories[currentStoryIndex]);
        } else {
            closeStoryModalFunction();
        }
    };

    const previousStory = () => {
        if (currentStoryIndex > 0) {
            currentStoryIndex--;
            showStory(stories[currentStoryIndex]);
        }
    };

    const closeStoryModalFunction = (e) => {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Hentikan semua video yang sedang diputar
        const videos = document.querySelectorAll('video');
        videos.forEach(video => {
            video.pause();
            video.currentTime = 0;
        });

        // Bersihkan video di modal
        const videoElement = storyModalContent.querySelector('video');
        if (videoElement) {
            videoElement.pause();
            videoElement.currentTime = 0;
            videoElement.src = ''; // Bersihkan sumber video
        }

        clearTimeout(storyTimeout);
        storyViewerModal.style.display = 'none';
        document.body.style.overflow = '';
        currentStoryIndex = 0;

        // Bersihkan konten modal
        storyModalContent.innerHTML = '';
    };


    // Story Upload Functions
    function resetStoryForm() {
        if (storyForm) {
            storyForm.reset();
        }
        if (storyPreviewContainer) {
            storyPreviewContainer.style.display = 'none';
        }
        if (imagePreview) {
            imagePreview.style.display = 'none';
            imagePreview.src = '';
        }
        if (videoPreview) {
            videoPreview.pause();
            videoPreview.currentTime = 0;
            videoPreview.src = '';
            videoPreview.style.display = 'none';
            videoPreview.load();
        }
    }

    function handleStoryFileSelect(e) {
        const file = e.target.files[0];
        if (!file) return;

        if (file.size > 10 * 1024 * 1024) {
            alert('File too large. Maximum size is 10MB');
            e.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            if (storyPreviewContainer) {
                storyPreviewContainer.style.display = 'block';

                if (file.type.startsWith('image/')) {
                    if (imagePreview) {
                        imagePreview.style.display = 'block';
                        videoPreview.style.display = 'none';
                        imagePreview.src = e.target.result;
                    }
                } else if (file.type.startsWith('video/')) {
                    if (videoPreview) {
                        imagePreview.style.display = 'none';
                        videoPreview.style.display = 'block';
                        videoPreview.src = e.target.result;
                    }
                }
            }
        };
        reader.readAsDataURL(file);
    }

    // Post Modal Functions
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight(e) {
        dropArea?.classList.add('drag-over');
    }

    function unhighlight(e) {
        dropArea?.classList.remove('drag-over');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handlePostFiles({ target: { files } });
    }

    function handlePostFiles(e) {
        const files = Array.from(e.target.files);

        if (files.length > 0 && previewGrid) {
            previewGrid.innerHTML = '';
            postPreviewContainer.style.display = 'block';

            files.forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'preview-image-wrapper';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'preview-image';

                        const removeBtn = document.createElement('div');
                        removeBtn.className = 'remove-image';
                        removeBtn.innerHTML = '×';
                        removeBtn.onclick = function () {
                            wrapper.remove();
                            updateFileInput(file);
                            if (previewGrid.children.length === 0) {
                                postPreviewContainer.style.display = 'none';
                            }
                        };

                        wrapper.appendChild(img);
                        wrapper.appendChild(removeBtn);
                        previewGrid.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                } else if (file.type.startsWith('video/')) {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'preview-video-wrapper';

                    const video = document.createElement('video');
                    video.src = URL.createObjectURL(file);
                    video.controls = true;
                    video.className = 'preview-video';

                    const removeBtn = document.createElement('div');
                    removeBtn.className = 'remove-video';
                    removeBtn.innerHTML = '×';
                    removeBtn.onclick = function () {
                        wrapper.remove();
                        updateFileInput(file);
                        if (previewGrid.children.length === 0) {
                            postPreviewContainer.style.display = 'none';
                        }
                    };

                    wrapper.appendChild(video);
                    wrapper.appendChild(removeBtn);
                    previewGrid.appendChild(wrapper);
                }
            });
        } else if (postPreviewContainer) {
            postPreviewContainer.style.display = 'none';
        }
    }

    function updateFileInput(fileToRemove) {
        const dt = new DataTransfer();
        const input = document.getElementById('fileInput');
        const { files } = input;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file !== fileToRemove) {
                dt.items.add(file);
            }
        }

        input.files = dt.files;
    }

    // Story Viewer Event Listeners
    document.querySelectorAll('.single-slide').forEach((story, index) => {
        story.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const storyTrigger = this.querySelector('.story-trigger');
            if (storyTrigger) {
                stories = Array.from(document.querySelectorAll('.story-trigger')).map(
                    trigger => ({
                        id: trigger.dataset.storyId,
                        media: trigger.dataset.story,
                        type: trigger.dataset.type || 'image',
                        username: trigger.dataset.username,
                        userAvatar: trigger.querySelector('img').src
                    })
                );

                currentStoryIndex = index - 1; // Adjust for "Add Story" slide
                storyViewerModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                showStory(stories[currentStoryIndex]);
            }
        });
    });

    // Story Viewer Navigation
    storyViewerModal.addEventListener('click', function (e) {
        const rect = storyModalContent.getBoundingClientRect();
        const x = e.clientX - rect.left;

        if (x < rect.width / 2) {
            previousStory();
        } else {
            nextStory();
        }
    });

    storyCloseModal.addEventListener('click', closeStoryModalFunction);

    storyViewerModal.addEventListener('click', function (e) {
        if (e.target === storyViewerModal) {
            closeStoryModalFunction(e);
        }
    });

    // Keyboard navigation for Story Viewer
    document.addEventListener('keydown', function (e) {
        if (storyViewerModal.style.display === 'flex') {
            switch (e.key) {
                case 'ArrowLeft':
                    previousStory();
                    break;
                case 'ArrowRight':
                    nextStory();
                    break;
                case 'Escape':
                    closeStoryModalFunction();
                    break;
            }
        }
    });

    // Story Upload Event Listeners
    if (addStoryBtn) {
        addStoryBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            storyModal.show();
            resetStoryForm();
        });
    }

    if (storyFileInput) {
        storyFileInput.addEventListener('change', handleStoryFileSelect);
    }

    if (storyDropArea) {
        storyDropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            storyDropArea.style.borderColor = 'var(--primary-color)';
        });

        storyDropArea.addEventListener('dragleave', () => {
            storyDropArea.style.borderColor = '';
        });

        storyDropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            storyDropArea.style.borderColor = '';

            if (e.dataTransfer.files.length) {
                storyFileInput.files = e.dataTransfer.files;
                handleStoryFileSelect({ target: storyFileInput });
            }
        });
    }

    // Story Form Submission
    if (storyForm) {
        storyForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData();
            if (storyFileInput.files[0]) {
                formData.append('media', storyFileInput.files[0]);
            } else {
                alert('Please select a file');
                return;
            }

            const caption = document.getElementById('caption');
            if (caption) {
                formData.append('caption', caption.value);
            }
            const csrf = document.querySelector('input[name="_token"]');
            if (csrf) {
                formData.append('_token', csrf.value);
            }

            try {
                const response = await fetch('/sosmed/upload-story', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    storyModal.hide();
                    resetStoryForm();
                    window.location.reload();
                } else {
                    alert(data.message || 'Error uploading story');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error uploading story');
            }
        });
    }

    // Story Modal Close Events
    const storyCloseButton = document.querySelector('#storyUploadModal .btn-close');
    if (storyCloseButton) {
        storyCloseButton.addEventListener('click', resetStoryForm);
    }

    const storyCancelButton = document.querySelector('#storyUploadModal .cmn-btn.alt');
    if (storyCancelButton) {
        storyCancelButton.addEventListener('click', resetStoryForm);
    }

    const storyModalElement = document.getElementById('storyUploadModal');
    if (storyModalElement) {
        storyModalElement.addEventListener('hidden.bs.modal', resetStoryForm);
    }

    // Post Modal Event Listeners
    if (fileInput) {
        fileInput.addEventListener('change', handlePostFiles);
    }

    if (dropArea) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        dropArea.addEventListener('drop', handleDrop, false);
    }

    // Post Submission
    if (submitButton) {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            submitPost();
        });
    }

    window.submitPost = function () {
        const content = document.getElementById('content')?.value;
        const files = fileInput?.files;

        if (!content && (!files || files.length === 0)) {
            alert('Please add content or upload files.');
            return;
        }

        const formData = new FormData();
        formData.append('content', content || '');

        if (files) {
            for (let i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

        fetch('/sosmed/post', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Post created successfully!');
                    postForm?.reset();
                    if (previewGrid) {
                        previewGrid.innerHTML = '';
                    }
                    if (postPreviewContainer) {
                        postPreviewContainer.style.display = 'none';
                    }
                    const modal = bootstrap.Modal.getInstance(document.getElementById('photoVideoMod'));
                    modal?.hide();
                    window.location.reload();
                } else {
                    alert(data.message || 'Error creating post.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while creating the post.');
            });
    };
});