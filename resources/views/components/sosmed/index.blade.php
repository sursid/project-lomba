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
                        {{-- resources/views/components/sosmed/partials/posts.blade.php --}}
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

                                    {{-- Caption --}}
                                    <div class="py-4">
                                        <p class="description">{{ $post->caption }}</p>
                                    </div>

                                    {{-- Media Section --}}
                                    {{-- @if ($post->media->count() > 0)
                                        @if ($post->media->count() == 1)
                                            <div class="post-img">
                                                <img src="{{ asset($post->media->first()->file_path) }}" alt="image">
                                            </div>
                                        @elseif($post->media->count() <= 4)
                                            <div class="post-img-grid">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="post-img-grid">
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
                                    @endif --}}
                                    @if ($post->media->count() > 0)
                                        {{-- Jika hanya 1 gambar --}}
                                        @if ($post->media->count() == 1)
                                            <div class="post-img">
                                                <img src="{{ asset($post->media->first()->file_path) }}" alt="image">
                                            </div>

                                            {{-- Jika 2 gambar --}}
                                        @elseif($post->media->count() == 2)
                                            <div class="post-img-grid two-images">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            {{-- Jika 3 gambar --}}
                                        @elseif($post->media->count() == 3)
                                            <div class="post-img-grid three-images">
                                                @foreach ($post->media as $index => $media)
                                                    <div class="grid-item">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            {{-- Jika 4 gambar --}}
                                        @elseif($post->media->count() == 4)
                                            <div class="post-img-grid four-images">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            {{-- Jika lebih dari 4 gambar --}}
                                        @else
                                            <div class="post-img-grid four-images">
                                                @foreach ($post->media->take(4) as $index => $media)
                                                    <div class="grid-item {{ $index === 3 ? 'position-relative' : '' }}">
                                                        <img src="{{ asset($media->file_path) }}" alt="image">
                                                        {{-- Overlay untuk sisa gambar --}}
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
                                            @foreach ($post->likedUsers as $likedUser)
                                                <li>
                                                    <img src="{{ $likedUser->avatar }}"
                                                        alt="{{ $likedUser->name }}'s avatar">
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
                                        <button class="mdtxt">{{ $post->comments_count }} Comments</button>
                                        <button class="mdtxt">1 Shares</button>
                                    </div>
                                </div>

                                {{-- Action Buttons --}}
                                <div
                                    class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                    <button class="d-center gap-1 gap-sm-2 mdtxt {{ $post->is_liked ? 'liked' : '' }}"
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
                                    <button class="d-center gap-1 gap-sm-2 mdtxt">
                                        <i class="material-symbols-outlined mat-icon"> chat </i>
                                        Comment
                                    </button>
                                    <button class="d-center gap-1 gap-sm-2 mdtxt">
                                        <i class="material-symbols-outlined mat-icon"> share </i>
                                        Share
                                    </button>
                                </div>

                                {{-- Comment Form --}}
                                <form action="#">
                                    <div class="d-flex mt-5 gap-3">
                                        <div class="profile-box d-none d-xxl-block">
                                            <a href="#"><img src="{{ Auth::user()->avatar }}" class="max-un"
                                                    alt="icon"></a>
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
                                                    <span class="material-symbols-outlined mat-icon m-0 xxltxt"> mood
                                                    </span>
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
                                                <button type="button" class="modal-close">
                                                    <i class="material-symbols-outlined mat-icon xxltxt">close</i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body p-0">
                                            <div class="py-4">
                                                <p class="description">{{ $post->caption }}</p>
                                            </div>

                                            <!-- Grid Layout Gambar -->
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




                                            {{-- Modal Post Stats --}}
                                            <div
                                                class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                                <div class="friends-list d-flex gap-3 align-items-center text-center">
                                                    <ul class="d-flex align-items-center justify-content-center">
                                                        @foreach ($post->likedUsers as $likedUser)
                                                            <li>
                                                                <img src="{{ $likedUser->avatar }}"
                                                                    alt="{{ $likedUser->name }}'s avatar">
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
                                                    <button class="mdtxt">{{ $post->comments_count }} Comments</button>
                                                    <button class="mdtxt">1 Shares</button>
                                                </div>
                                            </div>

                                            {{-- Modal Action Buttons --}}
                                            <div
                                                class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
                                                <button
                                                    class="d-center gap-1 gap-sm-2 mdtxt {{ $post->is_liked ? 'liked' : '' }}"
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
                                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                                    <i class="material-symbols-outlined mat-icon">chat</i>
                                                    Comment
                                                </button>
                                                <button class="d-center gap-1 gap-sm-2 mdtxt">
                                                    <i class="material-symbols-outlined mat-icon">share</i>
                                                    Share
                                                </button>
                                            </div>

                                            {{-- Modal Comment Form --}}
                                            <form action="#">
                                                <div class="d-flex mt-5 gap-3">
                                                    <div class="profile-box d-none d-xxl-block">
                                                        <a href="#"><img src="{{ Auth::user()->avatar }}"
                                                                class="max-un" alt="icon"></a>
                                                    </div>
                                                    <div
                                                        class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                        <input placeholder="Write a comment..">
                                                        <div class="file-input d-flex gap-1 gap-md-2">
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span
                                                                            class="material-symbols-outlined mat-icon m-0 xxltxt">gif_box</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span
                                                                            class="material-symbols-outlined mat-icon m-0 xxltxt">perm_media</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <span class="mood-area">
                                                                <span
                                                                    class="material-symbols-outlined mat-icon m-0 xxltxt">mood</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="btn-area d-flex">
                                                        <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                            <i
                                                                class="material-symbols-outlined mat-icon m-0 fs-xxl">near_me</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
                                height: 100%;
                                object-fit: cover;
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
                            }

                            /* Konten modal */
                            .custom-modal .modal-content {
                                position: fixed;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                width: 90%;
                                max-width: 1200px;
                                /* Maksimal lebar modal */
                                max-height: 90vh;
                                overflow-y: auto;
                                border-radius: 10px;
                                /* Tambahan untuk memastikan konten selalu terpusat */
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                box-sizing: border-box;
                                /* Pastikan padding dan border termasuk dalam ukuran */
                            }

                            /* Tombol close modal */
                            .custom-modal .btn-close {
                                position: absolute;
                                top: 10px;
                                right: 10px;
                                background: none;
                                border: none;
                                font-size: 24px;
                                cursor: pointer;
                                z-index: 2147483648;
                            }

                            /* Responsif untuk semua grid */
                            @media (max-width: 768px) {

                                .post-img-grid,
                                .custom-modal .post-img-grid {
                                    grid-template-columns: 1fr 1fr;
                                    /* Dua kolom pada mobile */
                                }

                                /* Jika jumlah gambar ganjil, gambar terakhir full width */
                                .post-img-grid .grid-item:last-child:nth-child(odd),
                                .custom-modal .post-img-grid .grid-item:last-child:nth-child(odd) {
                                    grid-column: 1 / -1;
                                    /* Full width */
                                }

                                .grid-item img {
                                    height: auto;
                                    /* Sesuaikan tinggi pada perangkat kecil */
                                }
                            }
                        </style>






                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Function to manage z-index of elements behind modal
                                function manageModalLayering() {
                                    // Select elements to adjust z-index
                                    const elementsToAdjust = [
                                        // Specific column selector
                                        ...document.querySelectorAll('.col-xxl-3.col-xl-3.col-lg-4.col-6.cus-z2'),

                                        // All headers
                                        ...document.querySelectorAll('header'),

                                        // All navbars
                                        ...document.querySelectorAll('nav'),

                                        // Additional selectors if needed
                                        ...document.querySelectorAll('.header-section'),
                                        ...document.querySelectorAll('.header-menu'),
                                        ...document.querySelectorAll('.header-fixed')
                                    ];

                                    // Find all potential modal triggers
                                    function findModalTriggers() {
                                        const triggers = [];

                                        // Collect all potential triggers across different sections
                                        const postSingleBoxes = document.querySelectorAll('.post-single-box');

                                        postSingleBoxes.forEach(postBox => {
                                            // Triggers from action buttons
                                            const actionButtons = postBox.querySelectorAll('.like-comment-share button');
                                            actionButtons.forEach(button => {
                                                // Check if button contains chat icon
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

                                            // Triggers from comment section
                                            const commentSection = postBox.querySelector('.form-content');
                                            if (commentSection) {
                                                // Add triggers for file uploads and mood area
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

                                            // Existing showModal triggers
                                            const showModalTriggers = postBox.querySelectorAll('.showModal');
                                            showModalTriggers.forEach(trigger => {
                                                triggers.push(trigger);
                                            });
                                        });

                                        return triggers;
                                    }

                                    // Function to lower z-index when modal opens
                                    function onModalOpen() {
                                        elementsToAdjust.forEach(element => {
                                            // Store original z-index before changing
                                            element.setAttribute('data-original-zindex', element.style.zIndex || '');
                                            element.style.zIndex = '-1';
                                        });

                                        // Ensure navbar is at the bottom
                                        const navbars = document.querySelectorAll('nav');
                                        navbars.forEach(nav => {
                                            nav.style.zIndex = '-1';
                                        });
                                    }

                                    // Function to restore z-index when modal closes
                                    function onModalClose() {
                                        elementsToAdjust.forEach(element => {
                                            // Restore original z-index or default to '1'
                                            const originalZIndex = element.getAttribute('data-original-zindex');
                                            element.style.zIndex = originalZIndex || '1';
                                            element.removeAttribute('data-original-zindex');
                                        });

                                        // Restore navbar to front
                                        const navbars = document.querySelectorAll('nav');
                                        navbars.forEach(nav => {
                                            nav.style.zIndex = '1000'; // High z-index to ensure it's in front
                                        });
                                    }

                                    // Show modal function
                                    function showModal(triggerElement) {
                                        // Try to find post ID
                                        const postId = triggerElement.getAttribute('data-post-id');

                                        if (postId) {
                                            const modal = document.getElementById('imageModal' + postId);
                                            if (modal) {
                                                // Delay to ensure proper rendering
                                                setTimeout(() => {
                                                    modal.style.display = 'block';
                                                    document.body.style.overflow = 'hidden'; // Prevent scrolling
                                                    onModalOpen(); // Adjust z-index
                                                }, 50);
                                            }
                                        }
                                    }

                                    // Attach event listeners to modal triggers
                                    function attachModalTriggers() {
                                        const modalTriggers = findModalTriggers();

                                        modalTriggers.forEach(trigger => {
                                            trigger.addEventListener('click', function(e) {
                                                showModal(this);
                                            });
                                        });
                                    }

                                    // Close modal function
                                    function closeModal(modalElement) {
                                        modalElement.style.display = 'none';
                                        document.body.style.overflow = ''; // Enable scrolling
                                        onModalClose(); // Restore z-index
                                    }

                                    // Attach close modal event listeners
                                    function attachCloseModalListeners() {
                                        // Close on close button click
                                        document.querySelectorAll('.modal-close').forEach(closeBtn => {
                                            closeBtn.addEventListener('click', function() {
                                                const modal = this.closest('.custom-modal');
                                                closeModal(modal);
                                            });
                                        });

                                        // Close on overlay click
                                        document.querySelectorAll('.modal-overlay').forEach(overlay => {
                                            overlay.addEventListener('click', function() {
                                                const modal = this.closest('.custom-modal');
                                                closeModal(modal);
                                            });
                                        });

                                        // Close on ESC key
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

                                    // Prevent modal content from closing when clicked
                                    function preventModalContentClose() {
                                        document.querySelectorAll('.custom-modal .modal-content').forEach(modalContent => {
                                            modalContent.addEventListener('click', function(e) {
                                                e.stopPropagation();
                                            });
                                        });
                                    }

                                    // Initialize all modal interactions
                                    function initializeModalInteractions() {
                                        attachModalTriggers();
                                        attachCloseModalListeners();
                                        preventModalContentClose();
                                    }

                                    // Run initialization
                                    initializeModalInteractions();
                                }

                                // Run modal layering management
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
    </main>
@endsection
