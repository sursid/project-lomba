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
                                <img class="profile-nusatani avatar-img max-un" src="{{ Auth::user()->avatar }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1"><a href="profile-post">
                                        @if (isset($user))
                                            {{ Auth::user()->name }}
                                        @endif
                                    </a></h6>
                                <p class="mdtxt"><span>@</span>{{ Auth::user()->username }} </p>
                            </div>
                        </div>
                        <ul class="profile-link mt-7 mb-7 pb-7">
                            <li>
                                <a href="/sosmed/" class="d-flex gap-4 active">
                                    <i class="material-symbols-outlined mat-icon"> home </i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/friend-request" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>People</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/event" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> workspace_premium </i>
                                    <span>Event</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/group" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> workspaces </i>
                                    <span>Group</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/marketplace" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> store </i>
                                    <span>Marketplace</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/saved-post" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> sync_saved_locally </i>
                                    <span>Saved</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/favorites" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> bookmark_add </i>
                                    <span>Favorites</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/setting" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> settings </i>
                                    <span>Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-5 col-lg-8 mt-0 mt-lg-10 mt-xl-0 d-flex flex-column gap-7 cus-z">
                    <div class="story-carousel">
                        <!-- Add Story -->
                        <div class="single-item">
                            <div class="single-slide">
                                <a href="#" class="position-relative d-center add-story-btn" id="addStoryButton">
                                    <img class="bg-img" src="{{ Auth::user()->avatar }}" alt="icon">
                                    <div class="abs-area d-grid p-3 position-absolute bottom-0">
                                        <div class="icon-box m-auto d-center mb-3" id="addStoryIcon">
                                            <i class="material-symbols-outlined text-center mat-icon"> add </i>
                                        </div>
                                        <span class="mdtxt" id="addStoryText">Add Story</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    
                        @if(Auth::check() && Auth::user()->stories && Auth::user()->stories->count() > 0)
                            <div class="single-item">
                                <div class="single-slide {{ \App\Models\StoryView::hasViewed(Auth::user()->stories->first()->id, Auth::id()) ? 'story-seen' : 'story-unseen' }}">
                                    <div class="position-relative d-flex story-trigger"
                                        data-story="{{ asset(Auth::user()->stories->first()->media_path) }}"
                                        data-username="{{ Auth::user()->name }}"
                                        data-type="{{ Auth::user()->stories->first()->type }}"
                                        data-story-id="{{ Auth::user()->stories->first()->id }}">
                                        @if (Auth::user()->stories->first()->type == 'video')
                                            <video class="bg-img" src="{{ asset(Auth::user()->stories->first()->media_path) }}" muted playsinline></video>
                                        @else
                                            <img class="bg-img" src="{{ asset(Auth::user()->stories->first()->media_path) }}" alt="story image">
                                        @endif
                                        <div class="abs-area p-3 position-absolute bottom-0">
                                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}'s avatar">
                                            <span class="mdtxt-story" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    
                        @foreach ($stories as $story)
                            <div class="single-item">
                                <div class="single-slide {{ \App\Models\StoryView::hasViewed($story->id, Auth::id()) ? 'story-seen' : 'story-unseen' }}">
                                    <div class="position-relative d-flex story-trigger"
                                        data-story="{{ asset($story->media_path) }}"
                                        data-username="{{ $story->user->name }}"
                                        data-type="{{ $story->type }}"
                                        data-story-id="{{ $story->id }}">
                                        @if ($story->type == 'video')
                                            <video class="bg-img" src="{{ asset($story->media_path) }}" muted playsinline></video>
                                        @else
                                            <img class="bg-img" src="{{ asset($story->media_path) }}" alt="story image">
                                        @endif
                                        <div class="abs-area p-3 position-absolute bottom-0">
                                            <img src="{{ $story->user->avatar }}" alt="{{ $story->user->name }}'s avatar">
                                            <span class="mdtxt-story" title="{{ $story->user->name }}">{{ $story->user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="share-post d-flex gap-3 gap-sm-5 p-3 p-sm-5">
                        <div class="profile-box">
                            <img src="{{ Auth::user()->avatar }}" class="max-un" alt="icon">
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
                                                    <a class="droplist d-flex align-items-center gap-2 toggle-save-post"
                                                        href="#" data-post-id="{{ $post->id }}"
                                                        data-saved="{{ $post->is_saved ? 'true' : 'false' }}">
                                                        <i
                                                            class="material-symbols-outlined mat-icon d-flex align-items-center">
                                                            {{ $post->is_saved ? 'bookmark_remove' : 'bookmark_add' }}
                                                        </i>
                                                        <span
                                                            class="d-flex align-items-center">{{ $post->is_saved ? 'Unsave Post' : 'Save Post' }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="hide-post-{{ $post->id }}"
                                                        class="droplist d-flex align-items-center gap-2" href="#">
                                                        <i class="material-symbols-outlined mat-icon">hide_source</i>
                                                        <span>Hide Post</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#blockUserModal11"
                                                        class="droplist d-flex align-items-center gap-2 block-user"
                                                        data-user-id="{{ $post->user->id }}"
                                                        data-post-id="{{ $post->id }}">
                                                        <i class="material-symbols-outlined mat-icon">lock</i>
                                                        <span>Block</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="droplist d-flex align-items-center gap-2 report-post"
                                                        href="#" data-post-id="{{ $post->id }}">
                                                        <i class="material-symbols-outlined mat-icon">flag</i>
                                                        <span>Report Post</span>
                                                    </a>
                                                </li>
                                                @if ($post->user_id == Auth::id())
                                                    <li>
                                                        <a class="droplist d-flex align-items-center gap-2 delete-post"
                                                            href="#" data-post-id="{{ $post->id }}">
                                                            <i class="material-symbols-outlined mat-icon">delete</i>
                                                            <span>Delete Post</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="report-block-modal" id="reportPostModal_{{ $post->id }}"
                                        style="display: none;">
                                        <div class="report-block-overlay"></div>
                                        <div class="report-block-content">
                                            <div class="report-block-header">
                                                <h5 class="report-block-title">Report Post</h5>
                                                <button type="button" class="report-block-close">
                                                    <i class="material-symbols-outlined">close</i>
                                                </button>
                                            </div>

                                            <div class="report-block-warning">
                                                <i class="material-symbols-outlined">warning</i>
                                            </div>

                                            <div class="report-block-options">
                                                <label class="report-block-option">
                                                    <div class="report-block-radio">
                                                        <input type="radio" name="reportReason_{{ $post->id }}"
                                                            value="spam">
                                                        <span class="checkmark"></span>
                                                    </div>
                                                    <span class="report-block-label">Spam Or Misleading</span>
                                                </label>

                                                <label class="report-block-option">
                                                    <div class="report-block-radio">
                                                        <input type="radio" name="reportReason_{{ $post->id }}"
                                                            value="inappropriate">
                                                        <span class="checkmark"></span>
                                                    </div>
                                                    <span class="report-block-label">Inappropriate Content</span>
                                                </label>

                                                <label class="report-block-option">
                                                    <div class="report-block-radio">
                                                        <input type="radio" name="reportReason_{{ $post->id }}"
                                                            value="harassment">
                                                        <span class="checkmark"></span>
                                                    </div>
                                                    <span class="report-block-label">Harassment Or Hate Speech</span>
                                                </label>

                                                <label class="report-block-option">
                                                    <div class="report-block-radio">
                                                        <input type="radio" name="reportReason_{{ $post->id }}"
                                                            value="other">
                                                        <span class="checkmark"></span>
                                                    </div>
                                                    <span class="report-block-label">Other</span>
                                                </label>

                                                <!-- Additional Info Textarea -->
                                                <div class="report-block-additional" style="display: none;">
                                                    <input type="text" class="form-control"
                                                        placeholder="Please provide additional details..."
                                                        style="margin-top: 12px;">
                                                </div>
                                            </div>

                                            <div class="report-block-buttons">
                                                <button type="button" class="report-block-cancel">Cancel</button>
                                                <button type="button" class="report-block-submit"
                                                    data-post-id="{{ $post->id }}">Report</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Caption --}}
                                    <div class="py-4">
                                        <p class="description">{{ $post->caption }}</p>
                                    </div>

                                    @if ($post->media->count() > 0)
                                        @if ($post->media->count() == 1)
                                            <div class="post-img">
                                                @php $media = $post->media->first(); @endphp
                                                @if ($media->type == 'video')
                                                    <video class="post-video" controls playsinline>
                                                        <source src="{{ asset($media->file_path) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <img src="{{ asset($media->file_path) }}" alt="image">
                                                @endif
                                            </div>
                                        @elseif($post->media->count() == 2)
                                            <div class="post-img-grid two-images">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        @if ($media->type == 'video')
                                                            <video class="post-video" controls playsinline>
                                                                <source src="{{ asset($media->file_path) }}"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            <img src="{{ asset($media->file_path) }}" alt="image">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif($post->media->count() == 3)
                                            <div class="post-img-grid three-images">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        @if ($media->type == 'video')
                                                            <video class="post-video" controls playsinline>
                                                                <source src="{{ asset($media->file_path) }}"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            <img src="{{ asset($media->file_path) }}" alt="image">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif($post->media->count() == 4)
                                            <div class="post-img-grid four-images">
                                                @foreach ($post->media as $media)
                                                    <div class="grid-item">
                                                        @if ($media->type == 'video')
                                                            <video class="post-video" controls playsinline>
                                                                <source src="{{ asset($media->file_path) }}"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            <img src="{{ asset($media->file_path) }}" alt="image">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="post-img-grid four-images">
                                                @foreach ($post->media->take(4) as $index => $media)
                                                    <div class="grid-item {{ $index === 3 ? 'position-relative' : '' }}">
                                                        @if ($media->type == 'video')
                                                            <video class="post-video" controls playsinline>
                                                                <source src="{{ asset($media->file_path) }}"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            <img src="{{ asset($media->file_path) }}" alt="image">
                                                        @endif
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
                                                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}'s avatar"
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
                                        data-post-id="{{ $post->id }}"
                                        data-liked="{{ $post->is_liked ? 'true' : 'false' }}">
                                        <span class="like-icon-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="{{ $post->is_liked ? 'red' : 'none' }}"
                                                stroke="{{ $post->is_liked ? 'red' : 'currentColor' }}" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="like-icon">
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
                                                        <input type="file" id="file-input-1" name="image"
                                                            class="file-input-hidden" accept="image/*">
                                                        <label for="file-input-1" class="file-upload-label d-block">
                                                            <span class="file-upload-icon d-grid text-center">
                                                                <span
                                                                    class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                                    perm_media
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="image-preview-modal-1" class="preview-container d-none mt-2">
                                                    <img id="preview-img-modal-1" src="" alt="Preview"
                                                        class="img-fluid">
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
                                                                    <button
                                                                        class="droplist d-flex align-items-center gap-2 delete-comment-btn"
                                                                        data-comment-id="{{ $previewComment->id }}">
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
                            <div class="block-modal" id="blockUserModal_{{ $post->id }}" style="display: none;">
                                <div class="block-modal-overlay"></div>
                                <div class="block-modal-content">
                                    <div class="block-modal-header">
                                        <button type="button" class="block-modal-close">
                                            <i class="material-symbols-outlined">close</i>
                                        </button>
                                    </div>
                                    <div class="block-modal-body">
                                        <div class="block-modal-icon">
                                            <i class="material-symbols-outlined">lock</i>
                                        </div>
                                        <h5 class="block-modal-title">Block User</h5>
                                        <p class="block-modal-text">Please provide a reason for blocking this user:</p>
                                        <input type="text" class="block-modal-input"
                                            placeholder="Enter your reason here..." autocomplete="off">
                                        <div class="block-modal-buttons">
                                            <button type="button" class="block-modal-button"
                                                data-user-id="{{ $post->user->id }}"
                                                data-post-id="{{ $post->id }}">Block</button>
                                        </div>
                                    </div>
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
                                            @if ($post->media->count() > 0)
                                                @if ($post->media->count() == 1)
                                                    <div class="post-img-grid single-image">
                                                        @foreach ($post->media as $media)
                                                            <div class="grid-item">
                                                                @if ($media->type == 'video')
                                                                    <video class="post-video mb-2" controls playsinline
                                                                        src="{{ asset($media->file_path) }}"></video>
                                                                @else
                                                                    <img src="{{ asset($media->file_path) }}"
                                                                        alt="image">
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif($post->media->count() == 2)
                                                    <div class="post-img-grid two-images">
                                                        @foreach ($post->media as $media)
                                                            <div class="grid-item">
                                                                @if ($media->type == 'video')
                                                                    <video class="post-video mb-2" controls playsinline
                                                                        src="{{ asset($media->file_path) }}"></video>
                                                                @else
                                                                    <img src="{{ asset($media->file_path) }}"
                                                                        alt="image">
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif($post->media->count() == 3)
                                                    <div class="post-img-grid three-images-custom-modal">
                                                        @foreach ($post->media as $media)
                                                            <div class="grid-item">
                                                                @if ($media->type == 'video')
                                                                    <video class="post-video mb-2" controls playsinline
                                                                        src="{{ asset($media->file_path) }}"></video>
                                                                @else
                                                                    <img src="{{ asset($media->file_path) }}"
                                                                        alt="image">
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif($post->media->count() == 4)
                                                    <div class="post-img-grid four-images">
                                                        @foreach ($post->media as $media)
                                                            <div class="grid-item">
                                                                @if ($media->type == 'video')
                                                                    <video class="post-video mb-2" controls playsinline
                                                                        src="{{ asset($media->file_path) }}"></video>
                                                                @else
                                                                    <img src="{{ asset($media->file_path) }}"
                                                                        alt="image">
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="post-img-grid mb-4">
                                                        @foreach ($post->media->take(4) as $index => $media)
                                                            <div
                                                                class="grid-item {{ $index === 3 ? 'position-relative' : '' }}">
                                                                @if ($media->type == 'video')
                                                                    <video class="post-video mb-2" controls playsinline
                                                                        src="{{ asset($media->file_path) }}"></video>
                                                                @else
                                                                    <img src="{{ asset($media->file_path) }}"
                                                                        alt="image">
                                                                @endif
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

                                            <div
                                                class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                                <div class="friends-list d-flex gap-3 align-items-center text-center">
                                                    <ul class="d-flex align-items-center justify-content-center">
                                                        @foreach ($post->likedUsers()->latest('likes.created_at')->take(3)->get() as $user)
                                                            <li>
                                                                <img src="{{ Auth::user()->avatar }}"
                                                                    alt="{{ Auth::user()->name }}'s avatar"
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
                                                            height="24" viewBox="0 0 24 24"
                                                            fill="{{ $post->is_liked ? 'red' : 'none' }}"
                                                            stroke="{{ $post->is_liked ? 'red' : 'currentColor' }}"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="like-icon">
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
                                                        <div
                                                            class="file-upload-container d-flex align-items-center position-relative">
                                                            <input type="file" id="file-input-{{ $post->id }}"
                                                                name="image" class="file-input-hidden" accept="image/*"
                                                                onchange="previewImage(event, 'modal-{{ $post->id }}')">
                                                            <label for="file-input-{{ $post->id }}"
                                                                class="file-upload-label cursor-pointer">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                    height="1em" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M2 6H0v16h20v-2H2zm22-2H14l-2-2H4v16h20zM7 15l4.5-6l3.5 4.51l2.5-3.01L21 15z" />
                                                                </svg>
                                                            </label>
                                                        </div>
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
                                            <div class="comments-area mt-5"
                                                id="modal-comments-area-{{ $post->id }}">
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
                                                                    <input type="text" name="content"
                                                                        placeholder="Write a reply.."
                                                                        class="form-control py-3" required>
                                                                    <button type="button"
                                                                        class="cmn-btn px-2 px-sm-5 px-lg-6"
                                                                        onclick="submitReply({{ $comment->id }}, this)">
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
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                function manageModalLayering() {
                                    const elementsToAdjust = [
                                        ...document.querySelectorAll('.col-xxl-3.col-xl-3.col-lg-4.col-6.cus-z2'),
                                        ...document.querySelectorAll('header'),
                                        ...document.querySelectorAll('nav'),
                                        ...document.querySelectorAll('.header-section'),
                                        ...document.querySelectorAll('.header-menu'),
                                        ...document.querySelectorAll('.header-fixed')
                                    ];
                            
                                    // Simpan nilai asli z-index
                                    const originalZIndexes = new Map();
                            
                                    // Fungsi saat modal dibuka
                                    function onModalOpen() {
                                        elementsToAdjust.forEach(element => {
                                            if (!originalZIndexes.has(element)) {
                                                originalZIndexes.set(element, element.style.zIndex || getComputedStyle(element).zIndex);
                                            }
                                            // Turunkan z-index elemen saat modal dibuka
                                            element.style.zIndex = '0';
                                        });
                                    }
                            
                                    // Fungsi saat modal ditutup
                                    function onModalClose() {
                                        elementsToAdjust.forEach(element => {
                                            // Tetapkan z-index ke nilai tetap
                                            element.style.zIndex = '9999999999999999';
                                        });
                            
                                        // Kosongkan data lama
                                        originalZIndexes.clear();
                                    }
                            
                                    // Tampilkan modal
                                    function showModal(triggerElement) {
                                        const postId = triggerElement.getAttribute('data-post-id');
                                        if (postId) {
                                            const modal = document.getElementById('imageModal' + postId);
                                            if (modal) {
                                                setTimeout(() => {
                                                    modal.style.display = 'block';
                                                    document.body.style.overflow = 'hidden';
                                                    onModalOpen();
                                                    console.log('Modal dibuka:', modal);
                                                }, 50);
                                            }
                                        }
                                    }
                            
                                    // Tutup modal
                                    function closeModal(modalElement) {
                                        if (modalElement) {
                                            modalElement.style.display = 'none'; // Sembunyikan modal
                                            console.log('Modal ditutup:', modalElement);
                                        }
                                        document.body.style.overflow = ''; // Aktifkan scroll kembali
                            
                                        // Kembalikan z-index elemen
                                        onModalClose();
                                        console.log('z-index telah diperbarui ke 9999999999999999');
                                    }
                            
                                    // Ekspor closeModal ke global agar dapat diakses dari HTML
                                    window.closeModal = closeModal;
                            
                                    // Cari elemen pemicu modal
                                    function findModalTriggers() {
                                        const triggers = [];
                                        const postSingleBoxes = document.querySelectorAll('.post-single-box');
                            
                                        postSingleBoxes.forEach(postBox => {
                                            // Action buttons (comment, like, etc)
                                            const actionButtons = postBox.querySelectorAll('.like-comment-share button');
                                            actionButtons.forEach(button => {
                                                const hasChatIcon = button.querySelector('.material-symbols-outlined.mat-icon')?.textContent.trim() === 'chat';
                                                if (hasChatIcon) {
                                                    const postId = postBox.querySelector('[data-post-id]')?.getAttribute('data-post-id');
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
                                                    const postId = postBox.querySelector('[data-post-id]')?.getAttribute('data-post-id');
                                                    if (postId && element) {
                                                        element.setAttribute('data-post-id', postId);
                                                        triggers.push(element);
                                                    }
                                                });
                                            }
                            
                                            // View all comments triggers
                                            const viewAllCommentsLinks = postBox.querySelectorAll('.total-comments .comment-btn');
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
                            
                                    // Tambahkan event listener untuk membuka modal
                                    function attachModalTriggers() {
                                        const modalTriggers = findModalTriggers();
                                        modalTriggers.forEach(trigger => {
                                            trigger.addEventListener('click', function (e) {
                                                e.preventDefault();
                                                showModal(this);
                                            });
                                        });
                                    }
                            
                                    // Tambahkan event listener untuk menutup modal
                                    function attachCloseModalListeners() {
                                        // Tutup modal via overlay
                                        document.querySelectorAll('.modal-overlay').forEach(overlay => {
                                            overlay.addEventListener('click', function () {
                                                const modal = this.closest('.custom-modal');
                                                closeModal(modal);
                                            });
                                        });
                            
                                        // Tutup modal via tombol Escape
                                        document.addEventListener('keydown', function (e) {
                                            if (e.key === 'Escape') {
                                                const openModals = document.querySelectorAll('.custom-modal[style*="display: block"]');
                                                openModals.forEach(modal => {
                                                    closeModal(modal);
                                                });
                                            }
                                        });
                            
                                        // Tutup modal via tombol close-detail
                                        // Semua tombol dengan kelas '.modal-close' akan diproses
                                        document.querySelectorAll('.modal-close').forEach(closeBtn => {
                                            closeBtn.addEventListener('click', function () {
                                                const modal = this.closest('.custom-modal');
                                                closeModal(modal);
                                            });
                                        });
                                    }
                            
                                    // Cegah modal konten menutup modal saat diklik
                                    function preventModalContentClose() {
                                        document.querySelectorAll('.custom-modal .modal-content').forEach(modalContent => {
                                            modalContent.addEventListener('click', function (e) {
                                                e.stopPropagation();
                                            });
                                        });
                                    }
                            
                                    // Inisialisasi semua event listener
                                    function initializeAllInteractions() {
                                        attachModalTriggers();
                                        attachCloseModalListeners();
                                        preventModalContentClose();
                                    }
                            
                                    // Jalankan semua inisialisasi
                                    initializeAllInteractions();
                                }
                            
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
                                    @php
                                        $pendingRequests = App\Models\Friendship::where('friend_id', Auth::id())
                                            ->where('status', 'pending')
                                            ->with('user')
                                            ->get();
                                        
                                        $requestCount = $pendingRequests->count();
                                    @endphp
                                    
                                    <div class="mb-4">
                                        <h6 class="d-inline-flex position-relative">
                                            Request
                                            @if($requestCount > 0)
                                                <span class="notification-badge">{{ $requestCount }}</span>
                                            @endif
                                        </h6>
                                    </div>
                                    <div class="d-grid gap-6">
                                        @foreach($pendingRequests as $request)
                                            @php
                                                $mutualFriends = App\Models\Friendship::where('status', 'accepted')
                                                    ->where(function($query) use ($request) {
                                                        $query->where(function($q) use ($request) {
                                                            $q->where('user_id', Auth::id())
                                                                ->orWhere('friend_id', Auth::id());
                                                        })
                                                        ->whereIn('friend_id', function($subquery) use ($request) {
                                                            $subquery->select('friend_id')
                                                                    ->from('friendships')
                                                                    ->where('user_id', $request->user_id)
                                                                    ->where('status', 'accepted');
                                                        })
                                                        ->orWhereIn('user_id', function($subquery) use ($request) {
                                                            $subquery->select('user_id')
                                                                    ->from('friendships')
                                                                    ->where('friend_id', $request->user_id)
                                                                    ->where('status', 'accepted');
                                                        });
                                                    })
                                                    ->with('friend')
                                                    ->take(3)
                                                    ->get();
                                                
                                                $mutualFriendsCount = $mutualFriends->count();
                                            @endphp
                                            <div class="single-single">
                                                <div class="profile-pic d-flex gap-3 align-items-center">
                                                    <div class="avatar">
                                                        <img class="avatar-img max-un" src="{{ $request->user->avatar }}" alt="avatar">
                                                    </div>
                                                    <div class="text-area">
                                                        <a href="public-profile-post">
                                                            <h6 class="m-0">{{ $request->user->name }}</h6>
                                                        </a>
                                                        @if($mutualFriendsCount > 0)
                                                        <div class="friends-list d-flex gap-3 align-items-center text-center">
                                                            <ul class="d-flex align-items-center justify-content-center">
                                                                @foreach($mutualFriends as $mutualFriend)
                                                                    <li>
                                                                        <img src="{{ $mutualFriend->friend->avatar }}" alt="image">
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <span class="mdtxt d-center">{{ $mutualFriendsCount }} mutual friends</span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-3 mt-4">
                                                    <form action="friendships/{{ $request->id }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="accepted">
                                                        <button class="cmn-btn">Confirm</button>
                                                    </form>
                                                    
                                                    <form action="friendships/{{ $request->id }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="rejected">
                                                        <button class="cmn-btn alt">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="sidebar-area p-5">
                                    @php
                                        $friendships = App\Models\Friendship::where('status', 'accepted')
                                            ->where(function($query) {
                                                $query->where('user_id', Auth::id())
                                                    ->orWhere('friend_id', Auth::id());
                                            })
                                            ->with(['user', 'friend'])
                                            ->get();
                                    @endphp
                                    
                                    <div class="mb-4">
                                        <h6 class="d-inline-flex">Contact</h6>
                                    </div>
                                    <div class="d-flex flex-column gap-6" id="contacts-container">
                                        @foreach($friendships as $friendship)
                                            @php
                                                $contact = $friendship->user_id == Auth::id() ? $friendship->friend : $friendship->user;
                                            @endphp
                                            <div class="profile-area d-center justify-content-between contact-item">
                                                <div class="avatar-item d-flex gap-3 align-items-center">
                                                    <div class="avatar-item">
                                                        <img class="avatar-img max-un" src="{{ $contact->avatar }}" alt="avatar">
                                                    </div>
                                                    <div class="info-area">
                                                        <h6 class="m-0"><a href="public-profile-post" class="mdtxt">{{ $contact->name }}</a></h6>
                                                    </div>
                                                </div>
                                                <div class="btn-group cus-dropdown dropend">
                                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="material-symbols-outlined fs-xxl m-0">more_horiz</i>
                                                    </button>
                                                    <ul class="dropdown-menu p-4 pt-2">
                                                        <li>
                                                            <a class="droplist d-flex align-items-center gap-2 hide-contact">
                                                                <i class="material-symbols-outlined mat-icon">hide_source</i>
                                                                <span>Hide Contact</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('click', function(e) {
                                        if(e.target.closest('.hide-contact')) {
                                            const contactItem = e.target.closest('.contact-item');
                                            contactItem.style.opacity = '0';
                                            setTimeout(() => {
                                                contactItem.remove();
                                            }, 300);
                                        }
                                    });
                                    </script>
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
        <!-- Inside your layout or posts section -->
        <div class="go-live-popup video-popup">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="modal cmn-modal fade" id="photoVideoMod">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-5">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="material-symbols-outlined mat-icon xxltxt"> close </i>
                                        </button>
                                    </div>
                                    <form id="postForm">
                                        @csrf
                                        <div class="top-content pb-5">
                                            <h5>Add post photo/video</h5>
                                        </div>
                                        <div class="mid-area">
                                            @auth
                                                <div class="d-flex mb-5 gap-3">
                                                    <div class="profile-box">
                                                        <a href="/sosmed/">
                                                            <img src="{{ auth()->user()->avatar }}" class="max-un"
                                                                alt="icon">
                                                        </a>
                                                    </div>
                                                    <textarea id="content" cols="10" rows="2"
                                                        placeholder="Apa yang kamu pikirkan, {{ explode(' ', auth()->user()->name)[0] }}?"></textarea>
                                                </div>
                                            @else
                                                <div class="alert alert-warning">
                                                    <p>Anda harus login untuk membuat postingan.</p>
                                                </div>
                                            @endauth
                                            <div class="file-upload">
                                                <label>Upload attachment</label>
                                                <label class="file mt-1">
                                                    <input type="file" id="fileInput" name="files[]" multiple>
                                                    <span class="file-custom pt-8 pb-8 d-grid text-center" id="dropArea">
                                                        <i class="material-symbols-outlined mat-icon"> perm_media </i>
                                                        <span>Drag here or click to upload files.</span>
                                                    </span>
                                                </label>
                                                <!-- Preview Container -->
                                                <div id="imagePreviewContainer" class="image-preview-container mt-3"
                                                    style="display: none;">
                                                    <div class="preview-grid">
                                                        <!-- Preview files will be added here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-area pt-5">
                                            <div class="btn-area d-flex justify-content-end gap-2">
                                                <button type="button" class="cmn-btn alt" data-bs-dismiss="modal"
                                                    aria-label="Close">Cancel</button>
                                                <button type="button" class="cmn-btn" onclick="submitPost()"
                                                    @guest disabled @endguest>Post</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Story Upload Modal -->
        <div class="go-live-popup video-popup">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="modal cmn-modal fade" id="storyUploadModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-5">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="material-symbols-outlined mat-icon xxltxt"> close </i>
                                        </button>
                                    </div>
                                    <form id="storyUploadForm">
                                        @csrf
                                        <div class="top-content pb-5">
                                            <h5>Add Story</h5>
                                        </div>
                                        <div class="mid-area">
                                            @auth
                                                <div class="d-flex mb-5 gap-3">
                                                    <div class="profile-box">
                                                        <a href="/sosmed/">
                                                            <img src="{{ auth()->user()->avatar }}" class="max-un"
                                                                alt="icon">
                                                        </a>
                                                    </div>
                                                    <div class="w-100">
                                                        <input type="text" id="caption"
                                                            class="form-control story-caption-input"
                                                            placeholder="Add a caption..."
                                                            style="height: 50px; padding: 10px 15px; font-size: 16px; border-radius: 10px; background: var(--box-1st-color); border: none;">
                                                    </div>
                                                </div>
                                            @endauth
                                            <div class="file-upload">
                                                <label>Upload Media</label>
                                                <label class="file mt-1">
                                                    <input type="file" id="storyFile" name="media"
                                                        accept="image/*,video/mp4,video/quicktime">
                                                    <span class="file-custom pt-8 pb-8 d-grid text-center"
                                                        id="storyDropArea">
                                                        <i class="material-symbols-outlined mat-icon"> perm_media </i>
                                                        <span>Drag here or click to upload photo/video.</span>
                                                    </span>
                                                </label>
                                                <!-- Preview Container -->
                                                <div id="storyPreviewContainer" class="image-preview-container mt-3"
                                                    style="display: none;">
                                                    <div class="preview-item">
                                                        <img id="imagePreview"
                                                            style="max-height: 300px; width: 100%; object-fit: cover; border-radius: 8px; display: none;"
                                                            src="" alt="Preview">
                                                        <video id="videoPreview"
                                                            style="max-height: 300px; width: 100%; object-fit: cover; border-radius: 8px; display: none;"
                                                            controls>
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-area pt-5">
                                            <div class="btn-area d-flex justify-content-end gap-2">
                                                <button type="button" class="cmn-btn alt"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="cmn-btn">Share Story</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Additional styling for input focus */
            .story-caption-input:focus {
                outline: none;
                border: 1px solid var(--primary-color) !important;
                box-shadow: none;
            }

            .story-caption-input::placeholder {
                color: var(--para-1st-color);
                opacity: 0.7;
            }
        </style>
    </main>
@endsection
