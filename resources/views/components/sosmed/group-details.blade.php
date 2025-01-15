@extends('main-sosmed')
@section('content')
    <main class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="d-block d-lg-none">
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
                                <img class="profile-nusatani avatar-img max-un" src="{{ Auth::user()->avatar }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1"><a href="profile-post">
                                        {{ Auth::user()->name }}
                                    </a></h6>
                                <p class="mdtxt"><span>@</span>{{ Auth::user()->username }} </p>
                            </div>
                        </div>
                        <ul class="profile-link mt-7 mb-7 pb-7">
                            <li>
                                <a href="/sosmed/" class="d-flex gap-4">
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
                                <a href="/sosmed/group" class="d-flex gap-4 active">
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
                <div class="col-xl-9 col-lg-8">
                    <div class="banner-area pages-create mb-5">
                        <div class="single-box p-5">
                            @php
                                $id = request()->segment(3); // Get the group ID from URL
                                $group = App\Models\Group::with(['members', 'members.user'])->findOrFail($id);
                                $isMember = $group->members()->where('user_id', Auth::id())->exists();
                                $memberCount = $group->members->count();
                                $displayedMembers = $group->members->take(3); // Display only first 3 members

                                // Fetch the post data and its related user and media
                                $post = App\Models\Post::with(['user', 'media'])
                                    ->where('group_id', $id)
                                    ->first();

                            @endphp

                            <div class="avatar-area">
                                <img class="avatar-img w-100" src="{{ $group->cover_image }}" alt="image">
                            </div>
                            <div class="top-area py-4 d-center flex-wrap gap-3 justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="abs-avatar-item m-0">
                                        <img class="avatar-img max-un" src="{{ $group->cover_image }}" alt="avatar">
                                    </div>
                                    <div class="text-area text-start">
                                        <h5 class="m-0 mb-1">{{ $group->name }}</h5>
                                        <p class="mdtxt">{{ ucwords($group->privacy) }}
                                            Group-{{ $group->members->count() }} Member</p>
                                    </div>
                                </div>
                                <div class="btn-item d-center gap-3">
                                    <button class="cmn-btn join-group-btn" data-user-id="{{ Auth::id() }}"
                                        data-group-id="{{ $group->id }}"
                                        @if ($isMember) style="background-color: #e0e0e0; color: #b0b0b0; cursor: not-allowed; pointer-events: none;" @endif>
                                        {{ $isMember ? 'Already Registered' : 'Join' }}
                                    </button>
                                </div>
                            </div>
                            <div class="friends-list d-flex flex-wrap gap-2 align-items-center text-center">
                                <ul class="d-flex align-items-center justify-content-center">
                                    @foreach ($displayedMembers as $member)
                                        <li>
                                            <img src="{{ $member->user->avatar ?? asset('assets/images/default-avatar.png') }}"
                                                alt="image">
                                        </li>
                                    @endforeach
                                </ul>
                                <span class="mdtxt d-center">
                                    @if ($memberCount > 3)
                                        {{ $displayedMembers->pluck('user.name')->implode(', ') }} and
                                        {{ $memberCount - 3 }}+ more
                                    @else
                                        {{ $displayedMembers->pluck('user.name')->implode(', ') }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="feed-tab-pane" role="tabpanel" aria-labelledby="feed-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-xxl-8 col-xl-8 col-lg-12 d-flex flex-column gap-7">
                                    <div class="post-item d-flex flex-column gap-5 gap-md-7">
                                        @if ($post)
                                            <div class="post-single-box p-3 p-sm-5">
                                                <div class="top-area pb-5">
                                                    <div class="profile-area d-center justify-content-between">
                                                        <div class="avatar-item d-flex gap-3 align-items-center">
                                                            <div class="avatar position-relative">
                                                                <!-- Display user avatar -->
                                                                <img class="avatar-img max-un"
                                                                    src="{{ asset('storage/avatars/' . $post->user->avatar) }}"
                                                                    alt="avatar">
                                                            </div>
                                                            <div class="info-area">
                                                                <!-- Display user name and link to profile -->
                                                                <h6 class="m-0">
                                                                    <a
                                                                        href="{{ route('user.profile', ['id' => $post->user->id]) }}">
                                                                        {{ $post->user->name }}
                                                                    </a>
                                                                </h6>
                                                                <span class="mdtxt status">Active</span>
                                                            </div>
                                                        </div>
                                                        <div class="btn-group cus-dropdown">
                                                            <button type="button" class="dropdown-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="material-symbols-outlined fs-xxl m-0"> more_horiz
                                                                </i>
                                                            </button>
                                                            <ul class="dropdown-menu p-4 pt-2">
                                                                <li><a class="droplist d-flex align-items-center gap-2"
                                                                        href="#"><i
                                                                            class="material-symbols-outlined mat-icon">
                                                                            bookmark_add </i><span>Saved Post</span></a>
                                                                </li>
                                                                <li><a class="droplist d-flex align-items-center gap-2"
                                                                        href="#"><i
                                                                            class="material-symbols-outlined mat-icon">
                                                                            person_remove </i><span>Unfollow</span></a></li>
                                                                <li><a class="droplist d-flex align-items-center gap-2"
                                                                        href="#"><i
                                                                            class="material-symbols-outlined mat-icon">
                                                                            hide_source </i><span>Hide Post</span></a></li>
                                                                <li><a class="droplist d-flex align-items-center gap-2"
                                                                        href="#"><i
                                                                            class="material-symbols-outlined mat-icon">
                                                                            lock </i><span>Block</span></a></li>
                                                                <li><a class="droplist d-flex align-items-center gap-2"
                                                                        href="#"><i
                                                                            class="material-symbols-outlined mat-icon">
                                                                            flag </i><span>Report Post</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="py-4">
                                                        <!-- Display post caption -->
                                                        <p class="description">{{ $post->caption }}</p>
                                                    </div>
                                                    <div class="post-img">
                                                        <!-- Display post image (if any) -->
                                                        @if ($post->media->isNotEmpty())
                                                            @foreach ($post->media as $media)
                                                                @if ($media->type == 'image')
                                                                    <img src="{{ asset('storage/posts/' . $media->file_path) }}"
                                                                        class="w-100" alt="image">
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div
                                                    class="total-react-share pb-4 d-center gap-2 flex-wrap justify-content-between">
                                                    <div class="friends-list d-flex gap-3 align-items-center text-center">
                                                        <ul class="d-flex align-items-center justify-content-center">
                                                            <!-- Display first 3 members of the group -->
                                                            @foreach ($displayedMembers as $member)
                                                                <li><img src="{{ asset('storage/avatars/' . $member->user->avatar) }}"
                                                                        alt="image"></li>
                                                            @endforeach
                                                            @if ($memberCount > 3)
                                                                <li><span
                                                                        class="mdtxt d-center">{{ $memberCount - 3 }}+</span>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                                        <button class="mdtxt">{{ $post->comments_count }}
                                                            Comments</button>
                                                        <button class="mdtxt">{{ $post->likes_count }} Shares</button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="like-comment-share py-5 d-center flex-wrap gap-3 gap-md-0 justify-content-between">
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
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/images/add-post-avatar.png') }}"
                                                                    class="max-un" alt="icon"></a>
                                                        </div>
                                                        <div
                                                            class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                            <input placeholder="Write a comment...">
                                                            <div class="file-input d-flex gap-1 gap-md-2">
                                                                <div class="file-upload">
                                                                    <label class="file">
                                                                        <input type="file">
                                                                        <span
                                                                            class="file-custom border-0 d-grid text-center">
                                                                            <span
                                                                                class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                                                gif_box </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="file-upload">
                                                                    <label class="file">
                                                                        <input type="file">
                                                                        <span
                                                                            class="file-custom border-0 d-grid text-center">
                                                                            <span
                                                                                class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                                                perm_media </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <span class="mood-area">
                                                                    <span
                                                                        class="material-symbols-outlined mat-icon m-0 xxltxt">
                                                                        mood </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="btn-area d-flex">
                                                            <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                                <i class="material-symbols-outlined mat-icon m-0 fs-xxl">
                                                                    near_me </i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <center>
                                                <p>No post found for this group.</p>
                                            </center>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-10 mt-5 mt-xl-0">
                                    <div class="cus-scrollbar">
                                        <div
                                            class="sidebar-wrapper d-flex al-item flex-wrap justify-content-end justify-content-xl-center flex-column flex-md-row flex-xl-column flex gap-6">
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        About
                                                    </h6>
                                                </div>
                                                <p class="mdtxt descript">Welcome to the hub for all things agriculture! 🌱
                                                    Whether you're a farmer, an enthusiast, or someone interested in
                                                    sustainable farming practices, this space is for you. Here, we share
                                                    tips on crop management, farming technologies, and innovations that help
                                                    us grow better, greener, and smarter. Join the conversation and let's
                                                    cultivate knowledge together! 🌾</p>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Always Growing</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> agriculture </i>
                                                        <span class="mdtxt">31k Farmers</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> public </i>
                                                        <span class="mdtxt">Open Community</span>
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
    </main>
@endsection
