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
                    <a href="/sosmed/sosmed" class="navbar-brand">
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
                                    <span class="abs-area position-absolute d-center mdtxt">4</span>
                                </div>
                            </div>
                            <div class="main-area p-5 messages-content">
                                <h5 class="mb-8">Messages</h5>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-7.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <div class="title-area position-relative d-inline-flex align-items-center">
                                                <h6 class="m-0 d-inline-flex">Piter Maio</h6>
                                                <span class="abs-area position-absolute d-center mdtxt">3</span>
                                            </div>
                                            <p class="mdtxt sms">Amet minim mollit non....</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Annette Black</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Ralph Edwards</h6>
                                            <p class="mdtxt sms">Amet minim mollit non....</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Darrell Steward</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Wade Warren</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-5.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Kathryn Murphy</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-6.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Jacob Jones</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="btn-area">
                                    <a href="/sosmed/profile-chat">See all inbox</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-item d-none d-lg-block messages-area notification-area">
                            <div class="notification-btn cmn-head position-relative">
                                <div class="icon-area d-center position-relative">
                                    <i class="material-symbols-outlined mat-icon">notifications</i>
                                    <span class="abs-area position-absolute d-center mdtxt">3</span>
                                </div>
                            </div>
                            <div class="main-area p-5 notification-content">
                                <h5 class="mb-8">Notification</h5>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-notification"
                                        class="d-flex justify-content-between align-items-center">
                                        <div class="left-item position-relative d-inline-flex gap-3">
                                            <div class="avatar position-relative d-inline-flex">
                                                <img class="avatar-img max-un"
                                                    src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                                <img class="abs-item position-absolute max-un"
                                                    src="{{ asset('assets/images/icon/speech-bubble.png') }}"
                                                    alt="icon">
                                            </div>
                                            <div class="text-area">
                                                <h6 class="m-0 mb-1">Piter Maio</h6>
                                                <p class="mdtxt">Comment on your post</p>
                                            </div>
                                        </div>
                                        <div class="time-remaining">
                                            <p class="mdtxt">Just now</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-notification"
                                        class="d-flex justify-content-between align-items-center">
                                        <div class="left-item position-relative d-inline-flex gap-3">
                                            <div class="avatar position-relative d-inline-flex">
                                                <img class="avatar-img max-un"
                                                    src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                                                <img class="abs-item position-absolute max-un"
                                                    src="{{ asset('assets/images/icon/emoji-love.png') }}"
                                                    alt="icon">
                                            </div>
                                            <div class="text-area">
                                                <h6 class="m-0 mb-1">Kathryn Murphy</h6>
                                                <p class="mdtxt">Like your photo</p>
                                            </div>
                                        </div>
                                        <div class="time-remaining">
                                            <p class="mdtxt">2min</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-notification"
                                        class="d-flex justify-content-between align-items-center">
                                        <div class="left-item position-relative d-inline-flex gap-3">
                                            <div class="avatar position-relative d-inline-flex">
                                                <img class="avatar-img max-un"
                                                    src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                                <img class="abs-item position-absolute max-un"
                                                    src="{{ asset('assets/images/icon/emoji-love.png') }}"
                                                    alt="icon">
                                            </div>
                                            <div class="text-area">
                                                <h6 class="m-0 mb-1">Jacob Jones</h6>
                                                <p class="mdtxt">Sent you a request</p>
                                            </div>
                                        </div>
                                        <div class="time-remaining">
                                            <p class="mdtxt">1hr</p>
                                        </div>
                                    </a>
                                    <div class="d-flex gap-3 mt-4">
                                        <button class="cmn-btn">Accept</button>
                                        <button class="cmn-btn alt">Delete</button>
                                    </div>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="/sosmed/profile-notification"
                                        class="d-flex justify-content-between align-items-center">
                                        <div class="left-item position-relative d-inline-flex gap-3">
                                            <div class="avatar position-relative d-inline-flex">
                                                <img class="avatar-img max-un"
                                                    src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                                <img class="abs-item position-absolute max-un"
                                                    src="{{ asset('assets/images/icon/emoji-love.png') }}"
                                                    alt="icon">
                                            </div>
                                            <div class="text-area">
                                                <h6 class="m-0 mb-1">Kathryn Murphy</h6>
                                                <p class="mdtxt">officia consequat duis enim...</p>
                                            </div>
                                        </div>
                                        <div class="time-remaining">
                                            <p class="mdtxt">2hr</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="btn-area">
                                    <a href="/sosmed/profile-notification">See all notification</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-item d-none d-lg-block profile-area position-relative">
                            <div class="profile-pic d-flex align-items-center">
                                <span class="avatar cmn-head active-status">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}"
                                        alt="avatar">
                                </span>
                            </div>
                            <div class="main-area p-5 profile-content">
                                <div class="head-area">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="avatar-item">
                                            <img class="avatar-img max-un"
                                                src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Lori Ferguson</h6>
                                            <p class="mdtxt">Web Developer</p>
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
    <div class="header-menu py-3 header-menu d-block d-lg-none position-fixed bottom-0 w-100 cus-z">
        <div class="right-area position-relative d-flex justify-content-around gap-3 gap-xxl-6 align-items-center">
            <div class="single-item messages-area">
                <div class="messages-btn cmn-head">
                    <div class="icon-area d-center position-relative">
                        <i class="material-symbols-outlined mat-icon">mail</i>
                        <span class="abs-area position-absolute d-center mdtxt">4</span>
                    </div>
                </div>
                <div class="main-area p-5 messages-content">
                    <h5 class="mb-8">Messages</h5>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-7.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <div class="title-area position-relative d-inline-flex align-items-center">
                                    <h6 class="m-0 d-inline-flex">Piter Maio</h6>
                                    <span class="abs-area position-absolute d-center mdtxt">3</span>
                                </div>
                                <p class="mdtxt sms">Amet minim mollit non....</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Annette Black</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-2.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Ralph Edwards</h6>
                                <p class="mdtxt sms">Amet minim mollit non....</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Darrell Steward</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Wade Warren</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-5.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Kathryn Murphy</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-chat" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-6.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Jacob Jones</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div class="btn-area">
                        <a href="/sosmed/profile-chat">See all inbox</a>
                    </div>
                </div>
            </div>
            <div class="single-item messages-area notification-area">
                <div class="notification-btn cmn-head position-relative">
                    <div class="icon-area d-center position-relative">
                        <i class="material-symbols-outlined mat-icon">notifications</i>
                        <span class="abs-area position-absolute d-center mdtxt">3</span>
                    </div>
                </div>
                <div class="main-area p-5 notification-content">
                    <h5 class="mb-8">Notification</h5>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-notification"
                            class="d-flex justify-content-between align-items-center">
                            <div class="left-item position-relative d-inline-flex gap-3">
                                <div class="avatar position-relative d-inline-flex">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}"
                                        alt="avatar">
                                    <img class="abs-item position-absolute max-un"
                                        src="{{ asset('assets/images/icon/speech-bubble.png') }}" alt="icon">
                                </div>
                                <div class="text-area">
                                    <h6 class="m-0 mb-1">Piter Maio</h6>
                                    <p class="mdtxt">Comment on your post</p>
                                </div>
                            </div>
                            <div class="time-remaining">
                                <p class="mdtxt">Just now</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-notification"
                            class="d-flex justify-content-between align-items-center">
                            <div class="left-item position-relative d-inline-flex gap-3">
                                <div class="avatar position-relative d-inline-flex">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-2.png') }}"
                                        alt="avatar">
                                    <img class="abs-item position-absolute max-un"
                                        src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
                                </div>
                                <div class="text-area">
                                    <h6 class="m-0 mb-1">Kathryn Murphy</h6>
                                    <p class="mdtxt">Like your photo</p>
                                </div>
                            </div>
                            <div class="time-remaining">
                                <p class="mdtxt">2min</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-notification"
                            class="d-flex justify-content-between align-items-center">
                            <div class="left-item position-relative d-inline-flex gap-3">
                                <div class="avatar position-relative d-inline-flex">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}"
                                        alt="avatar">
                                    <img class="abs-item position-absolute max-un"
                                        src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
                                </div>
                                <div class="text-area">
                                    <h6 class="m-0 mb-1">Jacob Jones</h6>
                                    <p class="mdtxt">Sent you a request</p>
                                </div>
                            </div>
                            <div class="time-remaining">
                                <p class="mdtxt">1hr</p>
                            </div>
                        </a>
                        <div class="d-flex gap-3 mt-4">
                            <button class="cmn-btn">Accept</button>
                            <button class="cmn-btn alt">Delete</button>
                        </div>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="/sosmed/profile-notification"
                            class="d-flex justify-content-between align-items-center">
                            <div class="left-item position-relative d-inline-flex gap-3">
                                <div class="avatar position-relative d-inline-flex">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}"
                                        alt="avatar">
                                    <img class="abs-item position-absolute max-un"
                                        src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
                                </div>
                                <div class="text-area">
                                    <h6 class="m-0 mb-1">Kathryn Murphy</h6>
                                    <p class="mdtxt">officia consequat duis enim...</p>
                                </div>
                            </div>
                            <div class="time-remaining">
                                <p class="mdtxt">2hr</p>
                            </div>
                        </a>
                    </div>
                    <div class="btn-area">
                        <a href="/sosmed/profile-notification">See all notification</a>
                    </div>
                </div>
            </div>
            <div class="single-item profile-area position-relative">
                <div class="profile-pic d-flex align-items-center">
                    <span class="avatar cmn-head active-status">
                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}"
                            alt="avatar">
                    </span>
                </div>
                <div class="main-area p-5 profile-content">
                    <div class="head-area">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="avatar-item">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Lori Ferguson</h6>
                                <p class="mdtxt">Web Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="view-profile my-2">
                        <a href="/sosmed/profile-post" class="mdtxt w-100 text-center py-2">View profile</a>
                    </div>
                    <ul>
                        <li>
                            <a href="/sosmed/profile-edit" class="mdtxt">
                                <i class="material-symbols-outlined mat-icon"> settings </i>
                                Settings & Privacy
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="mdtxt"
                                    style="background: none; border: none; cursor: pointer; color: inherit;">
                                    <i class="material-symbols-outlined mat-icon"> power_settings_new </i>
                                    Sign Out
                                </button>
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
    </div>

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

</body>

</html>
