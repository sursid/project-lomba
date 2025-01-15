<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Circlehub - Platform Sosial Media Terbaik')">
    <meta name="keywords" content="@yield('keywords', 'Circlehub, social media, platform sosial')">

    <title>@yield('title') - {{ config('app.name', 'Circlehub') }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <meta property="og:title" content="@yield('title', config('app.name', 'Circlehub'))">
    <meta property="og:description" content="@yield('description', 'Circlehub - Platform Sosial Media Terbaik')">
    <meta property="og:image" content="{{ asset('assets/favicon.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="preloader align-items-center justify-content-center">
        <span class="loader"></span>
    </div>
    <button class="scrollToTop d-none d-lg-block"><i class="mat-icon fas fa-angle-double-up"></i></button>
    <header class="header-section header-menu">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container">
                <nav class="navbar w-100 navbar-expand-lg justify-content-betweenm">
                    <a href="/sosmed/" class="navbar-brand">
                        <img src="{{ asset('assets/favicon.png') }}" class="logo"
                            style="width: 40px; object-fit: contain;" alt="logo">
                    </a>
                    <button class="button search-active d-block d-md-none">
                        <i class="d-center material-symbols-outlined fs-xxl mat-icon"> search </i>
                    </button>
                    <div class="search-form">
                        <form action="#" class="input-area d-flex align-items-center">
                            <i class="material-symbols-outlined mat-icon">search</i>
                            <input type="text" placeholder="Search Circlehubtio" autocomplete="off">
                        </form>
                    </div>
                    <ul
                        class="navbar-nav feed nav-nusatani flex-row gap-xl-10 gap-lg-5 gap-sm-3 gap-1 py-4 py-lg-0 m-lg-auto ms-auto ms-xxl-25 align-self-center">
                        <li class="nav-1 nav-item-home">
                            <a href="/sosmed/" class="nav-icon home active"><i
                                    class="mat-icon fs-xxl material-symbols-outlined mat-icon">home</i></a>
                        </li>
                        <li class="nav-item-feed">
                            <a href="/sosmed/news-feed" class="nav-icon feed"><i
                                    class="mat-icon fs-xxl material-symbols-outlined mat-icon">feed</i></a>
                        </li>
                        <li class="nav-item-group">
                            <a href="/sosmed/group" class="nav-icon"><i
                                    class="mat-icon fs-xxl material-symbols-outlined mat-icon">group</i></a>
                        </li>
                        <li class="nav-item-video">
                            <a href="/sosmed/videos" class="nav-icon"><i
                                    class="mat-icon fs-xxl material-symbols-outlined mat-icon">smart_display</i></a>
                        </li>
                    </ul>
                    <div class="right-area position-relative d-flex gap-3 gap-xxl-6 align-items-center">
                        <div class="single-item d-none d-lg-block messages-area">
                            <div class="messages-btn cmn-head">
                                <div class="icon-area d-center position-relative">
                                    <i class="material-symbols-outlined mat-icon">mail</i>
                                    @php
                                    $totalUnreadMessages = App\Models\Message::where('is_read', false)
                                        ->whereHas('conversation', function ($query) {
                                            $query->where('user1_id', Auth::id())
                                                ->orWhere('user2_id', Auth::id());
                                        })
                                        ->where('sender_id', '!=', Auth::id())
                                        ->count();
                                    @endphp
                                    @if($totalUnreadMessages > 0)
                                    <span class="abs-area position-absolute d-center mdtxt">{{ $totalUnreadMessages }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="main-area p-5 messages-content">
                                <h5 class="mb-8">Messages</h5>
                                @php
                                $conversations = App\Models\Conversation::where(function ($query) {
                                    $query->where('user1_id', Auth::id())
                                        ->orWhere('user2_id', Auth::id());
                                })
                                ->with(['user1', 'user2', 'messages' => function ($query) {
                                    $query->orderBy('created_at', 'desc');
                                }])
                                ->get();
                        
                                // Group messages by sender and accumulate unread count
                                $groupedMessages = [];
                                foreach($conversations as $conversation) {
                                    $otherUser = $conversation->user1_id == Auth::id() ? $conversation->user2 : $conversation->user1;
                                    $senderId = $otherUser->id;
                                    
                                    if (!isset($groupedMessages[$senderId])) {
                                        $groupedMessages[$senderId] = [
                                            'user' => $otherUser,
                                            'latest_message' => $conversation->messages->first(),
                                            'unread_count' => 0
                                        ];
                                    }
                                    
                                    // Add unread count from this conversation
                                    $unreadCount = $conversation->messages
                                        ->where('is_read', false)
                                        ->where('sender_id', '!=', Auth::id())
                                        ->count();
                                    $groupedMessages[$senderId]['unread_count'] += $unreadCount;
                                }
                                @endphp
                        
                                @foreach($groupedMessages as $senderId => $messageData)
                                    <div class="single-box p-0 mb-7">
                                        <a href="" class="d-flex gap-2 align-items-center">
                                            <div class="avatar">
                                                <img class="avatar-img max-un" src="{{ $messageData['user']->avatar }}" alt="avatar">
                                            </div>
                                            <div class="text-area">
                                                <div class="title-area position-relative d-inline-flex align-items-center">
                                                    <h6 class="m-0 d-inline-flex">{{ $messageData['user']->name }}</h6>
                                                    @if($messageData['unread_count'] > 0)
                                                        <span class="notification-badge">{{ $messageData['unread_count'] }}</span>
                                                    @endif
                                                </div>
                                                <p class="mdtxt sms">{{ $messageData['latest_message']->content }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                
                                <div class="btn-area">
                                </div>
                            </div>
                        </div>
                        <div class="single-item d-none d-lg-block messages-area notification-area">
                            <div class="notification-btn cmn-head position-relative">
                                <div class="icon-area d-center position-relative">
                                    <i class="material-symbols-outlined mat-icon">notifications</i>
                                    @php
                                        $unreadNotificationsCount = DB::table('notifications')
                                            ->where('user_id', Auth::id())
                                            ->where('is_read', 0)
                                            ->count();
                                    @endphp
                                    @if($unreadNotificationsCount > 0)
                                    <span class="abs-area position-absolute d-center mdtxt">{{ $unreadNotificationsCount }}</span>
                                    @endif      
                                </div>
                            </div>
                            <div class="main-area p-5 notification-content">
                                <h5 class="mb-8">Notification</h5>
                                @forelse($notifications as $notification)
                                    <div class="single-box p-0 mb-7">
                                        <a href="/sosmed/profile-notification" class="d-flex justify-content-between align-items-center">
                                            <div class="left-item position-relative d-inline-flex gap-3">
                                                <div class="ym-avatar-wrapper">
                                                    <img class="avatar-img max-un" 
                                                         src="{{ $notification->from_user_avatar ?? asset('assets/images/avatar-default.png') }}" 
                                                         alt="avatar">
                                                    @if($notification->type == 'friend_request')
                                                        <img class="ym-notification-icon" 
                                                             src="{{ asset('assets/images/icon/emoji-love.png') }}" 
                                                             alt="icon">
                                                    @elseif($notification->type == 'post_like')
                                                        <img class="ym-notification-icon" 
                                                             src="{{ asset('assets/images/icon/emoji-love.png') }}" 
                                                             alt="icon">
                                                    @else
                                                        <img class="ym-notification-icon" 
                                                             src="{{ asset('assets/images/icon/speech-bubble.png') }}" 
                                                             alt="icon">
                                                    @endif
                                                </div>
                                                <div class="text-area">
                                                    <h6 class="m-0 mb-1">{{ $notification->from_user_name }}</h6>
                                                    <p class="mdtxt">
                                                        @if($notification->type == 'post_like')
                                                            Like your photo
                                                        @elseif($notification->type == 'friend_request') 
                                                            Sent you a request
                                                        @elseif($notification->type == 'post_comment')
                                                            Comment on your post
                                                        @elseif($notification->type == 'post_share')
                                                            Share your post
                                                        @else
                                                            {{ $notification->message }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            @php
                                                $time = \Carbon\Carbon::parse($notification->created_at);
                                                $now = \Carbon\Carbon::now();
                                                
                                                // Format waktu yang lebih singkat
                                                if ($time->diffInMinutes($now) < 60) {
                                                    $timeAgo = $time->diffInMinutes($now) . 'min';
                                                } elseif ($time->diffInHours($now) < 24) {
                                                    $timeAgo = $time->diffInHours($now) . 'hr';
                                                } else {
                                                    $timeAgo = $time->diffInDays($now) . 'd';
                                                }
                                            @endphp
                                                <div class="time-remaining">
                                                    <p class="mdtxt">{{ $timeAgo }}</p>
                                                </div>
                                            </a>
                                                                                    
                                            @if($notification->type == 'friend_request')
                                                <div class="d-flex gap-3 mt-4">
                                                    <button class="nt-notification-btn">Accept</button>
                                                    <button class="nt-notification-btn alt">Delete</button>
                                                </div>
                                            @endif
                                    </div>
                                @empty
                                    <div class="text-center p-4">
                                        <p>No notifications yet</p>
                                    </div>
                                @endforelse
                                <div class="btn-area">
                                    <a href="/sosmed/profile-notification">See all notification</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-item d-none d-lg-block profile-area position-relative">
                            <div class="profile-pic d-flex align-items-center">
                                <span class="avatar cmn-head active-status">
                                    <img class="avatar-img max-un" src="{{ Auth::user()->avatar }}"
                                        alt="avatar">
                                </span>
                            </div>
                            <div class="main-area p-5 profile-content">
                                <div class="head-area">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="avatar-item">
                                            <img class="avatar-img max-un"
                                                src="{{ Auth::user()->avatar }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">{{ Auth::user()->name }}</h6>
                                            <p class="mdtxt">{{ Auth::user()->bio }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="view-profile my-2">
                                    <a href="/sosmed/profile-post" class="mdtxt w-100 text-center py-2">View
                                        profile</a>
                                </div>
                                <ul>
                                    <li>
                                        <a href="/sosmed/profile-edit" class="mdtxt">
                                            <i class="material-symbols-outlined mat-icon"> settings </i>
                                            Settings & Privacy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="mdtxt"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="material-symbols-outlined mat-icon"> power_settings_new </i>
                                            Sign Out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                                <div class="switch-wrapper mt-4 d-flex gap-1 align-items-center">
                                    <i class="mat-icon material-symbols-outlined sun icon"> light_mode </i>
                                    <label class="switch">
                                        <input type="checkbox" class="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                    <i class="mat-icon material-symbols-outlined moon icon"> dark_mode </i>
                                    <span class="mdtxt ms-2">Dark mode</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
    </header>

    <div class="go-live-popup">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="modal cmn-modal fade" id="goLiveMod">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-5">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="material-symbols-outlined mat-icon xxltxt"> close </i>
                                    </button>
                                </div>
                                <div class="top-content pb-5">
                                    <h5>Go Live</h5>
                                </div>
                                <div class="mid-area">
                                    <div class="d-flex mb-5 gap-3">
                                        <div class="profile-box">
                                            <a href="/sosmed/"><img
                                                    src="{{ asset('assets/images/add-post-avatar.png') }}"
                                                    class="max-un" alt="icon"></a>
                                        </div>
                                        <textarea cols="10" rows="2" placeholder="Write something to Lerio.."></textarea>
                                    </div>
                                    <div class="file-upload">
                                        <label>Upload attachment</label>
                                        <label class="file mt-1">
                                            <input type="file">
                                            <span class="file-custom pt-8 pb-8 d-grid text-center">
                                                <i class="material-symbols-outlined mat-icon"> perm_media </i>
                                                <span>Drag here or click to upload photo.</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="footer-area pt-5">
                                    <div class="btn-area d-flex justify-content-end gap-2">
                                        <button type="button" class="cmn-btn alt" data-bs-dismiss="modal"
                                            aria-label="Close">Cancel</button>
                                        <button class="cmn-btn">Go Live</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    @stack('scripts')
    <!--==================================================================-->
    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/plyr.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/plugin.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/close.js') }}" defer></script>
    <script src="{{ asset('assets/js/block.js') }}" defer></script>
    <script src="{{ asset('assets/js/hidden-post.js') }}" defer></script>
    <script src="{{ asset('assets/js/saved-post.js') }}" defer></script>
    <script src="{{ asset('assets/js/report-post.js') }}" defer></script>
    <script src="{{ asset('assets/js/like.js') }}" defer></script>
    <script src="{{ asset('assets/js/delete-post.js') }}" defer></script>
    <script src="{{ asset('assets/js/like-comment.js') }}" defer></script>
    <script src="{{ asset('assets/js/like-anak-comment.js') }}" defer></script>
    <script src="{{ asset('assets/js/delete-reply.js') }}" defer></script>
    <script src="{{ asset('assets/js/delete-comment.js') }}" defer></script>
    <script src="{{ asset('assets/js/comment.js') }}" defer></script>
    <script src="{{ asset('assets/js/reply-comment.js') }}" defer></script>
    <script src="{{ asset('assets/js/upload.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
