@extends('main-sosmed')

@section('title', 'Beranda Sosial Media')

@section('meta_description', 'Temukan dan bagikan momen terbaik Anda di Circlehub, platform sosial media terpercaya.')

@section('meta_keywords', 'Circlehub, social media, platform sosial, berbagi momen, komunitas online')

@section('content')
    <main class="main-content">
        <div class="container sidebar-toggler">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-6 cus-z2">
                    <div class="d-inline-block d-lg-none">
                        <button class="button profile-active mb-4 mb-lg-0 d-flex align-items-center gap-2">
                            <i class="material-symbols-outlined mat-icon"> tune </i>
                            <span>My profile</span>
                        </button>
                    </div>
                    <div class="profile-sidebar cus-scrollbar p-5">
                        <div class="d-block d-lg-none position-absolute end-0 top-0">
                            <button class="button profile-close">
                                <i class="material-symbols-outlined mat-icon fs-xl"> close </i>
                            </button>
                        </div>
                        <div class="profile-pic d-flex gap-2 align-items-center">
                            <div class="avatar position-relative">
                                <img class="profile-nusatani avatar-img max-un" src="{{ $user->avatar }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1"><a href="profile-post.html">
                                        @if (isset($user))
                                            {{ $user->name }}
                                        @endif
                                    </a></h6>
                                <p class="mdtxt"><span>@</span>{{ $user->username }} </p>
                            </div>
                        </div>
                        <ul class="profile-link mt-7 mb-7 pb-7">
                            <li>
                                <a href="/sosmed" class="d-flex gap-4 active">
                                    <i class="material-symbols-outlined mat-icon"> home </i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="friend-request.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>People</span>
                                </a>
                            </li>
                            <li>
                                <a href="event.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> workspace_premium </i>
                                    <span>Event</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> perm_media </i>
                                    <span>Pages</span>
                                </a>
                            </li>
                            <li>
                                <a href="group.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> workspaces </i>
                                    <span>Group</span>
                                </a>
                            </li>
                            <li>
                                <a href="marketplace.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> store </i>
                                    <span>Marketplace</span>
                                </a>
                            </li>
                            <li>
                                <a href="saved-post.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> sync_saved_locally </i>
                                    <span>Saved</span>
                                </a>
                            </li>
                            <li>
                                <a href="favorites.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> bookmark_add </i>
                                    <span>Favorites</span>
                                </a>
                            </li>
                            <li>
                                <a href="setting.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> settings </i>
                                    <span>Settings</span>
                                </a>
                            </li>
                        </ul>
                        <div class="your-shortcuts">
                            <h6>Your shortcuts</h6>
                            <ul>
                                <li>
                                    <a href="public-profile-post.html" class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('assets/images/shortcuts-1.png') }}" alt="icon">
                                        <span>Game Community</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="public-profile-post.html" class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('assets/images/shortcuts-2.png') }}" alt="icon">
                                        <span>Pixel Think (Member)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="public-profile-post.html" class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('assets/images/shortcuts-3.png') }}" alt="icon">
                                        <span>8 Ball Pool</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="public-profile-post.html" class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('assets/images/shortcuts-4.png') }}" alt="icon">
                                        <span>Gembio</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-5 col-lg-8 mt-0 mt-lg-10 mt-xl-0 d-flex flex-column gap-7 cus-z">
                    <!-- Story Carousel with Modal -->
                    <!-- Story Carousel -->
                    <div class="story-carousel">
                        <div class="single-item">
                            <div class="single-slide">
                                <a href="#" class="position-relative d-center story-trigger">
                                    <img class="bg-img" src="{{ $user->avatar }}"
                                        alt="icon">
                                    <div class="abs-area d-grid p-3 position-absolute bottom-0">
                                        <div class="icon-box m-auto d-center mb-3">
                                            <i class="material-symbols-outlined text-center mat-icon"> add </i>
                                        </div>
                                        <span class="mdtxt">Add Story</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @foreach ($stories as $story)
                        <div class="single-slide {{ $story->is_active ? 'story-unseen' : '' }}">
                            <div class="position-relative d-flex story-trigger"
                                data-story="{{ asset($story->media_path) }}" 
                                data-username="{{ $story->user->name }}"
                                data-type="{{ $story->type }}"
                                data-views="{{ $story->viewCount() }}"
                                data-story-id="{{ $story->id }}">
                                @if($story->type == 'video')
                                    <video class="bg-img" src="{{ asset($story->media_path) }}" muted></video>
                                @else
                                    <img class="bg-img" src="{{ asset($story->media_path) }}" alt="story image">
                                @endif
                                <a href="javascript:void(0)" class="abs-area p-3 position-absolute bottom-0">
                                    <img src="{{ $story->user->avatar }}" alt="user avatar">
                                    <span class="mdtxt">{{ $story->user->name }}</span>
                                    <div class="story-views">
                                        <i class="material-symbols-outlined">visibility</i>
                                        <span>{{ $story->viewCount() }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <style>
                        .story-views {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.5);
    padding: 5px 10px;
    border-radius: 20px;
    color: white;
    display: flex;
    align-items: center;
    gap: 5px;
    cursor: pointer;
}

.viewers-modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999999999;
}

.viewers-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 90%;
    max-width: 400px;
    max-height: 80vh;
    overflow-y: auto;
}

.viewer-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.viewer-item img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}
                        .story-modal {
                            display: none;
                            position: fixed;
                            inset: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.95);
                            z-index: 999999999;
                            overflow: hidden;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }

                        .modal-content {
                            position: relative;
                            height: 100%;
                            width: 100%;
                            max-width: 500px;
                            margin: 0 auto;
                            display: flex;
                            overflow: hidden;
                        }

                        #modalContent {
                            width: 100%;
                            height: 100%;
                            overflow: hidden;
                            display: flex;
                            align-items: center;
                        }

                        #modalContent .story-content {
                            width: 100%;
                            height: 100%;
                            position: relative;
                            display: flex;
                        }

                        #modalContent img {
                            width: 100%;
                            height: 90vh;
                            object-fit: cover;
                            border-radius: 10px;
                            margin-top: 50px;
                            /* Added margin-top for desktop */
                        }

                        .close-modal {
                            position: fixed;
                            right: 20px;
                            top: 20px;
                            font-size: 28px;
                            color: #fff;
                            cursor: pointer;
                            z-index: 9999999999;
                            width: 40px;
                            height: 40px;
                            background: rgba(0, 0, 0, 0.5);
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }

                        @media (max-width: 768px) {
                            .story-modal {
                                align-items: flex-start;
                                justify-content: flex-start;
                            }

                            .modal-content {
                                width: 100%;
                                max-width: 100%;
                                margin: 0;
                                padding: 0;
                            }

                            #modalContent {
                                width: 100%;
                                height: 100%;
                            }

                            #modalContent .story-content {
                                width: 100%;
                                height: 100%;
                            }

                            #modalContent img {
                                width: 100%;
                                height: 100vh;
                                border-radius: 0;
                                margin: 0;
                                /* Reset margin for mobile */
                                object-fit: cover;
                            }
                        }

                        .single-slide .abs-area>img {
                            width: 50px;
                            height: 50px;
                            border-radius: 50%;
                            object-fit: cover;
                            border: 3px solid transparent;
                        }

                        /* Ring biru untuk story yang belum dilihat */
                        .single-slide.story-unseen .abs-area>img {
                            border-color: #00ff48;
                            /* Warna biru Facebook */
                            box-shadow: 0 0 0 3px rgba(40, 135, 52, 0.2);
                            /* Efek glow tambahan */
                            animation: pulse-ring 1.5s infinite;
                            /* Animasi berkedip */
                        }

                        /* Animasi pulse ring */
                        @keyframes pulse-ring {
                            0% {
                                box-shadow: 0 0 0 0 rgba(11, 93, 11, 0.4);
                            }

                            70% {
                                box-shadow: 0 0 0 10px rgba(24, 119, 242, 0);
                            }

                            100% {
                                box-shadow: 0 0 0 0 rgba(24, 119, 242, 0);
                            }
                        }

                        /* Untuk story yang sudah dilihat */
                        .single-slide.story-seen .abs-area>img {
                            border-color: #8E8E8E;
                            /* Warna abu-abu untuk story yang sudah dilihat */
                            box-shadow: none;
                            animation: none;
                        }
                    </style>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                        const modal = document.getElementById('storyModal');
                        const modalContent = document.getElementById('modalContent');
                        const closeModal = document.querySelector('.close-modal');
                        let currentStoryIndex = 0;
                        let stories = [];
                        let storyTimeout;

                        // Fungsi untuk memeriksa dukungan localStorage
                        const isLocalStorageSupported = () => {
                            try {
                                localStorage.setItem('test', 'test');
                                localStorage.removeItem('test');
                                return true;
                            } catch (e) {
                                return false;
                            }
                        };

                        // Fungsi untuk menyimpan status story yang sudah dilihat
                        const saveStoryViewStatus = (storyId) => {
                            if (isLocalStorageSupported()) {
                                const viewedStories = JSON.parse(localStorage.getItem('viewedStories') || '[]');
                                if (!viewedStories.includes(storyId)) {
                                    viewedStories.push(storyId);
                                    localStorage.setItem('viewedStories', JSON.stringify(viewedStories));
                                }
                            }
                        };

                        // Fungsi untuk memeriksa status story yang sudah dilihat
                        const isStoryViewed = (storyId) => {
                            if (isLocalStorageSupported()) {
                                const viewedStories = JSON.parse(localStorage.getItem('viewedStories') || '[]');
                                return viewedStories.includes(storyId);
                            }
                            return false;
                        };

                        // Fungsi untuk mencatat view ke database
                        const recordView = async (storyId) => {
                            try {
                                const response = await fetch('/api/story/view', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                    },
                                    body: JSON.stringify({ story_id: storyId })
                                });
                                const data = await response.json();
                                if (data.success) {
                                    updateViewCount(storyId, data.viewCount);
                                }
                            } catch (error) {
                                console.error('Error recording view:', error);
                            }
                        };

                        // Fungsi untuk menampilkan daftar viewers
                        const showViewers = async (storyId) => {
                            try {
                                const response = await fetch(`/api/story/${storyId}/viewers`);
                                const viewers = await response.json();
                                
                                const viewersHTML = viewers.map(viewer => `
                                    <div class="viewer-item">
                                        <img src="${viewer.avatar}" alt="${viewer.name}">
                                        <div class="viewer-info">
                                            <span class="viewer-name">${viewer.name}</span>
                                            <span class="viewer-time">${viewer.viewed_at}</span>
                                        </div>
                                    </div>
                                `).join('');

                                const viewersModal = document.createElement('div');
                                viewersModal.className = 'viewers-modal';
                                viewersModal.innerHTML = `
                                    <div class="viewers-content">
                                        <h4>Story Views</h4>
                                        <div class="viewers-count">${viewers.length} views</div>
                                        <div class="viewers-list">
                                            ${viewersHTML}
                                        </div>
                                        <button class="close-viewers" onclick="this.parentElement.parentElement.remove()">Close</button>
                                    </div>
                                `;
                                document.body.appendChild(viewersModal);

                                // Event listener untuk menutup modal viewers
                                const closeViewers = viewersModal.querySelector('.close-viewers');
                                closeViewers.addEventListener('click', () => viewersModal.remove());

                                // Tutup ketika klik di luar modal
                                viewersModal.addEventListener('click', (e) => {
                                    if (e.target === viewersModal) {
                                        viewersModal.remove();
                                    }
                                });
                            } catch (error) {
                                console.error('Error fetching viewers:', error);
                            }
                        };

                        // Fungsi untuk update jumlah views
                        const updateViewCount = (storyId, count) => {
                            const storyElement = document.querySelector(`[data-story-id="${storyId}"]`);
                            if (storyElement) {
                                const viewsElement = storyElement.querySelector('.story-views span');
                                if (viewsElement) {
                                    viewsElement.textContent = count;
                                }
                            }
                        };

                        // Fungsi untuk menampilkan story
                        const showStory = (storyData) => {
                            clearTimeout(storyTimeout);

                            const contentHTML = storyData.type === 'video' 
                                ? `<video src="${storyData.media}" controls autoplay></video>`
                                : `<img src="${storyData.media}" alt="story">`;

                            modalContent.innerHTML = `
                                <div class="story-content">
                                    ${contentHTML}
                                    <div class="story-info">
                                        <div class="story-user">
                                            <img src="${storyData.userAvatar}" alt="${storyData.username}">
                                            <span>${storyData.username}</span>
                                        </div>
                                        <div class="story-views" onclick="showViewers(${storyData.id})">
                                            <i class="material-symbols-outlined">visibility</i>
                                            <span>${storyData.viewCount} views</span>
                                        </div>
                                    </div>
                                    <div class="story-progress">
                                        ${stories.map((_, index) => 
                                            `<div class="progress-bar ${index < currentStoryIndex ? 'completed' : ''}"></div>`
                                        ).join('')}
                                    </div>
                                </div>
                            `;

                            // Rekam view
                            recordView(storyData.id);
                            saveStoryViewStatus(storyData.id);

                            // Set timeout untuk next story
                            if (storyData.type === 'image') {
                                storyTimeout = setTimeout(nextStory, 5000);
                            }

                            // Handle video events jika type adalah video
                            if (storyData.type === 'video') {
                                const video = modalContent.querySelector('video');
                                video.addEventListener('ended', nextStory);
                            }
                        };

                        // Fungsi untuk next story
                        const nextStory = () => {
                            if (currentStoryIndex < stories.length - 1) {
                                currentStoryIndex++;
                                showStory(stories[currentStoryIndex]);
                            } else {
                                closeModalFunction();
                            }
                        };

                        // Fungsi untuk previous story
                        const previousStory = () => {
                            if (currentStoryIndex > 0) {
                                currentStoryIndex--;
                                showStory(stories[currentStoryIndex]);
                            }
                        };

                        // Fungsi untuk menutup modal
                        const closeModalFunction = (e) => {
                            if (e) {
                                e.preventDefault();
                                e.stopPropagation();
                            }
                            clearTimeout(storyTimeout);
                            modal.style.display = 'none';
                            document.body.style.overflow = '';
                            currentStoryIndex = 0;
                        };

                        // Event listener untuk story click
                        document.querySelectorAll('.single-slide').forEach((story, index) => {
                            story.addEventListener('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();

                                // Check jika ini adalah tombol "Add Story"
                                if (this.querySelector('.icon-box')) {
                                    // Implementasi Add Story
                                    const input = document.createElement('input');
                                    input.type = 'file';
                                    input.accept = 'image/*,video/*';
                                    input.onchange = function(e) {
                                        const file = e.target.files[0];
                                        if (file) {
                                            const formData = new FormData();
                                            formData.append('media', file);
                                            // Implementasi upload story
                                            // ...
                                        }
                                    };
                                    input.click();
                                    return;
                                }

                                const storyTrigger = this.querySelector('.story-trigger');
                                if (storyTrigger) {
                                    stories = Array.from(document.querySelectorAll('.story-trigger')).map(trigger => ({
                                        id: trigger.dataset.storyId,
                                        media: trigger.dataset.story,
                                        type: trigger.dataset.type || 'image',
                                        username: trigger.dataset.username,
                                        userAvatar: trigger.querySelector('img').src,
                                        viewCount: trigger.dataset.views || 0
                                    }));

                                    currentStoryIndex = index - 1; // -1 karena index 0 adalah "Add Story"
                                    modal.style.display = 'flex';
                                    document.body.style.overflow = 'hidden';
                                    showStory(stories[currentStoryIndex]);
                                }
                            });
                        });

                        // Event listeners untuk navigasi story
                        modal.addEventListener('click', function(e) {
                            const rect = modalContent.getBoundingClientRect();
                            const x = e.clientX - rect.left;
                            
                            if (x < rect.width / 2) {
                                previousStory();
                            } else {
                                nextStory();
                            }
                        });

                        // Event listeners untuk close modal
                        closeModal.addEventListener('click', closeModalFunction);
                        modal.addEventListener('click', function(e) {
                            if (e.target === modal) {
                                closeModalFunction(e);
                            }
                        });

                        // Keyboard navigation
                        document.addEventListener('keydown', function(e) {
                            if (modal.style.display === 'flex') {
                                switch(e.key) {
                                    case 'ArrowLeft':
                                        previousStory();
                                        break;
                                    case 'ArrowRight':
                                        nextStory();
                                        break;
                                    case 'Escape':
                                        closeModalFunction();
                                        break;
                                }
                            }
                        });
                    });
                    </script>
                    <div class="share-post d-flex gap-3 gap-sm-5 p-3 p-sm-5">
                        <div class="profile-box">
                            <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un"
                                    alt="icon"></a>
                        </div>
                        <form action="#" class="w-100 position-relative">
                            <textarea cols="10" rows="2" placeholder="Write something to Lerio.."></textarea>
                            <div class="abs-area position-absolute d-none d-sm-block">
                                <i class="material-symbols-outlined mat-icon xxltxt"> sentiment_satisfied </i>
                            </div>
                            <ul class="d-flex justify-content-between flex-wrap mt-3 gap-3">
                                <li class="d-flex align-items-center gap-2" data-bs-toggle="modal"
                                    data-bs-target="#goLiveMod">
                                    <img src="{{ asset('assets/images/icon/live-video.png') }}" class="max-un"
                                        alt="icon">
                                    <span>Live</span>
                                </li>
                                <li class="d-flex align-items-center gap-2" data-bs-toggle="modal"
                                    data-bs-target="#photoVideoMod">
                                    <img src="{{ asset('assets/images/icon/vgallery.png') }}" class="max-un"
                                        alt="icon">
                                    <span>Photo/Video</span>
                                </li>
                                <li class="d-flex align-items-center gap-2" data-bs-toggle="modal"
                                    data-bs-target="#activityMod">
                                    <img src="{{ asset('assets/images/icon/emoji-laughing.png') }}" class="max-un"
                                        alt="icon">
                                    <span>Fallings/Activity</span>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="post-item d-flex flex-column gap-5 gap-md-7" id="news-feed">
                        <div class="post-single-box p-3 p-sm-5">
                            <div class="top-area pb-5">
                                <div class="profile-area d-center justify-content-between">
                                    <div class="avatar-item d-flex gap-3 align-items-center">
                                        <div class="avatar position-relative">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                        </div>
                                        <div class="info-area">
                                            <h6 class="m-0"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                            <span class="mdtxt status">Active</span>
                                        </div>
                                    </div>
                                    <div class="btn-group cus-dropdown">
                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                        </button>
                                        <ul class="dropdown-menu p-4 pt-2">
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> bookmark_add </i>
                                                    <span>Saved Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                    <span>Unfollow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                    <span>Hide Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                                    <span>Block</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> flag </i>
                                                    <span>Report Post</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="description">I created Roughly plugin to sketch crafted hand-drawn elements
                                        which can be used to any usage (diagrams/flows/decoration/etc)</p>
                                </div>
                                <div class="post-img">
                                    <img src="{{ asset('assets/images/post-img-1.png') }}" class="w-100"
                                        alt="image">
                                </div>
                            </div>
                            <div class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                <div class="friends-list d-flex gap-3 align-items-center text-center">
                                    <ul class="d-flex align-items-center justify-content-center">
                                        <li><img src="{{ asset('assets/images/avatar-2.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-3.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-4.png') }}" alt="image"></li>
                                        <li><span class="mdtxt d-center">8+</span></li>
                                    </ul>
                                </div>
                                <div class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                    <button class="mdtxt">4 Comments</button>
                                    <button class="mdtxt">1 Shares</button>
                                </div>
                            </div>
                            <div class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> favorite </i>
                                    Like
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> chat </i>
                                    Comment
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                    Share
                                </button>
                            </div>
                            <form action="#">
                                <div class="d-flex mt-5 gap-3">
                                    <div class="profile-box d-none d-xxl-block">
                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}"
                                                class="max-un" alt="icon"></a>
                                    </div>
                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                        <input placeholder="Write a comment..">
                                        <div class="file-input d-flex gap-1 gap-md-2">
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            gif_box </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            perm_media </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="mood-area">
                                                <span class="material-symbols-outlined mat-icon m-0 xxltxt"> mood </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="btn-area d-flex">
                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="post-single-box p-3 p-sm-5">
                            <div class="top-area pb-5">
                                <div class="profile-area d-center justify-content-between">
                                    <div class="avatar-item d-flex gap-3 align-items-center">
                                        <div class="avatar position-relative">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                        </div>
                                        <div class="info-area">
                                            <h6 class="m-0"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                            <span class="mdtxt status">Active</span>
                                        </div>
                                    </div>
                                    <div class="btn-group cus-dropdown">
                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                        </button>
                                        <ul class="dropdown-menu p-4 pt-2">
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> bookmark_add </i>
                                                    <span>Saved Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                    <span>Unfollow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                    <span>Hide Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                                    <span>Block</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> flag </i>
                                                    <span>Report Post</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="description">I created Roughly plugin to sketch crafted hand-drawn elements
                                        which can be used to any usage (diagrams/flows/decoration/etc)</p>
                                </div>
                                <div class="post-img  d-flex justify-content-between flex-wrap gap-2 gap-lg-3">
                                    <div class="single">
                                        <img src="{{ asset('assets/images/post-img-2.png') }}" alt="image">
                                    </div>
                                    <div class="single d-grid gap-3">
                                        <img src="{{ asset('assets/images/post-img-3.png') }}" alt="image">
                                        <img src="{{ asset('assets/images/post-img-4.png') }}" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                <div class="friends-list d-flex gap-3 align-items-center text-center">
                                    <ul class="d-flex align-items-center justify-content-center">
                                        <li><img src="{{ asset('assets/images/avatar-2.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-3.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-4.png') }}" alt="image"></li>
                                        <li><span class="mdtxt d-center">8+</span></li>
                                    </ul>
                                </div>
                                <div class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                    <button class="mdtxt">4 Comments</button>
                                    <button class="mdtxt">1 Shares</button>
                                </div>
                            </div>
                            <div class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> favorite </i>
                                    Like
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> chat </i>
                                    Comment
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                    Share
                                </button>
                            </div>
                            <form action="#">
                                <div class="d-flex mt-5 gap-3">
                                    <div class="profile-box d-none d-xxl-block">
                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}"
                                                class="max-un" alt="icon"></a>
                                    </div>
                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                        <input placeholder="Write a comment..">
                                        <div class="file-input d-flex gap-1 gap-md-2">
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            gif_box </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            perm_media </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="mood-area">
                                                <span class="material-symbols-outlined mat-icon m-0 xxltxt"> mood </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="btn-area d-flex">
                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="comments-area mt-5">
                                <div class="single-comment-area ms-1 ms-xxl-15">
                                    <div class="parent-comment d-flex gap-2 gap-sm-4">
                                        <div class="avatar-item d-center align-items-baseline">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                        </div>
                                        <div class="info-item">
                                            <div
                                                class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                <div class="title-area">
                                                    <h6 class="m-0 mb-3"><a href="public-profile-post.html">Lori
                                                            Cortez</a></h6>
                                                    <p class="mdtxt">The only way to solve the problem is to code for the
                                                        hardware directly</p>
                                                </div>
                                                <div class="btn-group dropend cus-dropdown">
                                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                    </button>
                                                    <ul class="dropdown-menu p-4 pt-2">
                                                        <li>
                                                            <a class="droplist d-flex align-items-center gap-2"
                                                                href="#">
                                                                <i class="material-symbols-outlined mat-icon"> hide_source
                                                                </i>
                                                                <span>Hide Comments</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="droplist d-flex align-items-center gap-2"
                                                                href="#">
                                                                <i class="material-symbols-outlined mat-icon"> flag </i>
                                                                <span>Report Comments</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="like-share d-flex gap-6 mt-2">
                                                <li class="d-center">
                                                    <button class="mdtxt">Like</button>
                                                </li>
                                                <li class="d-center flex-column">
                                                    <button class="mdtxt reply-btn">Reply</button>
                                                </li>
                                                <li class="d-center">
                                                    <button class="mdtxt">Share</button>
                                                </li>
                                            </ul>
                                            <form action="#" class="comment-form">
                                                <div class="d-flex gap-3">
                                                    <input placeholder="Write a comment.." class="py-3">
                                                    <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                        <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me
                                                        </i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="single-comment-area comment-item-nested mt-4 mt-sm-7 ms-13 ms-sm-15">
                                        <div class="d-flex gap-2 gap-sm-4 align-items-baseline">
                                            <div class="avatar-item">
                                                <img class="avatar-img max-un"
                                                    src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                            </div>
                                            <div class="info-item">
                                                <div
                                                    class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                    <div class="title-area">
                                                        <h6 class="m-0 mb-3"><a href="public-profile-post.html">Alex</a>
                                                        </h6>
                                                        <p class="mdtxt">The only way to solve the</p>
                                                    </div>
                                                    <div class="btn-group dropend cus-dropdown">
                                                        <button type="button" class="dropdown-btn"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz
                                                            </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2"
                                                                    href="#">
                                                                    <i class="material-symbols-outlined mat-icon">
                                                                        hide_source </i>
                                                                    <span>Hide Comments</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2"
                                                                    href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> flag
                                                                    </i>
                                                                    <span>Report Comments</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="like-share d-flex gap-6 mt-2">
                                                    <li class="d-center">
                                                        <button class="mdtxt">Like</button>
                                                    </li>
                                                    <li class="d-center flex-column">
                                                        <button class="mdtxt reply-btn">Reply</button>
                                                    </li>
                                                    <li class="d-center">
                                                        <button class="mdtxt">Share</button>
                                                    </li>
                                                </ul>
                                                <form action="#" class="comment-form">
                                                    <div class="d-flex gap-3">
                                                        <input placeholder="Write a comment.." class="py-3">
                                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl">
                                                                near_me </i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-single-box p-3 p-sm-5">
                            <div class="top-area pb-5">
                                <div class="profile-area d-center justify-content-between">
                                    <div class="avatar-item d-flex gap-3 align-items-center">
                                        <div class="avatar-item">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-5.png') }}" alt="avatar">
                                        </div>
                                        <div class="info-area">
                                            <h6 class="m-0"><a href="public-profile-post.html">Loprayos</a></h6>
                                            <span class="mdtxt status">20m Ago</span>
                                        </div>
                                    </div>
                                    <div class="btn-group cus-dropdown">
                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                        </button>
                                        <ul class="dropdown-menu p-4 pt-2">
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> bookmark_add </i>
                                                    <span>Saved Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                    <span>Unfollow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                    <span>Hide Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                                    <span>Block</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> flag </i>
                                                    <span>Report Post</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="description">Nam ornare a nibh id sagittis. Vestibulum nec molestie urna,
                                        eget convallis mi. Vestibulum rhoncus ligula eget sem sollicitudin interdum. Aliquam
                                        massa lectus, fringilla non diam ut, laoreet convallis risus. Curabitur at metus
                                        imperdiet, pellentesque ligula vel,</p>
                                </div>
                            </div>
                            <div class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                <div class="friends-list d-flex gap-3 align-items-center text-center">
                                    <ul class="d-flex align-items-center justify-content-center">
                                        <li><img src="{{ asset('assets/images/avatar-2.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-3.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-4.png') }}" alt="image"></li>
                                        <li><span class="mdtxt d-center">8+</span></li>
                                    </ul>
                                </div>
                                <div class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                    <button class="mdtxt">4 Comments</button>
                                    <button class="mdtxt">1 Shares</button>
                                </div>
                            </div>
                            <div class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> favorite </i>
                                    Like
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> chat </i>
                                    Comment
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                    Share
                                </button>
                            </div>
                            <form action="#">
                                <div class="d-flex mt-5 gap-3">
                                    <div class="profile-box d-none d-xxl-block">
                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}"
                                                class="max-un" alt="icon"></a>
                                    </div>
                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                        <input placeholder="Write a comment..">
                                        <div class="file-input d-flex gap-1 gap-md-2">
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            gif_box </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            perm_media </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="mood-area">
                                                <span class="material-symbols-outlined mat-icon m-0 xxltxt"> mood </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="btn-area d-flex">
                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="comments-area mt-5">
                                <div class="single-comment-area ms-1 ms-xxl-15">
                                    <div class="parent-comment d-flex gap-2 gap-sm-4">
                                        <div class="avatar-item d-center align-items-baseline">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                        </div>
                                        <div class="info-item active">
                                            <div
                                                class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                <div class="title-area">
                                                    <h6 class="m-0 mb-3"><a href="public-profile-post.html">Lori
                                                            Cortez</a></h6>
                                                    <p class="mdtxt">The only way to solve the problem is to code for the
                                                        hardware directly</p>
                                                </div>
                                                <div class="btn-group dropend cus-dropdown">
                                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                    </button>
                                                    <ul class="dropdown-menu p-4 pt-2">
                                                        <li>
                                                            <a class="droplist d-flex align-items-center gap-2"
                                                                href="#">
                                                                <i class="material-symbols-outlined mat-icon"> hide_source
                                                                </i>
                                                                <span>Hide Comments</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="droplist d-flex align-items-center gap-2"
                                                                href="#">
                                                                <i class="material-symbols-outlined mat-icon"> flag </i>
                                                                <span>Report Comments</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="like-share d-flex gap-6 mt-2">
                                                <li class="d-center">
                                                    <button class="mdtxt">Like</button>
                                                </li>
                                                <li class="d-center flex-column">
                                                    <button class="mdtxt reply-btn">Reply</button>
                                                </li>
                                                <li class="d-center">
                                                    <button class="mdtxt">Share</button>
                                                </li>
                                            </ul>
                                            <form action="#" class="comment-form">
                                                <div class="d-flex gap-3">
                                                    <input placeholder="Write a comment.." class="py-3">
                                                    <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                        <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me
                                                        </i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div
                                        class="sibling-comment comment-item-nested single-comment-area mt-7 ms-13 ms-sm-15">
                                        <div class="d-flex gap-2 gap-sm-4 align-items-baseline">
                                            <div class="avatar-item">
                                                <img class="avatar-img max-un"
                                                    src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                            </div>
                                            <div class="info-item">
                                                <div
                                                    class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                    <div class="title-area">
                                                        <h6 class="m-0 mb-3"><a href="public-profile-post.html">Alexa</a>
                                                        </h6>
                                                        <p class="mdtxt">The only way to solve the</p>
                                                    </div>
                                                    <div class="btn-group dropend cus-dropdown">
                                                        <button type="button" class="dropdown-btn"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz
                                                            </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2"
                                                                    href="#">
                                                                    <i class="material-symbols-outlined mat-icon">
                                                                        hide_source </i>
                                                                    <span>Hide Comments</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2"
                                                                    href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> flag
                                                                    </i>
                                                                    <span>Report Comments</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="like-share d-flex gap-6 mt-2">
                                                    <li class="d-center">
                                                        <button class="mdtxt">Like</button>
                                                    </li>
                                                    <li class="d-center flex-column">
                                                        <button class="mdtxt reply-btn">Reply</button>
                                                    </li>
                                                    <li class="d-center">
                                                        <button class="mdtxt">Share</button>
                                                    </li>
                                                </ul>
                                                <form action="#" class="comment-form">
                                                    <div class="d-flex gap-3">
                                                        <input placeholder="Write a comment.." class="py-3">
                                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl">
                                                                near_me </i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-comment-area comment-item-nested mt-7 ms-13 ms-sm-15">
                                        <div class="d-flex gap-2 gap-sm-4 align-items-baseline">
                                            <div class="avatar-item">
                                                <img class="avatar-img max-un"
                                                    src="{{ asset('assets/images/avatar-7.png') }}" alt="avatar">
                                            </div>
                                            <div class="info-item">
                                                <div
                                                    class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                    <div class="title-area">
                                                        <h6 class="m-0 mb-3"><a
                                                                href="public-profile-post.html">Haplika</a></h6>
                                                        <p class="mdtxt">The only way to solve the</p>
                                                    </div>
                                                    <div class="btn-group dropend cus-dropdown">
                                                        <button type="button" class="dropdown-btn"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz
                                                            </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2"
                                                                    href="#">
                                                                    <i class="material-symbols-outlined mat-icon">
                                                                        hide_source </i>
                                                                    <span>Hide Comments</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2"
                                                                    href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> flag
                                                                    </i>
                                                                    <span>Report Comments</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="like-share d-flex gap-6 mt-2">
                                                    <li class="d-center">
                                                        <button class="mdtxt">Like</button>
                                                    </li>
                                                    <li class="d-center flex-column">
                                                        <button class="mdtxt reply-btn">Reply</button>
                                                    </li>
                                                    <li class="d-center">
                                                        <button class="mdtxt">Share</button>
                                                    </li>
                                                </ul>
                                                <form action="#" class="comment-form">
                                                    <div class="d-flex gap-3">
                                                        <input placeholder="Write a comment.." class="py-3">
                                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl">
                                                                near_me </i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comments-area mt-5">
                                <div class="single-comment-area ms-1 ms-xxl-15">
                                    <div class="d-flex gap-4">
                                        <div class="avatar-item d-center align-items-baseline">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                        </div>
                                        <div class="info-item w-100">
                                            <div
                                                class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                <div class="title-area">
                                                    <h6 class="m-0 mb-3"><a href="public-profile-post.html">Marlio</a>
                                                    </h6>
                                                    <div class="post-img">
                                                        <img src="{{ asset('assets/images/icon/emoji-love-2.png') }}"
                                                            alt="icon">
                                                    </div>
                                                </div>
                                                <div class="btn-group dropend cus-dropdown">
                                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                    </button>
                                                    <ul class="dropdown-menu p-4 pt-2">
                                                        <li>
                                                            <a class="droplist d-flex align-items-center gap-2"
                                                                href="#">
                                                                <i class="material-symbols-outlined mat-icon"> hide_source
                                                                </i>
                                                                <span>Hide Comments</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="droplist d-flex align-items-center gap-2"
                                                                href="#">
                                                                <i class="material-symbols-outlined mat-icon"> flag </i>
                                                                <span>Report Comments</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="like-share d-flex gap-6 mt-2">
                                                <li class="d-center">
                                                    <button class="mdtxt">Like</button>
                                                </li>
                                                <li class="d-center flex-column">
                                                    <button class="mdtxt reply-btn">Reply</button>
                                                </li>
                                                <li class="d-center">
                                                    <button class="mdtxt">Share</button>
                                                </li>
                                            </ul>
                                            <form action="#" class="comment-form">
                                                <div class="d-flex gap-3">
                                                    <input placeholder="Write a comment.." class="py-3">
                                                    <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                        <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me
                                                        </i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-single-box p-3 p-sm-5">
                            <div class="top-area pb-5">
                                <div class="profile-area d-center justify-content-between">
                                    <div class="avatar-item d-flex gap-3 align-items-center">
                                        <div class="avatar position-relative">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                        </div>
                                        <div class="info-area">
                                            <h6 class="m-0"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                            <span class="mdtxt status">Active</span>
                                        </div>
                                    </div>
                                    <div class="btn-group cus-dropdown">
                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                        </button>
                                        <ul class="dropdown-menu p-4 pt-2">
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> bookmark_add </i>
                                                    <span>Saved Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                    <span>Unfollow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                    <span>Hide Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                                    <span>Block</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> flag </i>
                                                    <span>Report Post</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="description">My Travel Video</p>
                                    <p class="hastag d-flex gap-2">
                                        <a href="#">#Viral</a>
                                        <a href="#">#travel</a>
                                    </p>
                                </div>
                                <div class="post-img video-item">
                                    <div class="plyr__video-embed player">
                                        <iframe src="https://www.youtube.com/embed/LXb3EKWsInQ"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                <div class="friends-list d-flex gap-3 align-items-center text-center">
                                    <ul class="d-flex align-items-center justify-content-center">
                                        <li><img src="{{ asset('assets/images/avatar-2.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-3.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-4.png') }}" alt="image"></li>
                                        <li><span class="mdtxt d-center">8+</span></li>
                                    </ul>
                                </div>
                                <div class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                    <button class="mdtxt">4 Comments</button>
                                    <button class="mdtxt">1 Shares</button>
                                </div>
                            </div>
                            <div class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> favorite </i>
                                    Like
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> chat </i>
                                    Comment
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                    Share
                                </button>
                            </div>
                            <form action="#">
                                <div class="d-flex mt-5 gap-3">
                                    <div class="profile-box d-none d-xxl-block">
                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}"
                                                class="max-un" alt="icon"></a>
                                    </div>
                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                        <input placeholder="Write a comment..">
                                        <div class="file-input d-flex gap-1 gap-md-2">
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            gif_box </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            perm_media </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="mood-area">
                                                <span class="material-symbols-outlined mat-icon m-0 xxltxt"> mood </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="btn-area d-flex">
                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="post-single-box p-3 p-sm-5">
                            <div class="top-area pb-5">
                                <div class="profile-area d-center justify-content-between">
                                    <div class="avatar-item d-flex gap-3 align-items-center">
                                        <div class="avatar position-relative">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                        </div>
                                        <div class="info-area">
                                            <h6 class="m-0"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                            <span class="mdtxt status">Active</span>
                                        </div>
                                    </div>
                                    <div class="btn-group cus-dropdown">
                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                        </button>
                                        <ul class="dropdown-menu p-4 pt-2">
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> bookmark_add </i>
                                                    <span>Saved Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                    <span>Unfollow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                    <span>Hide Post</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                                    <span>Block</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                    <i class="material-symbols-outlined mat-icon"> flag </i>
                                                    <span>Report Post</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="description">I created Roughly plugin to sketch crafted hand-drawn elements
                                        which can be used to any usage (diagrams/flows/decoration/etc)</p>
                                </div>
                                <div class="post-img">
                                    <img src="{{ asset('assets/images/post-img-1.png') }}" class="w-100"
                                        alt="image">
                                </div>
                            </div>
                            <div class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                <div class="friends-list d-flex gap-3 align-items-center text-center">
                                    <ul class="d-flex align-items-center justify-content-center">
                                        <li><img src="{{ asset('assets/images/avatar-2.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-3.png') }}" alt="image"></li>
                                        <li><img src="{{ asset('assets/images/avatar-4.png') }}" alt="image"></li>
                                        <li><span class="mdtxt d-center">8+</span></li>
                                    </ul>
                                </div>
                                <div class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                    <button class="mdtxt">4 Comments</button>
                                    <button class="mdtxt">1 Shares</button>
                                </div>
                            </div>
                            <div class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> favorite </i>
                                    Like
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> chat </i>
                                    Comment
                                </button>
                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                    Share
                                </button>
                            </div>
                            <form action="#">
                                <div class="d-flex mt-5 gap-3">
                                    <div class="profile-box d-none d-xxl-block">
                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}"
                                                class="max-un" alt="icon"></a>
                                    </div>
                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                        <input placeholder="Write a comment..">
                                        <div class="file-input d-flex gap-1 gap-md-2">
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            gif_box </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="file-upload">
                                                <label class="file">
                                                    <input type="file">
                                                    <span class="file-custom border-0 d-grid text-center">
                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                            perm_media </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="mood-area">
                                                <span class="material-symbols-outlined mat-icon m-0 xxltxt"> mood </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="btn-area d-flex">
                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-6 mt-5 mt-xl-0">
                    <div class="cus-overflow cus-scrollbar sidebar-head">
                        <div class="d-flex justify-content-end">
                            <div class="d-block d-xl-none me-4">
                                <button class="button toggler-btn mb-4 mb-lg-0 d-flex align-items-center gap-2">
                                    <span>My List</span>
                                    <i class="material-symbols-outlined mat-icon"> tune </i>
                                </button>
                            </div>
                        </div>
                        <div class="cus-scrollbar side-wrapper">
                            <div class="sidebar-wrapper d-flex flex-column gap-6">
                                <div class="sidebar-area p-5">
                                    <div class=" mb-4">
                                        <h6 class="d-inline-flex position-relative">
                                            Request
                                            <span class="mdtxt abs-area d-center position-absolute">2</span>
                                        </h6>
                                    </div>
                                    <div class="d-grid gap-6">
                                        <div class="single-single">
                                            <div class="profile-pic d-flex gap-3 align-items-center">
                                                <div class="avatar">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                                </div>
                                                <div class="text-area">
                                                    <a href="public-profile-post.html">
                                                        <h6 class="m-0">Lerio Mao</h6>
                                                    </a>
                                                    <div class="friends-list d-flex gap-3 align-items-center text-center">
                                                        <ul class="d-flex align-items-center justify-content-center">
                                                            <li><img src="{{ asset('assets/images/avatar-2.png') }}"
                                                                    alt="image"></li>
                                                            <li><img src="{{ asset('assets/images/avatar-3.png') }}"
                                                                    alt="image"></li>
                                                            <li><img src="{{ asset('assets/images/avatar-4.png') }}"
                                                                    alt="image"></li>
                                                        </ul>
                                                        <span class="mdtxt d-center">10 mutual friends</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-3 mt-4">
                                                <button class="cmn-btn">Confirm</button>
                                                <button class="cmn-btn alt">Delete</button>
                                            </div>
                                        </div>
                                        <div class="single-single">
                                            <div class="profile-pic d-flex gap-3 align-items-center">
                                                <div class="avatar">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-5.png') }}" alt="avatar">
                                                </div>
                                                <div class="text-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html">Marinez</a></h6>
                                                    <div class="friends-list d-flex gap-3 align-items-center text-center">
                                                        <ul class="d-flex align-items-center justify-content-center">
                                                            <li><img src="{{ asset('assets/images/avatar-2.png') }}"
                                                                    alt="image"></li>
                                                            <li><img src="{{ asset('assets/images/avatar-3.png') }}"
                                                                    alt="image"></li>
                                                            <li><img src="{{ asset('assets/images/avatar-4.png') }}"
                                                                    alt="image"></li>
                                                        </ul>
                                                        <span class="mdtxt d-center">10 mutual friends</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-3 mt-4">
                                                <button class="cmn-btn">Confirm</button>
                                                <button class="cmn-btn alt">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-area p-5">
                                    <div class="mb-4">
                                        <h6 class="d-inline-flex">
                                            Contact
                                        </h6>
                                    </div>
                                    <div class="d-flex flex-column gap-6">
                                        <div
                                            class="profile-area d-center position-relative align-items-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-6.png') }}" alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Piter Maio</a></h6>
                                                </div>
                                            </div>
                                            <span class="mdtxt abs-area d-center position-absolute end-0">5</span>
                                        </div>
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-7.png') }}" alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Floyd Miles</a></h6>
                                                </div>
                                            </div>
                                            <div class="btn-group cus-dropdown dropend">
                                                <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                </button>
                                                <ul class="dropdown-menu p-4 pt-2">
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> person_remove
                                                            </i>
                                                            <span>Unfollow</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                            <span>Hide Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-8.png') }}" alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Darrell Steward</a></h6>
                                                </div>
                                            </div>
                                            <div class="btn-group cus-dropdown dropend">
                                                <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                </button>
                                                <ul class="dropdown-menu p-4 pt-2">
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> person_remove
                                                            </i>
                                                            <span>Unfollow</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                            <span>Hide Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Kristin Watson</a></h6>
                                                </div>
                                            </div>
                                            <div class="btn-group cus-dropdown dropend">
                                                <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                </button>
                                                <ul class="dropdown-menu p-4 pt-2">
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> person_remove
                                                            </i>
                                                            <span>Unfollow</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                            <span>Hide Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Jane Cooper</a></h6>
                                                </div>
                                            </div>
                                            <div class="btn-group cus-dropdown dropend">
                                                <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                </button>
                                                <ul class="dropdown-menu p-4 pt-2">
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> person_remove
                                                            </i>
                                                            <span>Unfollow</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> hide_source
                                                            </i>
                                                            <span>Hide Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Devon Lane</a></h6>
                                                </div>
                                            </div>
                                            <div class="btn-group cus-dropdown dropend">
                                                <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                </button>
                                                <ul class="dropdown-menu p-4 pt-2">
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> person_remove
                                                            </i>
                                                            <span>Unfollow</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> hide_source
                                                            </i>
                                                            <span>Hide Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-9.png') }}" alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Annette Black</a></h6>
                                                </div>
                                            </div>
                                            <div class="btn-group cus-dropdown dropend">
                                                <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                </button>
                                                <ul class="dropdown-menu p-4 pt-2">
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> person_remove
                                                            </i>
                                                            <span>Unfollow</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> hide_source
                                                            </i>
                                                            <span>Hide Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-10.png') }}"
                                                        alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Jerome Bell</a></h6>
                                                </div>
                                            </div>
                                            <div class="btn-group cus-dropdown dropend">
                                                <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                </button>
                                                <ul class="dropdown-menu p-4 pt-2">
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> person_remove
                                                            </i>
                                                            <span>Unfollow</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> hide_source
                                                            </i>
                                                            <span>Hide Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un"
                                                        src="{{ asset('assets/images/avatar-11.png') }}"
                                                        alt="avatar">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"
                                                            class="mdtxt">Guy Hawkins</a></h6>
                                                </div>
                                            </div>
                                            <div class="btn-group cus-dropdown dropend">
                                                <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                </button>
                                                <ul class="dropdown-menu p-4 pt-2">
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> person_remove
                                                            </i>
                                                            <span>Unfollow</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2"
                                                            href="#">
                                                            <i class="material-symbols-outlined mat-icon"> hide_source
                                                            </i>
                                                            <span>Hide Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="story-modal" id="storyModal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <div id="modalContent"></div>
            </div>
        </div>
    </main>
@endsection
