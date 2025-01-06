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
                    <div class="story-carousel">
                        <!-- Add Story -->
                        <div class="single-item">
                            <div class="single-slide">
                                <a href="#" class="position-relative d-center story-trigger">
                                    <img class="bg-img" src="{{ $user->avatar }}" alt="icon">
                                    <div class="abs-area d-grid p-3 position-absolute bottom-0">
                                        <div class="icon-box m-auto d-center mb-3">
                                            <i class="material-symbols-outlined text-center mat-icon"> add </i>
                                        </div>
                                        <span class="mdtxt">Add Story</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Stories Loop -->
                        @foreach ($stories as $story)
                            <div class="single-item">
                                <div
                                    class="single-slide {{ \App\Models\StoryView::hasViewed($story->id, Auth::id()) ? 'story-seen' : 'story-unseen' }}">
                                    <div class="position-relative d-flex story-trigger"
                                        data-story="{{ asset($story->media_path) }}"
                                        data-username="{{ $story->user->name }}" data-type="{{ $story->type }}"
                                        data-story-id="{{ $story->id }}">
                                        @if ($story->type == 'video')
                                            <video class="bg-img" src="{{ asset($story->media_path) }}" muted
                                                playsinline></video>
                                        @else
                                            <img class="bg-img" src="{{ asset($story->media_path) }}" alt="story image">
                                        @endif
                                        <div class="abs-area p-3 position-absolute bottom-0">
                                            <img src="{{ $story->user->avatar }}" alt="{{ $story->user->name }}'s avatar">
                                            <span class="mdtxt-story"
                                                title="{{ $story->user->name }}">{{ $story->user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const modal = document.getElementById('storyModal');
                            const modalContent = document.getElementById('modalContent');
                            const closeModal = document.querySelector('.close-modal');
                            let currentStoryIndex = 0;
                            let stories = [];
                            let storyTimeout;

                            const getCsrfToken = () => {
                                const metaTag = document.querySelector('meta[name="csrf-token"]');
                                return metaTag ? metaTag.getAttribute('content') : '';
                            };

                            // LocalStorage support check
                            const isLocalStorageSupported = () => {
                                try {
                                    localStorage.setItem('test', 'test');
                                    localStorage.removeItem('test');
                                    return true;
                                } catch (e) {
                                    return false;
                                }
                            };

                            // Story view status management (for local storage)
                            const saveStoryViewStatus = (storyId) => {
                                if (isLocalStorageSupported()) {
                                    const viewedStories = JSON.parse(localStorage.getItem('viewedStories') || '[]');
                                    if (!viewedStories.includes(storyId)) {
                                        viewedStories.push(storyId);
                                        localStorage.setItem('viewedStories', JSON.stringify(viewedStories));
                                    }
                                }
                            };

                            // Save story view status to server using cookie HttpOnly
                            const saveStoryViewStatusToServer = async (storyId) => {
                                try {
                                    const response = await fetch('/api/story/view', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': getCsrfToken()
                                        },
                                        body: JSON.stringify({
                                            story_id: storyId
                                        })
                                    });

                                    if (response.ok) {
                                        const data = await response.json();
                                        console.log('View recorded:', data);
                                        markStoryAsSeen(storyId); // Hapus ring pada avatar setelah view tercatat
                                    }
                                } catch (error) {
                                    console.error('Error recording view:', error);
                                }
                            };

                            // Mark avatar as seen (remove ring/border)
                            const markStoryAsSeen = (storyId) => {
                                const avatarImg = document.querySelector(`[data-story-id="${storyId}"] img`);
                                if (avatarImg) {
                                    avatarImg.style.border = 'none'; // Menghilangkan border/ring
                                }
                            };

                            // Enhanced story display
                            const showStory = (storyData) => {
                                // Clear any existing timeout
                                clearTimeout(storyTimeout);

                                // Determine content based on media type
                                const contentHTML = storyData.type === 'video' ?
                                    `<video class="story-video" src="${storyData.media}" controls autoplay muted playsinline></video>` :
                                    `<img src="${storyData.media}" alt="story">`;

                                // Update modal content
                                modalContent.innerHTML = `
                                <div class="story-content">
                                    ${contentHTML}
                                    <div class="story-overlay">
                                        <div class="story-info">
                                            <div class="story-user">
                                                <img src="${storyData.userAvatar}" alt="${storyData.username}">
                                                <span>${storyData.username}</span>
                                            </div>
                                        </div>
                                        <div class="story-progress">
                                            ${stories.map((_, index) => 
                                                `<div class="progress-bar ${index < currentStoryIndex ? 'completed' : ''}"></div>`
                                            ).join('')}
                                        </div>
                                    </div>
                                </div>
                            `;

                                // Record view and save status
                                saveStoryViewStatus(storyData.id);
                                saveStoryViewStatusToServer(storyData.id);

                                // Handle media progression
                                if (storyData.type === 'image') {
                                    // Auto-progress for images after 5 seconds
                                    storyTimeout = setTimeout(nextStory, 5000);
                                } else if (storyData.type === 'video') {
                                    // Get the video element
                                    const video = modalContent.querySelector('video');

                                    // Ensure video plays through completely
                                    video.addEventListener('loadedmetadata', () => {
                                        const playPromise = video.play();
                                        if (playPromise !== undefined) {
                                            playPromise.catch(error => {
                                                console.error('Error attempting to play video:', error);
                                            });
                                        }
                                    });

                                    // Error handling for video
                                    video.addEventListener('error', (e) => {
                                        console.error('Video error:', e);
                                        nextStory(); // Move to next story if video fails
                                    });

                                    // Custom handling to wait for video to complete
                                    const checkVideoCompletion = () => {
                                        if (video.currentTime >= video.duration) {
                                            nextStory();
                                        } else {
                                            setTimeout(checkVideoCompletion, 100);
                                        }
                                    };

                                    video.addEventListener('play', checkVideoCompletion);
                                }
                            };

                            // Navigation functions
                            const nextStory = () => {
                                if (currentStoryIndex < stories.length - 1) {
                                    currentStoryIndex++;
                                    showStory(stories[currentStoryIndex]);
                                } else {
                                    closeModalFunction();
                                }
                            };

                            const previousStory = () => {
                                if (currentStoryIndex > 0) {
                                    currentStoryIndex--;
                                    showStory(stories[currentStoryIndex]);
                                }
                            };

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

                            // Story click event listeners
                            document.querySelectorAll('.single-slide').forEach((story, index) => {
                                story.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    e.stopPropagation();

                                    const storyTrigger = this.querySelector('.story-trigger');
                                    if (storyTrigger) {
                                        // Collect stories data
                                        stories = Array.from(document.querySelectorAll('.story-trigger')).map(
                                            trigger => ({
                                                id: trigger.dataset.storyId,
                                                media: trigger.dataset.story,
                                                type: trigger.dataset.type || 'image',
                                                username: trigger.dataset.username,
                                                userAvatar: trigger.querySelector('img').src
                                            }));

                                        // Set current story index and show modal
                                        currentStoryIndex = index;
                                        modal.style.display = 'flex';
                                        document.body.style.overflow = 'hidden';
                                        showStory(stories[currentStoryIndex]);
                                    }
                                });
                            });

                            // Modal navigation event listeners
                            modal.addEventListener('click', function(e) {
                                const rect = modalContent.getBoundingClientRect();
                                const x = e.clientX - rect.left;

                                if (x < rect.width / 2) {
                                    previousStory();
                                } else {
                                    nextStory();
                                }
                            });

                            // Close modal events
                            closeModal.addEventListener('click', closeModalFunction);
                            modal.addEventListener('click', function(e) {
                                if (e.target === modal) {
                                    closeModalFunction(e);
                                }
                            });

                            // Keyboard navigation
                            document.addEventListener('keydown', function(e) {
                                if (modal.style.display === 'flex') {
                                    switch (e.key) {
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
                            <img src="{{ $user->avatar }}" class="max-un" alt="icon">
                        </div>
                        <form action="#" class="w-100 position-relative">
                            <textarea cols="10" rows="2" placeholder="Apa yang kamu pikirkan, {{ explode(' ', $user->name)[0] }}?"
                                data-bs-toggle="modal" data-bs-target="#photoVideoMod"></textarea>
                            <div class="abs-area position-absolute d-none d-sm-block">
                            </div>
                            <ul class="d-flex justify-content-between flex-wrap mt-3 gap-3">
                                <li class="d-flex align-items-center gap-2" data-bs-toggle="modal"
                                    data-bs-target="#photoVideoMod">
                                    <img src="/assets/images/icon/vgallery.png" class="max-un-galerry" alt="icon">
                                    <span>Photo/Video</span>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <script>
                        $(document).ready(function() {
                            // When textarea is focused
                            $('textarea').on('focus', function() {
                                // Only trigger modal if not already shown
                                if (!$('#photoVideoMod').hasClass('show')) {
                                    // Disable the textarea
                                    $(this).prop('disabled', true);
                                    // Trigger the modal
                                    $('#photoVideoMod').modal('show');
                                }
                            });

                            // When modal is shown
                            $('#photoVideoMod').on('shown.bs.modal', function() {
                                // Re-enable textarea while modal is open
                                $('textarea').prop('disabled', false);
                            });

                            // When modal is hidden
                            $('#photoVideoMod').on('hidden.bs.modal', function() {
                                // Re-enable textarea when modal is closed
                                $('textarea').prop('disabled', false);
                            });

                            // Optional: Close modal when clicking outside
                            $(document).on('click', function(e) {
                                if ($(e.target).is('#photoVideoMod')) {
                                    $('#photoVideoMod').modal('hide');
                                    // Re-enable textarea when modal is closed
                                    $('textarea').prop('disabled', false);
                                }
                            });
                        });
                    </script>
                    <div class="post-item d-flex flex-column gap-5 gap-md-7" id="news-feed">
                        @foreach ($posts as $post)
                            <div class="post-single-box p-3 p-sm-5">
                                <div class="top-area pb-5">
                                    {{-- Profile Header --}}
                                    <div class="profile-area d-center justify-content-between">
                                        <div class="avatar-item d-flex gap-3 align-items-center">
                                            <div class="avatar position-relative">
                                                <img class="avatar-img max-un" src="{{ $post->user->avatar }}"
                                                    alt="avatar">
                                            </div>
                                            <div class="info-area">
                                                <h6 class="m-0"><a href="#">{{ $post->user->name }}</a></h6>
                                                <span class="mdtxt status">{{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="btn-group cus-dropdown">
                                            <button type="button" class="dropdown-btn" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="material-symbols-outlined fs-xxl m-0">more_horiz</i>
                                            </button>
                                            <ul class="dropdown-menu p-4 pt-2">
                                                <li>
                                                    <a class="droplist d-flex align-items-center gap-2" href="#">
                                                        <i class="material-symbols-outlined mat-icon">bookmark_add</i>
                                                        <span>Saved Post</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="droplist d-flex align-items-center gap-2" href="#">
                                                        <i class="material-symbols-outlined mat-icon">person_remove</i>
                                                        <span>Unfollow</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="droplist d-flex align-items-center gap-2" href="#">
                                                        <i class="material-symbols-outlined mat-icon">hide_source</i>
                                                        <span>Hide Post</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="droplist d-flex align-items-center gap-2" href="#">
                                                        <i class="material-symbols-outlined mat-icon">lock</i>
                                                        <span>Block</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="droplist d-flex align-items-center gap-2" href="#">
                                                        <i class="material-symbols-outlined mat-icon">flag</i>
                                                        <span>Report Post</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- Caption --}}
                                    <div class="py-4">
                                        <p class="description">{{ $post->caption }}</p>
                                    </div>

                                    {{-- Post Media --}}
                                    @if ($post->media->count() > 0)
                                        @if ($post->media->count() == 1)
                                            <div class="post-img">
                                                <img src="{{ asset($post->media->first()->file_path) }}" alt="image">
                                            </div>
                                        @elseif($post->media->count() == 2)
                                            <div class="post-img-grid two-images">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif($post->media->count() == 3)
                                            <div class="post-img-grid three-images">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif($post->media->count() == 4)
                                            <div class="post-img-grid four-images">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="post-img-grid four-images">
                                                @foreach ($post->media->take(4) as $index => $media)
                                                    <div class="grid-item {{ $index === 3 ? 'position-relative' : '' }}">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                        @if ($index === 3)
                                                            <div class="more-images-overlay showModal"
                                                                data-post-id="{{ $post->id }}">
                                                                <span>+{{ $post->media->count() - 4 }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endif
                                </div>

                                {{-- Post Stats --}}
                                <div class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                    <div class="friends-list d-flex gap-3 align-items-center text-center">
                                        <ul class="d-flex align-items-center justify-content-center">
                                            @foreach ($post->likedUsers()->latest('likes.created_at')->take(3)->get() as $user)
                                                <li>
                                                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}'s avatar"
                                                        class="user-avatar">
                                                </li>
                                            @endforeach
                                            @if ($post->likes_count > count($post->likedUsers))
                                                <li>
                                                    <span
                                                        class="mdtxt d-center">{{ $post->likes_count - count($post->likedUsers) }}+</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                        <button class="mdtxt">{{ $post->comments->count() }} Comments</button>
                                        <button class="mdtxt">1 Share</button>
                                    </div>
                                </div>

                                {{-- Action Buttons --}}
                                <div
                                    class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                    <button
                                        class="d-center gap-1 gap-sm-2 mdtxt like-btn {{ $post->is_liked ? 'liked' : '' }}"
                                        data-post-id="{{ $post->id }}">
                                        <span class="like-icon-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="like-icon like-icon-outline"
                                                style="{{ $post->is_liked ? 'display:none;' : '' }}">
                                                <path
                                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="red" stroke="red" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="like-icon like-icon-filled"
                                                style="{{ $post->is_liked ? '' : 'display:none;' }}">
                                                <path
                                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                </path>
                                            </svg>
                                        </span>
                                        Like
                                    </button>
                                    <button class="d-center gap-1 gap-sm-2 mdtxt comment-btn">
                                        <i class="material-symbols-outlined mat-icon">chat</i>
                                        Comment
                                    </button>
                                    <button class="d-center gap-1 gap-sm-2 mdtxt share-btn">
                                        <i class="material-symbols-outlined mat-icon">share</i>
                                        Share
                                    </button>
                                </div>

                                {{-- Main Comment Form --}}
                                <form class="comment-form" id="main-comment-form-{{ $post->id }}"
                                    data-post-id="{{ $post->id }}">
                                    <div class="d-flex mt-5 gap-3">
                                        <div class="profile-box d-none d-xxl-block">
                                            <img src="{{ Auth::user()->avatar }}" class="max-un" alt="icon">
                                        </div>
                                        <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                            <input type="text" name="content" class="comment-input"
                                                placeholder="Write a comment.." required>
                                                <div class="file-input d-flex gap-1 gap-md-2">
                                                    <div class="file-upload" data-post-id="1">
                                                        <div class="file-upload-wrapper position-relative">
                                                            <input type="file" 
                                                                   id="file-input-1" 
                                                                   name="image" 
                                                                   class="file-input-hidden" 
                                                                   accept="image/*">
                                                            <label for="file-input-1" 
                                                                   class="file-upload-label d-block">
                                                                <span class="file-upload-icon d-grid text-center">
                                                                    <span class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                                        perm_media
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="image-preview-modal-1" 
                                                         class="preview-container d-none mt-2">
                                                        <img id="preview-img-modal-1" src="" 
                                                             alt="Preview" class="img-fluid">
                                                        <button type="button" class="remove-preview" 
                                                                onclick="removePreview('modal-1')">×</button>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="btn-area d-flex">
                                            <button type="submit" class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                <i class="material-symbols-outlined mat-icon m-0 fs-xxl">near_me</i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="image-preview-{{ $post->id }}" class="preview-container d-none mt-2">
                                        <img id="preview-img-{{ $post->id }}" src="" alt="Preview"
                                            class="img-fluid">
                                        <button type="button" class="remove-preview"
                                            onclick="removePreview({{ $post->id }})">×</button>
                                    </div>
                                </form>

                                {{-- Comments Section --}}
                                <div class="comments-area mt-5" id="comments-area-{{ $post->id }}">
                                    @php
                                        // Get preview comment - prioritize highest likes or latest
                                        $previewComment = $post->comments
                                            ->whereNull('parent_id')
                                            ->sortByDesc(function ($comment) {
                                                return [$comment->likes_count, $comment->created_at];
                                            })
                                            ->first();

                                        $totalComments = $post->comments->whereNull('parent_id')->count();
                                    @endphp

                                    {{-- Show total comments count if any --}}
                                    @if ($totalComments > 0)
                                        <div class="total-comments mb-3">
                                            <a href="#" class="comment-btn open-modal"
                                                data-post-id="{{ $post->id }}">
                                                View all {{ $totalComments }} comments
                                            </a>
                                        </div>
                                    @endif

                                    {{-- Show preview comment if exists --}}
                                    @if ($previewComment)
                                        <div class="parent-comment d-flex gap-2 gap-sm-4"
                                            id="comment-{{ $previewComment->id }}">
                                            <div class="avatar-item d-center align-items-baseline">
                                                <img class="avatar-img max-un"
                                                    src="{{ $previewComment->user->avatar ?? asset('assets/images/avatar-default.png') }}"
                                                    alt="avatar">
                                            </div>
                                            <div class="info-item active">
                                                <div
                                                    class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                    <div class="title-area">
                                                        <h6 class="m-0 mb-2">
                                                            <a href="#">{{ $previewComment->user->name }}</a>
                                                        </h6>
                                                        <p class="mdtxt">{{ $previewComment->content }}</p>
                                                        @if ($previewComment->image)
                                                            <div class="comment-image-container mt-2">
                                                                <img src="{{ asset($previewComment->image) }}"
                                                                    alt="Comment Image" class="comment-image">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="btn-group dropend cus-dropdown">
                                                        <button type="button" class="dropdown-btn"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0">more_horiz</i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            @if (Auth::id() === $previewComment->user_id)
                                                                <li>
                                                                    <form
                                                                        action="{{ route('sosmed.comments.destroy', $previewComment->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="droplist d-flex align-items-center gap-2">
                                                                            <i
                                                                                class="material-symbols-outlined mat-icon">delete</i>
                                                                            <span>Delete Comment</span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2"
                                                                    href="#">
                                                                    <i
                                                                        class="material-symbols-outlined mat-icon">hide_source</i>
                                                                    <span>Hide Comment</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2"
                                                                    href="#">
                                                                    <i class="material-symbols-outlined mat-icon">flag</i>
                                                                    <span>Report Comment</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <ul class="like-share d-flex gap-6 mt-2">
                                                    <li class="d-center">
                                                        <button
                                                            class="mdtxt like-comment-btn {{ $previewComment->is_liked ? 'liked' : '' }}"
                                                            data-comment-id="{{ $previewComment->id }}">
                                                            Like <span
                                                                class="likes-count">({{ $previewComment->likes_count }})</span>
                                                        </button>
                                                    </li>
                                                    <li class="d-center">
                                                        <button class="mdtxt reply-btn"
                                                            data-comment-id="{{ $previewComment->id }}">
                                                            Reply
                                                        </button>
                                                    </li>
                                                    <li class="d-center">
                                                        <span
                                                            class="mdtxt">{{ $previewComment->created_at->diffForHumans() }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Image Modal --}}
                            <div class="custom-modal" id="imageModal{{ $post->id }}">
                                <div class="modal-overlay"></div>
                                <div class="modal-content">
                                    <div class="post-single-box p-3 p-sm-5">
                                        <div class="modal-header border-0 p-0 mb-4">
                                            <div class="profile-area d-center justify-content-between w-100">
                                                <div class="avatar-item d-flex gap-3 align-items-center">
                                                    <div class="avatar position-relative">
                                                        <img class="avatar-img max-un" src="{{ $post->user->avatar }}"
                                                            alt="avatar">
                                                    </div>
                                                    <div class="info-area">
                                                        <h6 class="m-0"><a href="#">{{ $post->user->name }}</a>
                                                        </h6>
                                                        <span
                                                            class="mdtxt status">{{ $post->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <button type="button" id="modal-close-detail" class="modal-close">
                                                    <i class="material-symbols-outlined mat-icon xxltxt">close</i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body p-0">
                                            <div class="py-4">
                                                <p class="description">{{ $post->caption }}</p>
                                            </div>
                                            <div
                                                class="post-img-grid mb-4 
                    @if (count($post->media) == 1) single-image 
                    @elseif (count($post->media) == 3) three-images-custom-modal 
                    @elseif (count($post->media) == 2) two-images 
                    @elseif (count($post->media) == 4) four-images @endif">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div
                                                class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                                <div class="friends-list d-flex gap-3 align-items-center text-center">
                                                    <ul class="d-flex align-items-center justify-content-center">
                                                        @foreach ($post->likedUsers()->latest('likes.created_at')->take(3)->get() as $user)
                                                            <li>
                                                                <img src="{{ $user->avatar }}"
                                                                    alt="{{ $user->name }}'s avatar"
                                                                    class="user-avatar">
                                                            </li>
                                                        @endforeach
                                                        @if ($post->likes_count > count($post->likedUsers))
                                                            <li>
                                                                <span
                                                                    class="mdtxt d-center">{{ $post->likes_count - count($post->likedUsers) }}+</span>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div
                                                    class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                                    <button class="mdtxt">{{ $post->comments->count() }}
                                                        Comments</button>
                                                    <button class="mdtxt">1 Share</button>
                                                </div>
                                            </div>

                                            {{-- Modal Action Buttons --}}
                                            <div
                                                class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                                <button
                                                    class="d-center gap-1 gap-sm-2 mdtxt like-btn {{ $post->is_liked ? 'liked' : '' }}"
                                                    data-post-id="{{ $post->id }}">
                                                    <span class="like-icon-container">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="like-icon like-icon-outline"
                                                            style="{{ $post->is_liked ? 'display:none;' : '' }}">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="red"
                                                            stroke="red" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="like-icon like-icon-filled"
                                                            style="{{ $post->is_liked ? '' : 'display:none;' }}">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    Like
                                                </button>
                                                <button class="d-center gap-1 gap-sm-2 mdtxt comment-btn">
                                                    <i class="material-symbols-outlined mat-icon">chat</i>
                                                    Comment
                                                </button>
                                                <button class="d-center gap-1 gap-sm-2 mdtxt share-btn">
                                                    <i class="material-symbols-outlined mat-icon">share</i>
                                                    Share
                                                </button>
                                            </div>

                                            {{-- Modal Comment Form --}}
                                            <form class="comment-form" id="modal-comment-form-{{ $post->id }}"
                                                data-post-id="{{ $post->id }}">
                                                <div class="d-flex mt-5 gap-3">
                                                    <div class="profile-box d-none d-xxl-block">
                                                        <img src="{{ Auth::user()->avatar }}" class="max-un"
                                                            alt="icon">
                                                    </div>
                                                    <div
                                                        class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                        <input type="text" name="content" class="comment-input"
                                                            placeholder="Write a comment.." required>
                                                        <div class="file-input d-flex gap-1 gap-md-2">
                                                            <div class="file-upload" data-post-id="{{ $post->id }}">
                                                                <div class="file-upload-wrapper position-relative">
                                                                    <input type="file"
                                                                        id="file-input-{{ $post->id }}"
                                                                        name="image" class="file-input-hidden"
                                                                        accept="image/*">
                                                                    <label for="file-input-{{ $post->id }}"
                                                                        class="file-upload-label d-block"
                                                                        style="cursor: pointer;">
                                                                        <span class="file-upload-icon d-grid text-center">
                                                                            <span
                                                                                class="material-symbols-outlined mat-icon m-0 xxltxt"
                                                                                style="cursor: pointer;">perm_media</span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div id="image-preview-modal-{{ $post->id }}"
                                                                class="preview-container d-none mt-2">
                                                                <img id="preview-img-modal-{{ $post->id }}"
                                                                    src="" alt="Preview" class="img-fluid">
                                                                <button type="button" class="remove-preview"
                                                                    onclick="removePreview('modal-{{ $post->id }}')">×</button>
                                                            </div>
                                                        </div>

                                                        <style>
                                                            .file-input-hidden {
                                                                display: none;
                                                            }

                                                            .file-upload-label {
                                                                cursor: pointer;
                                                            }

                                                            .file-upload-icon {
                                                                pointer-events: none;
                                                                /* Hapus ini karena menghalangi event click */
                                                            }
                                                        </style>

                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
    // Image Preview Functionality
    function setupFileUpload(postId) {
        // Get all necessary elements
        const fileInput = document.getElementById(`file-input-${postId}`);
        const previewContainer = document.getElementById(`image-preview-modal-${postId}`);
        const previewImg = document.getElementById(`preview-img-modal-${postId}`);
        const fileUploadLabel = document.querySelector(`label[for="file-input-${postId}"]`);
        const mediaIcon = document.querySelector(`label[for="file-input-${postId}"] .material-symbols-outlined`);

        // Only proceed if all elements exist
        if (!fileInput || !previewContainer || !previewImg) {
            console.warn(`One or more elements not found for post ID: ${postId}`);
            return;
        }

        // Handle click on label
        if (fileUploadLabel) {
            fileUploadLabel.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                fileInput.click();
            });
        }

        // Handle click on media icon
        if (mediaIcon) {
            mediaIcon.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                fileInput.click();
            });
        }

        // File change handler
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (!file) return;

            // Validate file size (2MB limit)
            if (file.size > 2 * 1024 * 1024) {
                alert('File is too large. Maximum file size is 2MB.');
                event.target.value = ''; // Clear the input
                return;
            }

            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                alert('Invalid file type. Please upload an image (JPEG, PNG, GIF, or WebP).');
                event.target.value = ''; // Clear the input
                return;
            }

            // Clear any existing preview
            previewImg.src = '';
            previewContainer.classList.add('d-none');

            // Read and preview the file
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewContainer.classList.remove('d-none');

                // Hide media icon if needed
                if (mediaIcon) {
                    mediaIcon.style.display = 'none';
                }
            };

            reader.onerror = function(e) {
                console.error('FileReader error:', e);
                alert('Error reading file. Please try again.');
                event.target.value = '';
            };

            reader.readAsDataURL(file);
        });
    }

    // Remove Image Preview with improved error handling
    window.removePreview = function(modalId) {
        try {
            const fileInput = document.querySelector(`#file-input-${modalId.replace('modal-', '')}`);
            const previewContainer = document.getElementById(`image-preview-modal-${modalId.replace('modal-', '')}`);
            const previewImg = document.getElementById(`preview-img-modal-${modalId.replace('modal-', '')}`);
            const mediaIcon = document.querySelector(`label[for="file-input-${modalId.replace('modal-', '')}"] .material-symbols-outlined`);

            // Reset file input
            if (fileInput) {
                fileInput.value = '';
            }

            // Hide preview container
            if (previewContainer) {
                previewContainer.classList.add('d-none');
            }

            // Clear preview image
            if (previewImg) {
                previewImg.src = '';
            }

            // Show media icon again
            if (mediaIcon) {
                mediaIcon.style.display = '';
            }
        } catch (error) {
            console.error('Error removing preview:', error);
        }
    };

    // Initialize file uploads
    function initializeFileUploads() {
        try {
            const fileUploads = document.querySelectorAll('.file-upload');
            fileUploads.forEach(fileUpload => {
                const postId = fileUpload.dataset.postId;
                if (postId) {
                    setupFileUpload(postId);
                } else {
                    console.warn('No post ID found for file upload element', fileUpload);
                }
            });
        } catch (error) {
            console.error('Error initializing file uploads:', error);
        }
    }

    // Initialize CSS Styles
    function initializeStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .file-input-hidden {
                display: none;
            }
            .file-upload-label {
                cursor: pointer;
            }
            .file-upload-icon {
                cursor: pointer;
                pointer-events: auto !important;
            }
            .preview-container {
                position: relative;
                margin-top: 10px;
            }
            .preview-container img {
                max-width: 100%;
                height: auto;
                border-radius: 4px;
            }
            .remove-preview {
                position: absolute;
                top: -10px;
                right: -10px;
                background: #ff4444;
                color: white;
                border: none;
                border-radius: 50%;
                width: 24px;
                height: 24px;
                line-height: 24px;
                text-align: center;
                cursor: pointer;
                padding: 0;
                font-size: 16px;
            }
        `;
        document.head.appendChild(style);
    }

    // Run initialization
    try {
        initializeStyles();
        initializeFileUploads();
    } catch (error) {
        console.error('Error during initialization:', error);
    }
});
                                                        </script>
                                                    </div>
                                                    <div class="btn-area d-flex">
                                                        <button type="submit" class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                            <i
                                                                class="material-symbols-outlined mat-icon m-0 fs-xxl">near_me</i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="image-preview-modal-{{ $post->id }}"
                                                    class="preview-container d-none mt-2">
                                                    <img id="preview-img-modal-{{ $post->id }}" src=""
                                                        alt="Preview" class="img-fluid">
                                                    <button type="button" class="remove-preview"
                                                        onclick="removePreview('modal-{{ $post->id }}')">×</button>
                                                </div>
                                            </form>

                                            {{-- Modal Comments Section --}}
                                            <div class="comments-area mt-5" id="modal-comments-area-{{ $post->id }}">
                                                @php
                                                    $mainComments = $post->comments
                                                        ->whereNull('parent_id')
                                                        ->sortByDesc('created_at');
                                                @endphp

                                                @foreach ($mainComments as $comment)
                                                    <div class="parent-comment d-flex gap-2 gap-sm-4"
                                                        id="comment-{{ $comment->id }}">
                                                        <div class="avatar-item d-center align-items-baseline">
                                                            <img class="avatar-img max-un"
                                                                src="{{ $comment->user->avatar ?? asset('assets/images/avatar-default.png') }}"
                                                                alt="avatar">
                                                        </div>
                                                        <div class="info-item active">
                                                            <div
                                                                class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                                <div class="title-area">
                                                                    <h6 class="m-0 mb-2">
                                                                        <a href="#">{{ $comment->user->name }}</a>
                                                                    </h6>
                                                                    <p class="mdtxt">{{ $comment->content }}</p>
                                                                    @if ($comment->image)
                                                                        <div class="comment-image-container mt-2">
                                                                            <img src="{{ asset($comment->image) }}"
                                                                                alt="Comment Image" class="comment-image">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="btn-group dropend cus-dropdown">
                                                                    <button type="button" class="dropdown-btn"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i
                                                                            class="material-symbols-outlined fs-xxl m-0">more_horiz</i>
                                                                    </button>
                                                                    <ul class="dropdown-menu p-4 pt-2">
                                                                        @if (Auth::id() === $comment->user_id)
                                                                            <li>
                                                                                <button
                                                                                    class="droplist d-flex align-items-center gap-2 delete-comment-btn"
                                                                                    data-comment-id="{{ $comment->id }}">
                                                                                    <i
                                                                                        class="material-symbols-outlined mat-icon">delete</i>
                                                                                    <span>Delete Comment</span>
                                                                                </button>
                                                                            </li>
                                                                        @endif
                                                                        <li>
                                                                            <a class="droplist d-flex align-items-center gap-2"
                                                                                href="#">
                                                                                <i
                                                                                    class="material-symbols-outlined mat-icon">hide_source</i>
                                                                                <span>Hide Comment</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="droplist d-flex align-items-center gap-2"
                                                                                href="#">
                                                                                <i
                                                                                    class="material-symbols-outlined mat-icon">flag</i>
                                                                                <span>Report Comment</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <ul class="like-share d-flex gap-6 mt-2">
                                                                <li class="d-center">
                                                                    <button
                                                                        class="mdtxt like-comment-btn {{ $comment->is_liked ? 'liked' : '' }}"
                                                                        data-comment-id="{{ $comment->id }}">
                                                                        Like <span
                                                                            class="likes-count">({{ $comment->likes_count }})</span>
                                                                    </button>
                                                                </li>
                                                                <li class="d-center">
                                                                    <button class="mdtxt reply-btn"
                                                                        data-comment-id="{{ $comment->id }}">
                                                                        Reply
                                                                    </button>
                                                                </li>
                                                                <li class="d-center">
                                                                    <span
                                                                        class="mdtxt">{{ $comment->created_at->diffForHumans() }}</span>
                                                                </li>
                                                            </ul>

                                                            {{-- Reply Form --}}
                                                            <form action="#" class="comment-form"
                                                                id="reply-form-{{ $comment->id }}"
                                                                data-parent-comment-id="{{ $comment->id }}"
                                                                style="display: none;">
                                                                <div class="d-flex gap-3">
                                                                    <input type="text" name="reply_content"
                                                                        placeholder="Write a reply.."
                                                                        class="form-control py-3" required>
                                                                    <button type="submit"
                                                                        class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                                        <i
                                                                            class="material-symbols-outlined mat-icon m-0 fs-xxl">near_me</i>
                                                                    </button>
                                                                </div>
                                                            </form><br>

                                                            {{-- Replies --}}
                                                            @if ($comment->replies->count() > 0)
                                                                <div class="replies-container ml-4 mt-3">
                                                                    @foreach ($comment->replies->sortBy('created_at') as $reply)
                                                                        <div
                                                                            class="reply-comment d-flex gap-2 gap-sm-4 mt-3">
                                                                            <div
                                                                                class="avatar-item d-center align-items-baseline">
                                                                                <img class="avatar-img max-un"
                                                                                    src="{{ $reply->user->avatar ?? asset('assets/images/avatar-default.png') }}"
                                                                                    alt="avatar">
                                                                            </div>
                                                                            <div class="info-item">
                                                                                <div class="top-area px-4 py-3">
                                                                                    <h6 class="m-0 mb-2">
                                                                                        <a
                                                                                            href="#">{{ $reply->user->name }}</a>
                                                                                    </h6>
                                                                                    <p class="mdtxt">
                                                                                        {{ $reply->content }}</p>
                                                                                </div>
                                                                                <ul class="like-share d-flex gap-6 mt-2">
                                                                                    <li class="d-center">
                                                                                        <button
                                                                                            class="mdtxt like-reply-btn {{ $reply->is_liked ? 'liked' : '' }}"
                                                                                            data-reply-id="{{ $reply->id }}">
                                                                                            Like <span
                                                                                                class="likes-count">({{ $reply->likes_count }})</span>
                                                                                        </button>
                                                                                    </li>
                                                                                    <li class="d-center">
                                                                                        <span
                                                                                            class="mdtxt">{{ $reply->created_at->diffForHumans() }}</span>
                                                                                    </li>
                                                                                    @if (Auth::id() === $reply->user_id)
                                                                                        <li class="d-center">
                                                                                            <button
                                                                                                class="mdtxt delete-reply-btn"
                                                                                                data-reply-id="{{ $reply->id }}">
                                                                                                Delete
                                                                                            </button>
                                                                                        </li>
                                                                                    @endif
                                                                                </ul><br>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($posts->hasMorePages())
                            <div class="load-more text-center mt-5" data-page="{{ $posts->currentPage() + 1 }}">
                                <button class="cmn-btn">Load More</button>
                            </div>
                        @endif
                        <style>
                            /* Styling untuk preview image */
                            .preview-container {
                                position: relative;
                                width: 100%;
                                max-width: 200px;
                                /* Ukuran maksimal gambar preview */
                                margin-top: 10px;
                                display: none;
                                /* Secara default, preview tersembunyi */
                                border-radius: 8px;
                                overflow: hidden;
                            }

                            .preview-container img {
                                width: 100%;
                                height: auto;
                                object-fit: cover;
                                border-radius: 8px;
                                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                            }

                            /* Menampilkan preview saat ada gambar */
                            .preview-container.d-block {
                                display: block;
                            }

                            .more-images-overlay {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: rgba(0, 0, 0, 0.5);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border-radius: 8px;
                                cursor: pointer;
                            }

                            .more-images-overlay span {
                                color: white;
                                font-size: 24px;
                                font-weight: bold;
                            }

                            /* Reset untuk layout dasar */
                            .post-img,
                            .post-img-grid {
                                margin: 0;
                                width: 100%;
                            }

                            /* Full width untuk 1 gambar (single-image) */
                            .post-img img,
                            .post-img-grid.single-image .grid-item img {
                                width: 100%;
                                height: auto;
                                max-height: 600px;
                                /* Batas tinggi gambar */
                                object-fit: contain;
                                /* Agar gambar proporsional */
                                border-radius: 8px;
                            }

                            /* Default grid layout (2 kolom) */
                            .post-img-grid {
                                display: grid;
                                gap: 8px;
                                grid-template-columns: 1fr 1fr;
                                /* Dua kolom */
                                grid-auto-rows: auto;
                                /* Tinggi baris otomatis */
                            }

                            /* Jika jumlah gambar ganjil, gambar terakhir full width */
                            .post-img-grid .grid-item:last-child:nth-child(odd) {
                                grid-column: 1 / -1;
                                /* Full width */
                            }

                            /* Grid layout untuk 3 gambar (custom layout untuk non-modal) */
                            .post-img-grid.three-images {
                                display: grid;
                                gap: 8px;
                                grid-template-columns: 2fr 1fr;
                                /* Kolom pertama besar, kolom kedua kecil */
                                grid-template-rows: 1fr 1fr;
                                /* Dua baris */
                            }

                            /* Kolom pertama penuh, baris pertama dan kedua */
                            .post-img-grid.three-images .grid-item:nth-child(1) {
                                grid-column: 1 / 2;
                                /* Kolom pertama */
                                grid-row: 1 / 3;
                                /* Baris pertama hingga kedua */
                            }

                            /* Kolom kedua, baris pertama */
                            .post-img-grid.three-images .grid-item:nth-child(2) {
                                grid-column: 2 / 3;
                                /* Kolom kedua */
                                grid-row: 1 / 2;
                                /* Baris pertama */
                            }

                            /* Kolom kedua, baris kedua */
                            .post-img-grid.three-images .grid-item:nth-child(3) {
                                grid-column: 2 / 3;
                                /* Kolom kedua */
                                grid-row: 2 / 3;
                                /* Baris kedua */
                            }

                            /* Custom modal layout */
                            .custom-modal .post-img-grid {
                                display: grid;
                                gap: 8px;
                                grid-template-columns: 1fr 1fr;
                                /* Dua kolom */
                                grid-auto-rows: auto;
                                /* Tinggi baris otomatis */
                            }

                            /* Jika jumlah gambar ganjil, gambar terakhir full width di modal */
                            .custom-modal .post-img-grid .grid-item:last-child:nth-child(odd) {
                                grid-column: 1 / -1;
                                /* Full width */
                            }

                            /* Gambar dalam grid */
                            .grid-item img {
                                width: 100%;
                                /* Gambar mengikuti lebar container */
                                height: 100%;
                                object-fit: cover;
                                /* Agar gambar tetap proporsional */
                                border-radius: 8px;
                            }

                            /* Modal styles */
                            .custom-modal {
                                display: none;
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                z-index: 2147483647;
                                background: rgba(0, 0, 0, 0.7);
                                /* Transparansi latar belakang */
                                overflow: hidden;
                                /* Pastikan tidak ada overflow pada modal */
                            }

                            /* Tombol close modal - perbaikan */
.custom-modal .modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.5);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2147483649; /* Pastikan ini paling atas */
    padding: 0;
    transition: all 0.3s ease;
}

/* Hover effect untuk tombol close */
.custom-modal .modal-close:hover {
    background: rgba(0, 0, 0, 0.7);
    transform: scale(1.1);
}

/* Icon di dalam tombol close */
.custom-modal .modal-close i {
    font-size: 24px;
    pointer-events: none; /* Pastikan icon tidak menghalangi click */
}

/* Pastikan modal overlay tidak menghalangi */
.custom-modal .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 2147483646;
}

/* Pastikan modal content tidak menghalangi */
.custom-modal .modal-content {
    z-index: 2147483647;
}


                            /* Konten modal */
                            .custom-modal .modal-content {
                                position: absolute;
                                /* Gunakan absolute agar modal konten selalu di tengah */
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                width: 80%;
                                /* Modal dan konten modal memiliki lebar yang sama */
                                max-width: 800px;
                                /* Maksimal lebar modal */
                                height: auto;
                                /* Tinggi otomatis sesuai konten */
                                max-height: 90%;
                                /* Maksimal tinggi modal 90% dari viewport */
                                overflow-y: auto;
                                /* Aktifkan scroll vertikal jika konten melebihi tinggi */
                                border-radius: 10px;
                                /* Rounded corner untuk modal */
                                background: #212f48;
                                /* Background solid */
                                box-sizing: border-box;
                                /* Padding termasuk dalam lebar */
                                padding: 20px;
                                /* Beri padding agar konten tidak menempel */
                                z-index: 999999999999;
                                /* Pastikan modal berada di atas */
                            }

                            /* Tombol close modal */
                            .custom-modal .btn-close {
                                position: absolute;
                                top: 10px;
                                right: 10px;
                                background: none;
                                border: none;
                                font-size: 24px;
                                color: white;
                                cursor: pointer;
                                z-index: 2147483648;
                            }

                            /* Scrollbar untuk modal content */
                            .custom-modal .modal-content::-webkit-scrollbar {
                                width: 8px;
                            }

                            .custom-modal .modal-content::-webkit-scrollbar-thumb {
                                background: rgba(255, 255, 255, 0.3);
                                border-radius: 4px;
                            }

                            .custom-modal .modal-content::-webkit-scrollbar-thumb:hover {
                                background: rgba(255, 255, 255, 0.5);
                            }

                            /* Responsif untuk layar kecil */
                            @media (max-width: 768px) {
                                .custom-modal .modal-content {
                                    width: 90%;
                                    /* Lebar modal pada perangkat kecil */
                                    max-width: 100%;
                                    /* Maksimal 100% lebar */
                                    max-height: 90%;
                                    /* Maksimal tinggi modal */
                                }

                                .grid-item img {
                                    height: auto;
                                    /* Sesuaikan tinggi gambar pada perangkat kecil */
                                }
                            }
                        </style>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Function to manage z-index of elements behind modal
                                function manageModalLayering() {
                                    // Select elements to adjust z-index
                                    const elementsToAdjust = [
                                        ...document.querySelectorAll('.col-xxl-3.col-xl-3.col-lg-4.col-6.cus-z2'),
                                        ...document.querySelectorAll('header'),
                                        ...document.querySelectorAll('nav'),
                                        ...document.querySelectorAll('.header-section'),
                                        ...document.querySelectorAll('.header-menu'),
                                        ...document.querySelectorAll('.header-fixed')
                                    ];

                                    // Find all potential modal triggers
                                    function findModalTriggers() {
                                        const triggers = [];
                                        const postSingleBoxes = document.querySelectorAll('.post-single-box');

                                        postSingleBoxes.forEach(postBox => {
                                            // Action buttons (comment, like, etc)
                                            const actionButtons = postBox.querySelectorAll('.like-comment-share button');
                                            actionButtons.forEach(button => {
                                                const hasChatIcon = button.querySelector(
                                                        '.material-symbols-outlined.mat-icon')?.textContent.trim() ===
                                                    'chat';
                                                if (hasChatIcon) {
                                                    const postId = postBox.querySelector('[data-post-id]')
                                                        ?.getAttribute('data-post-id');
                                                    if (postId) {
                                                        button.setAttribute('data-post-id', postId);
                                                        triggers.push(button);
                                                    }
                                                }
                                            });

                                            // Comment section triggers
                                            const commentSection = postBox.querySelector('.form-content');
                                            if (commentSection) {
                                                const fileUploads = commentSection.querySelectorAll('.file-upload');
                                                const moodArea = commentSection.querySelector('.mood-area');
                                                const commentInput = commentSection.querySelector('input');

                                                [...fileUploads, moodArea, commentInput].forEach(element => {
                                                    if (element) {
                                                        const postId = postBox.querySelector('[data-post-id]')
                                                            ?.getAttribute('data-post-id');
                                                        if (postId) {
                                                            element.setAttribute('data-post-id', postId);
                                                            triggers.push(element);
                                                        }
                                                    }
                                                });
                                            }

                                            // View all comments triggers
                                            const viewAllCommentsLinks = postBox.querySelectorAll(
                                                '.total-comments .comment-btn');
                                            viewAllCommentsLinks.forEach(link => {
                                                const postId = link.getAttribute('data-post-id');
                                                if (postId) {
                                                    triggers.push(link);
                                                }
                                            });

                                            // Existing modal triggers
                                            const showModalTriggers = postBox.querySelectorAll('.showModal');
                                            showModalTriggers.forEach(trigger => {
                                                triggers.push(trigger);
                                            });
                                        });

                                        return triggers;
                                    }

                                    // Modal z-index management
                                    function onModalOpen() {
                                        elementsToAdjust.forEach(element => {
                                            element.setAttribute('data-original-zindex', element.style.zIndex || '');
                                            element.style.zIndex = '-1';
                                        });

                                        const navbars = document.querySelectorAll('nav');
                                        navbars.forEach(nav => {
                                            nav.style.zIndex = '-1';
                                        });
                                    }

                                    function onModalClose() {
                                        elementsToAdjust.forEach(element => {
                                            const originalZIndex = element.getAttribute('data-original-zindex');
                                            element.style.zIndex = originalZIndex || '1';
                                            element.removeAttribute('data-original-zindex');
                                        });

                                        const navbars = document.querySelectorAll('nav');
                                        navbars.forEach(nav => {
                                            nav.style.zIndex = '1000';
                                        });
                                    }

                                    // Show/Hide Modal Functions
                                    function showModal(triggerElement) {
                                        const postId = triggerElement.getAttribute('data-post-id');
                                        if (postId) {
                                            const modal = document.getElementById('imageModal' + postId);
                                            if (modal) {
                                                setTimeout(() => {
                                                    modal.style.display = 'block';
                                                    document.body.style.overflow = 'hidden';
                                                    onModalOpen();
                                                }, 50);
                                            }
                                        }
                                    }

                                    function closeModal(modalElement) {
                                        modalElement.style.display = 'none';
                                        document.body.style.overflow = '';
                                        onModalClose();
                                    }

                                    // Reply Form Functions
                                    function showReplyForm(commentId) {
                                        // Close any open reply forms first
                                        document.querySelectorAll('.reply-form-container').forEach(container => {
                                            if (!container.classList.contains('d-none') && container.id !==
                                                `reply-form-${commentId}`) {
                                                container.classList.add('d-none');
                                            }
                                        });

                                        // Toggle the clicked reply form
                                        const replyForm = document.getElementById(`reply-form-${commentId}`);
                                        if (replyForm) {
                                            replyForm.classList.toggle('d-none');
                                            // Focus on input when shown
                                            if (!replyForm.classList.contains('d-none')) {
                                                const input = replyForm.querySelector('input');
                                                if (input) input.focus();
                                            }
                                        }

                                        // If in modal, find and toggle the modal reply form too
                                        const modalReplyForm = document.getElementById(`modal-reply-form-${commentId}`);
                                        if (modalReplyForm) {
                                            modalReplyForm.classList.toggle('d-none');
                                            if (!modalReplyForm.classList.contains('d-none')) {
                                                const input = modalReplyForm.querySelector('input');
                                                if (input) input.focus();
                                            }
                                        }
                                    }

                                    // Event Listeners
                                    function attachModalTriggers() {
                                        const modalTriggers = findModalTriggers();
                                        modalTriggers.forEach(trigger => {
                                            trigger.addEventListener('click', function(e) {
                                                e.preventDefault();
                                                showModal(this);
                                            });
                                        });
                                    }

                                    function attachReplyTriggers() {
                                        document.addEventListener('click', function(e) {
                                            if (e.target.closest('.reply-btn')) {
                                                e.preventDefault();
                                                const commentId = e.target.closest('.reply-btn').getAttribute('onclick')?.match(
                                                    /\d+/)?.[0];
                                                if (commentId) {
                                                    showReplyForm(commentId);
                                                }
                                            }
                                        });
                                    }

                                    function attachCloseModalListeners() {

                                        // Overlay click
                                        document.querySelectorAll('.modal-overlay').forEach(overlay => {
                                            overlay.addEventListener('click', function() {
                                                const modal = this.closest('.custom-modal');
                                                closeModal(modal);
                                            });
                                        });

                                        // ESC key
                                        document.addEventListener('keydown', function(e) {
                                            if (e.key === 'Escape') {
                                                const openModals = document.querySelectorAll(
                                                    '.custom-modal[style*="display: block"]');
                                                openModals.forEach(modal => {
                                                    closeModal(modal);
                                                });
                                            }
                                        });
                                    }

                                    function preventModalContentClose() {
                                        document.querySelectorAll('.custom-modal .modal-content').forEach(modalContent => {
                                            modalContent.addEventListener('click', function(e) {
                                                e.stopPropagation();
                                            });
                                        });
                                    }

                                    // Initialize everything
                                    function initializeAllInteractions() {
                                        attachModalTriggers();
                                        attachReplyTriggers();
                                        attachCloseModalListeners();
                                        preventModalContentClose();
                                    }

                                    // Make functions globally available
                                    window.showReplyForm = showReplyForm;

                                    // Run initialization
                                    initializeAllInteractions();
                                }

                                // Start the system
                                manageModalLayering();
                            });
                        </script>
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
                                                        src="{{ asset('assets/images/avatar-10.png') }}" alt="avatar">
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
                                                        src="{{ asset('assets/images/avatar-11.png') }}" alt="avatar">
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
        <div class="story-modal" id="storyModal" style="display: none;">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <div id="modalContent"></div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Like button handler
                document.querySelectorAll('.like-comment-share button:first-child').forEach(likeButton => {
                    likeButton.addEventListener('click', function() {
                        const postId = this.getAttribute('data-post-id');
                        const likeIconContainer = this.querySelector('.like-icon-container');
                        const outlineIcon = likeIconContainer.querySelector('.like-icon-outline');
                        const filledIcon = likeIconContainer.querySelector('.like-icon-filled');

                        if (postId) {
                            fetch('/sosmed/posts/toggle-like', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        post_id: postId
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Toggle visibility of icons
                                        if (data.liked) {
                                            outlineIcon.style.display = 'none';
                                            filledIcon.style.display = 'block';
                                            this.classList.add('liked');
                                        } else {
                                            outlineIcon.style.display = 'block';
                                            filledIcon.style.display = 'none';
                                            this.classList.remove('liked');
                                        }

                                        // Update likes section with avatars
                                        const postBox = this.closest('.post-single-box');
                                        const friendsList = postBox.querySelector(
                                            '.friends-list ul');
                                        const likesCountElement = postBox.querySelector(
                                            '.friends-list .mdtxt');

                                        // Clear existing avatars
                                        friendsList.innerHTML = '';

                                        // Add new avatars with animation
                                        if (data.liked_users && data.liked_users.length > 0) {
                                            data.liked_users.forEach((user, index) => {
                                                const li = document.createElement('li');
                                                li.style.opacity = '0';
                                                li.style.transform = 'scale(0.5)';

                                                const img = document.createElement('img');
                                                img.src = user.avatar;
                                                img.alt = user.name + "'s avatar";

                                                li.appendChild(img);
                                                friendsList.appendChild(li);

                                                // Animate avatar
                                                setTimeout(() => {
                                                    li.style.transition =
                                                        'all 0.3s ease';
                                                    li.style.opacity = '1';
                                                    li.style.transform = 'scale(1)';
                                                }, index * 100); // Staggered animation
                                            });
                                        }

                                        // Add likes count if more than shown avatars
                                        if (data.likes_count > data.liked_users.length) {
                                            const countLi = document.createElement('li');
                                            const countSpan = document.createElement('span');
                                            countSpan.classList.add('mdtxt', 'd-center');
                                            countSpan.textContent = (data.likes_count - data
                                                .liked_users.length) + '+';
                                            countLi.appendChild(countSpan);
                                            friendsList.appendChild(countLi);
                                        }

                                        // Update likes count text
                                        if (likesCountElement) {
                                            likesCountElement.textContent = data.likes_count + '+';
                                        }

                                        // Update modal likes section
                                        const modalLikesSection = postBox.querySelector(
                                            '.custom-modal .friends-list ul');
                                        if (modalLikesSection) {
                                            // Clear modal avatars
                                            modalLikesSection.innerHTML = '';

                                            // Add new avatars to modal
                                            if (data.liked_users && data.liked_users.length > 0) {
                                                data.liked_users.forEach((user, index) => {
                                                    const li = document.createElement('li');
                                                    li.style.opacity = '0';
                                                    li.style.transform = 'scale(0.5)';

                                                    const img = document.createElement(
                                                        'img');
                                                    img.src = user.avatar;
                                                    img.alt = user.name + "'s avatar";

                                                    li.appendChild(img);
                                                    modalLikesSection.appendChild(li);

                                                    // Animate avatar
                                                    setTimeout(() => {
                                                        li.style.transition =
                                                            'all 0.3s ease';
                                                        li.style.opacity = '1';
                                                        li.style.transform =
                                                            'scale(1)';
                                                    }, index * 100); // Staggered animation
                                                });
                                            }

                                            // Add likes count if more than shown avatars
                                            if (data.likes_count > data.liked_users.length) {
                                                const countLi = document.createElement('li');
                                                const countSpan = document.createElement('span');
                                                countSpan.classList.add('mdtxt', 'd-center');
                                                countSpan.textContent = (data.likes_count - data
                                                    .liked_users.length) + '+';
                                                countLi.appendChild(countSpan);
                                                modalLikesSection.appendChild(countLi);
                                            }

                                            // Update modal likes count text
                                            const modalLikesCountElement = postBox.querySelector(
                                                '.custom-modal .friends-list .mdtxt');
                                            if (modalLikesCountElement) {
                                                modalLikesCountElement.textContent = data
                                                    .likes_count + '+';
                                            }
                                        }
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                        }
                    });
                });

                document.addEventListener('DOMContentLoaded', function() {
                    // Gabungkan selector untuk like button di post dan modal
                    const likeButtons = document.querySelectorAll(
                        '.like-comment-share button:first-child, ' +
                        '.custom-modal .like-comment-share button:first-child'
                    );

                    likeButtons.forEach(likeButton => {
                        likeButton.addEventListener('click', function() {
                            const postId = this.getAttribute('data-post-id');
                            const likeIconContainer = this.querySelector(
                                '.like-icon-container');
                            const outlineIcon = likeIconContainer.querySelector(
                                '.like-icon-outline');
                            const filledIcon = likeIconContainer.querySelector(
                                '.like-icon-filled');

                            if (postId) {
                                fetch('/sosmed/posts/toggle-like', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector(
                                                'meta[name="csrf-token"]').getAttribute(
                                                'content')
                                        },
                                        body: JSON.stringify({
                                            post_id: postId
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Update both post and modal like buttons
                                            const postBox = this.closest(
                                                '.post-single-box');
                                            const postLikeButton = postBox.querySelector(
                                                `.like-comment-share button[data-post-id="${postId}"]`
                                            );
                                            const modalLikeButton = postBox.querySelector(
                                                `.custom-modal .like-comment-share button[data-post-id="${postId}"]`
                                            );

                                            [this, postLikeButton, modalLikeButton].forEach(
                                                button => {
                                                    if (button) {
                                                        const iconContainer = button
                                                            .querySelector(
                                                                '.like-icon-container');
                                                        const outlineIcon =
                                                            iconContainer.querySelector(
                                                                '.like-icon-outline');
                                                        const filledIcon = iconContainer
                                                            .querySelector(
                                                                '.like-icon-filled');

                                                        if (data.liked) {
                                                            outlineIcon.style.display =
                                                                'none';
                                                            filledIcon.style.display =
                                                                'block';
                                                            button.classList.add(
                                                                'liked');
                                                        } else {
                                                            outlineIcon.style.display =
                                                                'block';
                                                            filledIcon.style.display =
                                                                'none';
                                                            button.classList.remove(
                                                                'liked');
                                                        }
                                                    }
                                                });

                                            // Update likes section
                                            const friendsLists = postBox.querySelectorAll(
                                                '.friends-list ul');
                                            friendsLists.forEach(friendsList => {
                                                // Clear existing avatars
                                                friendsList.innerHTML = '';

                                                // Add new avatars with animation
                                                if (data.liked_users && data
                                                    .liked_users.length > 0) {
                                                    data.liked_users.forEach((user,
                                                        index) => {
                                                        const li = document
                                                            .createElement(
                                                                'li');
                                                        li.style.opacity =
                                                            '0';
                                                        li.style.transform =
                                                            'scale(0.5)';

                                                        const img = document
                                                            .createElement(
                                                                'img');
                                                        img.src = user
                                                            .avatar;
                                                        img.alt = user
                                                            .name +
                                                            "'s avatar";

                                                        li.appendChild(img);
                                                        friendsList
                                                            .appendChild(
                                                                li);

                                                        // Animate avatar
                                                        setTimeout(() => {
                                                                li.style
                                                                    .transition =
                                                                    'all 0.3s ease';
                                                                li.style
                                                                    .opacity =
                                                                    '1';
                                                                li.style
                                                                    .transform =
                                                                    'scale(1)';
                                                            }, index *
                                                            100
                                                        ); // Staggered animation
                                                    });
                                                }

                                                // Add likes count if more than shown avatars
                                                if (data.likes_count > data
                                                    .liked_users.length) {
                                                    const countLi = document
                                                        .createElement('li');
                                                    const countSpan = document
                                                        .createElement('span');
                                                    countSpan.classList.add('mdtxt',
                                                        'd-center');
                                                    countSpan.textContent = (data
                                                            .likes_count - data
                                                            .liked_users.length) +
                                                        '+';
                                                    countLi.appendChild(countSpan);
                                                    friendsList.appendChild(
                                                        countLi);
                                                }
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            }
                        });
                    });
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Show Toast Notification
                function showToast(message, type = 'info') {
                    let toastContainer = document.getElementById('toast-container');
                    if (!toastContainer) {
                        toastContainer = document.createElement('div');
                        toastContainer.id = 'toast-container';
                        toastContainer.className = 'fixed top-5 right-5 z-50';
                        document.body.appendChild(toastContainer);
                    }

                    const toast = document.createElement('div');
                    toast.className = `mb-4 p-4 rounded-lg shadow-lg text-white 
            ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}
            animate-slide-in-right`;
                    toast.textContent = message;

                    toastContainer.appendChild(toast);
                    setTimeout(() => {
                        toast.classList.add('animate-fade-out');
                        setTimeout(() => toast.remove(), 500);
                    }, 3000);
                }

                // Handle main comment submission
                function initializeCommentForms() {
                    document.querySelectorAll('.comment-form').forEach(form => {
                        form.addEventListener('submit', async function(e) {
                            e.preventDefault();

                            const postId = this.dataset.postId;
                            const contentInput = this.querySelector('input[name="content"]');
                            const imageInput = this.querySelector('input[name="image"]');
                            const submitButton = this.querySelector('button[type="submit"]');

                            if (!contentInput || !contentInput.value.trim()) {
                                showToast('Please enter a comment', 'error');
                                return;
                            }

                            // Create FormData and append fields
                            const formData = new FormData();
                            formData.append('content', contentInput.value.trim());
                            formData.append('post_id', postId);

                            // Add image if present
                            if (imageInput && imageInput.files[0]) {
                                formData.append('image', imageInput.files[0]);
                            }

                            try {
                                submitButton.disabled = true;
                                const response = await fetch('/sosmed/comment', {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    }
                                });

                                const data = await response.json();

                                if (data.success) {
                                    // Clear inputs
                                    form.reset();

                                    // Clear image preview if exists
                                    const previewContainer = document.getElementById(
                                        `image-preview-modal-${postId}`);
                                    if (previewContainer) {
                                        previewContainer.classList.add('d-none');
                                        const previewImg = previewContainer.querySelector('img');
                                        if (previewImg) previewImg.src = '';
                                    }

                                    // Add new comment to DOM
                                    const commentsArea = document.querySelector(
                                        `#modal-comments-area-${postId}`);
                                    if (commentsArea) {
                                        const commentHtml = createCommentHTML(data.comment);
                                        commentsArea.insertAdjacentHTML('afterbegin', commentHtml);
                                    }

                                    showToast('Comment posted successfully!', 'success');
                                } else {
                                    showToast(data.message || 'Failed to post comment', 'error');
                                }
                            } catch (error) {
                                console.error('Error:', error);
                                showToast('An error occurred while posting the comment', 'error');
                            } finally {
                                submitButton.disabled = false;
                            }
                        });
                    });
                }

                // Create comment HTML
                function createCommentHTML(comment) {
                    return `
            <div class="parent-comment d-flex gap-2 gap-sm-4" id="comment-${comment.id}">
                <div class="avatar-item d-center align-items-baseline">
                    <img class="avatar-img max-un" 
                         src="${comment.user.avatar || '/assets/images/avatar-default.png'}" 
                         alt="avatar">
                </div>
                <div class="info-item active">
                    <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                        <div class="title-area">
                            <h6 class="m-0 mb-2">
                                <a href="#">${comment.user.name}</a>
                            </h6>
                            <p class="mdtxt">${comment.content}</p>
                            ${comment.image ? `
                                                <div class="mt-2">
                                                    <img src="${comment.image}" alt="Comment Image" class="img-fluid rounded">
                                                </div>
                                            ` : ''}
                        </div>
                        <div class="btn-group dropend cus-dropdown">
                            <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-symbols-outlined fs-xxl m-0">more_horiz</i>
                            </button>
                            <ul class="dropdown-menu p-4 pt-2">
                                <li>
                                    <button class="droplist d-flex align-items-center gap-2 delete-comment-btn" 
                                            data-comment-id="${comment.id}">
                                        <i class="material-symbols-outlined mat-icon">delete</i>
                                        <span>Delete Comment</span>
                                    </button>
                                </li>
                                <li>
                                    <a class="droplist d-flex align-items-center gap-2" href="#">
                                        <i class="material-symbols-outlined mat-icon">hide_source</i>
                                        <span>Hide Comment</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="droplist d-flex align-items-center gap-2" href="#">
                                        <i class="material-symbols-outlined mat-icon">flag</i>
                                        <span>Report Comment</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="like-share d-flex gap-6 mt-2">
                        <li class="d-center">
                            <button class="mdtxt like-comment-btn" data-comment-id="${comment.id}">
                                Like <span class="likes-count">(0)</span>
                            </button>
                        </li>
                        <li class="d-center">
                            <button class="mdtxt reply-btn" data-comment-id="${comment.id}">
                                Reply
                            </button>
                        </li>
                        <li class="d-center">
                            <span class="mdtxt">Just now</span>
                        </li>
                    </ul>
                    <form action="#" class="comment-form" id="reply-form-${comment.id}" data-parent-comment-id="${comment.id}" style="display: none;">
                        <div class="d-flex gap-3">
                            <input type="text" name="reply_content" placeholder="Write a reply.." class="form-control py-3" required autocomplete="off">
                            <button type="submit" class="cmn-btn px-2 px-sm-5 px-lg-6">
                                <i class="material-symbols-outlined mat-icon m-0 fs-xxl">near_me</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        `;
                }

                // Handle reply button clicks
                function initializeReplyButtons() {
                    document.addEventListener('click', function(e) {
                        if (e.target.classList.contains('reply-btn')) {
                            const commentId = e.target.dataset.commentId;
                            const replyForm = document.getElementById(`reply-form-${commentId}`);
                            if (replyForm) {
                                replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
                            }
                        }
                    });
                }

                // Handle reply form submissions
                function initializeReplyForms() {
                    document.addEventListener('submit', function(e) {
                        const form = e.target;
                        if (form.classList.contains('comment-form') && form.id.startsWith('reply-form-')) {
                            e.preventDefault();
                            const commentId = form.dataset.parentCommentId;
                            const contentInput = form.querySelector('input[name="reply_content"]');
                            const submitButton = form.querySelector('button[type="submit"]');

                            if (!contentInput || !contentInput.value.trim()) {
                                showToast('Please enter a reply', 'error');
                                return;
                            }

                            submitButton.disabled = true;
                            const formData = new FormData();
                            formData.append('content', contentInput.value.trim());

                            fetch(`/sosmed/comments/${commentId}/reply`, {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                            .getAttribute('content')
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        form.reset();
                                        form.style.display = 'none';

                                        const parentComment = document.getElementById(
                                            `comment-${commentId}`);
                                        if (parentComment) {
                                            const replyHtml = createReplyHTML(data.reply);
                                            parentComment.insertAdjacentHTML('afterend', replyHtml);
                                        }

                                        showToast('Reply posted successfully!', 'success');
                                    } else {
                                        showToast(data.message || 'Failed to post reply', 'error');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    showToast('An error occurred while posting the reply', 'error');
                                })
                                .finally(() => {
                                    submitButton.disabled = false;
                                });
                        }
                    });
                }

                // Create reply HTML
                function createReplyHTML(reply, commentId) {
                    return `
        <div class="child-comment d-flex gap-2 gap-sm-4 ms-5 mt-5" id="comment-${reply.id}">
            <div class="avatar-item d-center align-items-baseline">
                <img class="avatar-img max-un" 
                     src="${reply.user.avatar || '/assets/images/avatar-default.png'}" 
                     alt="avatar">
            </div>
            <div class="info-item active">
                <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                    <div class="title-area">
                        <h6 class="m-0 mb-2">
                            <a href="#">${reply.user.name}</a>
                        </h6>
                        <p class="mdtxt">${reply.content}</p>
                        ${reply.image ? `
                                            <div class="mt-2">
                                                <img src="${reply.image}" alt="Reply Image" class="img-fluid rounded">
                                            </div>
                                        ` : ''}
                    </div>
                    <div class="btn-group dropend cus-dropdown">
                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-symbols-outlined fs-xxl m-0">more_horiz</i>
                        </button>
                        <ul class="dropdown-menu p-4 pt-2">
                            <li>
                                <button class="droplist d-flex align-items-center gap-2 delete-comment-btn" 
                                        data-comment-id="${reply.id}">
                                    <i class="material-symbols-outlined mat-icon">delete</i>
                                    <span>Delete Reply</span>
                                </button>
                            </li>
                            <li>
                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                    <i class="material-symbols-outlined mat-icon">hide_source</i>
                                    <span>Hide Reply</span>
                                </a>
                            </li>
                            <li>
                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                    <i class="material-symbols-outlined mat-icon">flag</i>
                                    <span>Report Reply</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="like-share d-flex gap-6 mt-2">
                    <li class="d-center">
                        <button class="mdtxt like-comment-btn" data-comment-id="${reply.id}">
                            Like <span class="likes-count">(${reply.likes_count || 0})</span>
                        </button>
                    </li>
                    <li class="d-center">
                        <span class="mdtxt">${reply.created_at}</span>
                    </li>
                </ul>
                <br>
            </div>
        </div>
    `;
                }

                // Handle comment/reply likes
                function initializeLikeButtons() {
                    document.addEventListener('click', async function(e) {
                        if (e.target.classList.contains('like-comment-btn')) {
                            const commentId = e.target.dataset.commentId;
                            try {
                                const response = await fetch(
                                    `/sosmed/comments/${commentId}/toggle-comment-like`, {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector(
                                                'meta[name="csrf-token"]').content,
                                            'Accept': 'application/json'
                                        }
                                    });

                                const data = await response.json();
                                if (data.success) {
                                    const allLikeButtons = document.querySelectorAll(
                                        `.like-comment-btn[data-comment-id="${commentId}"]`);
                                    allLikeButtons.forEach(button => {
                                        const likesCount = button.querySelector('.likes-count');
                                        likesCount.textContent = `(${data.likesCount})`;
                                        if (data.isLiked) {
                                            button.classList.add('liked');
                                        } else {
                                            button.classList.remove('liked');
                                        }
                                    });
                                }
                            } catch (error) {
                                console.error('Error:', error);
                                showToast('Failed to update like status', 'error');
                            }
                        }
                    });
                }

                // Handle comment/reply deletion
                function initializeDeleteButtons() {
                    document.addEventListener('click', async function(e) {
                        const deleteButton = e.target.closest('.delete-comment-btn');
                        if (deleteButton) {
                            const commentId = deleteButton.dataset.commentId;
                            if (!confirm('Are you sure you want to delete this comment?')) return;

                            try {
                                const response = await fetch(`/sosmed/comments/${commentId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').content,
                                        'Accept': 'application/json'
                                    }
                                });

                                const data = await response.json();
                                if (data.success) {
                                    const commentElement = document.getElementById(`comment-${commentId}`);
                                    if (commentElement) {
                                        commentElement.remove();
                                        showToast('Comment deleted successfully', 'success');
                                    }
                                } else {
                                    showToast(data.message || 'Failed to delete comment', 'error');
                                }
                            } catch (error) {
                                console.error('Error:', error);
                                showToast('An error occurred while deleting the comment', 'error');
                            }
                        }
                    });
                }

                // Image Preview Functionality
                function initializeImagePreview() {
                    // Make both label and icon clickable
                    document.querySelectorAll('.file-upload-label, .material-symbols-outlined.mat-icon').forEach(
                        element => {
                            element.addEventListener('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();

                                // Find the closest file input
                                const fileUpload = this.closest('.file-upload');
                                if (!fileUpload) return;

                                const fileInput = fileUpload.querySelector('input[type="file"]');
                                if (fileInput) {
                                    fileInput.click();
                                }
                            });
                        });

                    // Handle file input change
                    document.querySelectorAll('input[type="file"][name="image"]').forEach(input => {
                        input.addEventListener('change', function(event) {
                            const fileUpload = this.closest('.file-upload');
                            if (!fileUpload) return;

                            const postId = fileUpload.dataset.postId;
                            const previewContainer = document.getElementById(
                                `image-preview-modal-${postId}`);
                            const previewImg = document.getElementById(`preview-img-modal-${postId}`);
                            const permMediaSpan = fileUpload.querySelector(
                                '.material-symbols-outlined.mat-icon');

                            if (this.files && this.files[0]) {
                                // Validate file size (2MB limit)
                                if (this.files[0].size > 2 * 1024 * 1024) {
                                    showToast('File is too large. Maximum file size is 2MB.', 'error');
                                    this.value = '';
                                    return;
                                }

                                // Validate file type
                                const validTypes = ['image/jpeg', 'image/png', 'image/gif',
                                    'image/webp'
                                ];
                                if (!validTypes.includes(this.files[0].type)) {
                                    showToast(
                                        'Invalid file type. Please upload an image (JPEG, PNG, GIF, or WebP).',
                                        'error');
                                    this.value = '';
                                    return;
                                }

                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    if (previewContainer && previewImg) {
                                        previewImg.src = e.target.result;
                                        previewContainer.classList.remove('d-none');
                                    }
                                    if (permMediaSpan) {
                                        permMediaSpan.style.display = 'none';
                                    }
                                };
                                reader.readAsDataURL(this.files[0]);
                            }
                        });
                    });
                }

                // Remove Image Preview
                window.removePreview = function(modalId) {
                    const previewContainer = document.getElementById(`image-preview-modal-${modalId}`);
                    const fileInput = document.querySelector(`input[name="image"][data-post-id="${modalId}"]`) ||
                        document.querySelector(`input[name="image"].comment-image`);
                    const permMediaSpan = document.querySelector(
                        '.file-upload .material-symbols-outlined.mat-icon');

                    if (previewContainer) {
                        previewContainer.classList.add('d-none');
                        const previewImg = previewContainer.querySelector('img');
                        if (previewImg) previewImg.src = '';
                    }
                    if (fileInput) {
                        fileInput.value = '';
                    }
                    if (permMediaSpan) {
                        permMediaSpan.style.display = '';
                    }
                };

                // Add custom styles for animations
                const style = document.createElement('style');
                style.textContent = `
        @keyframes slide-in-right {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fade-out {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        .animate-slide-in-right {
            animation: slide-in-right 0.5s ease-out;
        }
        .animate-fade-out {
            animation: fade-out 0.5s ease-out;
        }
    `;
                document.head.appendChild(style);

                // Initialize all functionality
                function initializeAll() {
                    initializeCommentForms();
                    initializeReplyButtons();
                    initializeReplyForms();
                    initializeLikeButtons();
                    initializeDeleteButtons();
                    initializeImagePreview();
                }

                // Run initialization
                initializeAll();
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let replyFormCounter = 0;

                // Function untuk membuat form reply dengan ID unik
                function createReplyForm(commentId) {
                    replyFormCounter++;
                    return `
            <form action="#" class="comment-form" id="reply-form-${replyFormCounter}" data-comment-id="${commentId}">
    <div class="d-flex gap-3">
        <input placeholder="Write a comment.." class="py-3">
        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
            <i class="material-symbols-outlined mat-icon m-0 fs-xxl">near_me</i>
        </button>
    </div>
</form>
        `;
                }

                // Function untuk handle reply button
                function attachReplyTriggers() {
                    document.addEventListener('click', function(e) {
                        const replyBtn = e.target.closest('.reply-btn');
                        if (replyBtn) {
                            e.preventDefault();
                            const commentId = replyBtn.getAttribute('data-comment-id');
                            const infoItem = replyBtn.closest('.info-item');
                            if (infoItem) {
                                let replyForm = infoItem.querySelector('.comment-form');

                                if (!replyForm) {
                                    const likeShare = infoItem.querySelector('.like-share');
                                    if (likeShare) {
                                        likeShare.insertAdjacentHTML('afterend', createReplyForm(commentId));
                                        replyForm = infoItem.querySelector('.comment-form');
                                    }
                                }

                                if (replyForm) {
                                    replyForm.style.display = 'block';
                                    const input = replyForm.querySelector('input');
                                    if (input) input.focus();
                                }
                            }
                        }
                    });
                }

                // Function untuk handle form submission
                function attachFormSubmitListeners() {
                    document.addEventListener('submit', function(e) {
                        const form = e.target.closest('.comment-form');
                        if (form) {
                            e.preventDefault();
                            const input = form.querySelector('input');
                            const content = input?.value?.trim();
                            const commentId = form.getAttribute('data-comment-id');

                            if (content && commentId) {
                                // Submit reply to server
                                fetch(`/sosmed/comments/${commentId}/reply`, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector(
                                                'meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify({
                                            content: content
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Create reply HTML
                                            const replyHtml = `
                                <div class="reply-comment d-flex gap-2 gap-sm-4 mt-3">
                                    <div class="avatar-item d-center align-items-baseline">
                                        <img class="avatar-img max-un" src="${data.reply.user.avatar}" alt="avatar">
                                    </div>
                                    <div class="info-item">
                                        <div class="top-area px-4 py-3">
                                            <h6 class="m-0 mb-2">
                                                <a href="#">${data.reply.user.name}</a>
                                            </h6>
                                            <p class="mdtxt">${data.reply.content}</p>
                                        </div>
                                        <ul class="like-share d-flex gap-6 mt-2">
                                            <li class="d-center">
                                                <button class="mdtxt like-comment-btn" data-comment-id="${data.reply.id}">
                                                    Like <span class="likes-count">(0)</span>
                                                </button>
                                            </li>
                                            <li class="d-center">
                                                <span class="mdtxt">${data.reply.created_at}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            `;

                                            let repliesContainer = document.querySelector(
                                                `#comment-${commentId} .replies-container`);
                                            if (!repliesContainer) {
                                                repliesContainer = document.createElement('div');
                                                repliesContainer.className = 'replies-container ml-4 mt-3';
                                                form.closest('.info-item').appendChild(repliesContainer);
                                            }

                                            repliesContainer.insertAdjacentHTML('beforeend', replyHtml);

                                            input.value = '';
                                            form.reset();
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            }
                        }
                    });
                }

                attachReplyTriggers();
                attachFormSubmitListeners();
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Show Toast Notification
                function showToast(message, type = 'info') {
                    let toastContainer = document.getElementById('toast-container');
                    if (!toastContainer) {
                        toastContainer = document.createElement('div');
                        toastContainer.id = 'toast-container';
                        toastContainer.className = 'fixed top-5 right-5 z-50';
                        document.body.appendChild(toastContainer);
                    }

                    const toast = document.createElement('div');
                    toast.className = `
            mb-4 p-4 rounded-lg shadow-lg text-white 
            ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}
            animate-slide-in-right
        `;
                    toast.textContent = message;

                    toastContainer.appendChild(toast);
                    setTimeout(() => {
                        toast.classList.add('animate-fade-out');
                        setTimeout(() => {
                            toast.remove();
                        }, 500);
                    }, 3000);
                }

                // Global function to handle comment deletion
                function handleCommentDeletion(commentId) {
                    const commentElement = document.getElementById(`comment-${commentId}`);
                    if (!commentElement) return;

                    const confirmDelete = confirm('Are you sure you want to delete this comment?');
                    if (!confirmDelete) return;

                    fetch(`/sosmed/comment/${commentId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                commentElement.remove();
                                showToast('Comment deleted successfully!', 'success');
                            } else {
                                showToast(data.message || 'Failed to delete comment', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('An error occurred while deleting the comment', 'error');
                        });
                }

                // Attach delete event listeners
                function attachCommentDeleteListeners() {
                    document.addEventListener('click', function(event) {
                        const deleteButton = event.target.closest('.delete-comment-btn');
                        if (deleteButton) {
                            event.preventDefault();
                            const commentId = deleteButton.dataset.commentId;
                            handleCommentDeletion(commentId);
                        }
                    });
                }

                // Reply button click handler
                function handleReplyClick(commentId) {
                    const commentElement = document.getElementById(`comment-${commentId}`);
                    if (!commentElement) return;

                    const replyForm = commentElement.querySelector('.comment-form');
                    if (replyForm) {
                        replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
                    }
                }

                // Create reply element
                function createReplyElement(reply) {
                    const replyDiv = document.createElement('div');
                    replyDiv.className = 'child-comment d-flex gap-2 gap-sm-4 ms-5 mt-5';
                    replyDiv.id = `comment-${reply.id}`;

                    replyDiv.innerHTML = `
            <div class="avatar-item d-center align-items-baseline">
                <img class="avatar-img max-un" 
                     src="${reply.user.avatar || '/assets/images/avatar-default.png'}" 
                     alt="avatar">
            </div>
            <div class="info-item active">
                <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                    <div class="title-area">
                        <h6 class="m-0 mb-2">
                            <a href="#">${reply.user.name}</a>
                        </h6>
                        <p class="mdtxt">${reply.content}</p>
                        ${reply.image ? `
                                                    <div class="mt-2">
                                                        <img src="${reply.image}" alt="Reply Image" class="reply-image max-w-full rounded">
                                                    </div>
                                                ` : ''}
                    </div>
                    <div class="btn-group dropend cus-dropdown">
                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-symbols-outlined fs-xxl m-0">more_horiz</i>
                        </button>
                        <ul class="dropdown-menu p-4 pt-2">
                            <li>
                                <button class="droplist d-flex align-items-center gap-2 delete-comment-btn" 
                                        data-comment-id="${reply.id}">
                                    <i class="material-symbols-outlined mat-icon">delete</i>
                                    <span>Delete Reply</span>
                                </button>
                            </li>
                            <li>
                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                    <i class="material-symbols-outlined mat-icon">hide_source</i>
                                    <span>Hide Reply</span>
                                </a>
                            </li>
                            <li>
                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                    <i class="material-symbols-outlined mat-icon">flag</i>
                                    <span>Report Reply</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="like-share d-flex gap-6 mt-2">
                    <li class="d-center">
                        <button class="mdtxt like-comment-btn" data-comment-id="${reply.id}">
                            Like <span class="likes-count">(${reply.likes_count || 0})</span>
                        </button>
                    </li>
                    <li class="d-center">
                        <span class="mdtxt">${reply.created_at}</span>
                    </li>
                </ul>
                <br>
            </div>
        `;
                    return replyDiv;
                }

                // Submit reply function
                function submitReply(form, commentId) {
                    const formData = new FormData(form);
                    const submitButton = form.querySelector('button[type="submit"]');
                    const contentInput = form.querySelector('input[name="reply_content"]');

                    if (!contentInput || !contentInput.value.trim()) {
                        showToast('Please enter a reply', 'error');
                        return;
                    }

                    // Add the content to formData with the correct name
                    formData.append('content', contentInput.value.trim());

                    submitButton.disabled = true;
                    submitButton.classList.add('opacity-50');

                    fetch(`/sosmed/comments/${commentId}/reply`, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Clear form
                                form.reset();
                                form.style.display = 'none';

                                // Add reply to DOM
                                const parentComment = document.getElementById(`comment-${commentId}`);
                                if (parentComment) {
                                    const replyElement = createReplyElement(data.reply);
                                    parentComment.after(replyElement);
                                }

                                showToast('Reply submitted successfully!', 'success');
                            } else {
                                showToast(data.message || 'Failed to submit reply', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('An error occurred while submitting the reply', 'error');
                        })
                        .finally(() => {
                            submitButton.disabled = false;
                            submitButton.classList.remove('opacity-50');
                        });
                }

                // Initialize event listeners
                function initializeEventListeners() {
                    // Reply button clicks
                    document.addEventListener('click', function(event) {
                        if (event.target.classList.contains('reply-btn')) {
                            const commentId = event.target.dataset.commentId;
                            handleReplyClick(commentId);
                        }
                    });

                    // Reply form submissions
                    document.addEventListener('submit', function(event) {
                        const form = event.target;
                        if (form.classList.contains('comment-form')) {
                            event.preventDefault();
                            const commentId = form.dataset.parentCommentId;
                            if (commentId) {
                                submitReply(form, commentId);
                            }
                        }
                    });
                }

                // Initial setup
                attachCommentDeleteListeners();
                initializeEventListeners();

                // Add custom styles for animations
                const style = document.createElement('style');
                style.textContent = `
        @keyframes slide-in-right {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fade-out {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        .animate-slide-in-right {
            animation: slide-in-right 0.5s ease-out;
        }
        .animate-fade-out {
            animation: fade-out 0.5s ease-out;
        }
    `;
                document.head.appendChild(style);
            });
        </script>
        <script>
      document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', (e) => {
        const closeBtn = e.target.closest('.modal-close');
        if (closeBtn) {
            console.log('Tombol close diklik!');
            
            // Cek apakah bisa menemukan modal yang terbuka
            const modalOpen = document.querySelector('.custom-modal[style="display: block;"]');
            console.log('Modal yang terbuka:', modalOpen);
            
            if (modalOpen) {
                console.log('Mencoba menutup modal');
                modalOpen.style.display = 'none';
                console.log('Style modal sekarang:', modalOpen.style.display);
            }
            
            // Alternatif cara mencari modal
            // const modalId = closeBtn.closest('.custom-modal').id;
            // console.log('ID Modal:', modalId);
        }
    });
});
        </script>
    </main>
@endsection
