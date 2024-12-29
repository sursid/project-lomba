
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Circlehub">
    <meta name="description" content="Circlehub HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Circlehub - HTML Templates</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <!-- start preloader -->
    <div class="preloader align-items-center justify-content-center">
        <span class="loader"></span>
    </div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <button class="scrollToTop d-none d-lg-block"><i class="mat-icon fas fa-angle-double-up"></i></button>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    <header class="header-section header-menu">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container">
                <nav class="navbar w-100 navbar-expand-lg justify-content-betweenm">
                    <a href="index.html" class="navbar-brand">
                        <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="logo">
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
                    <ul class="navbar-nav feed flex-row gap-xl-20 gap-lg-10 gap-sm-7 gap-1 py-4 py-lg-0 m-lg-auto ms-auto ms-aut align-self-center">
                        <li>
                            <a href="index-2.html" class="nav-icon home active"><i class="mat-icon fs-xxl material-symbols-outlined mat-icon">home</i></a>
                        </li>
                        <li>
                            <a href="#news-feed" class="nav-icon feed"><i class="mat-icon fs-xxl material-symbols-outlined mat-icon">feed</i></a>
                        </li>
                        <li>
                            <a href="group.html" class="nav-icon"><i class="mat-icon fs-xxl material-symbols-outlined mat-icon">group</i></a>
                        </li>
                        <li>
                            <a href="videos.html" class="nav-icon"><i class="mat-icon fs-xxl material-symbols-outlined mat-icon">smart_display</i></a>
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
                                    <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-7.png') }}" alt="avatar">
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
                                <div  class="single-box p-0 mb-7">
                                    <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Annette Black</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div  class="single-box p-0 mb-7">
                                    <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Ralph Edwards</h6>
                                            <p class="mdtxt sms">Amet minim mollit non....</p>
                                        </div>
                                    </a>
                                </div>
                                <div  class="single-box p-0 mb-7">
                                    <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Darrell Steward</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div  class="single-box p-0 mb-7">
                                    <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Wade Warren</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div  class="single-box p-0 mb-7">
                                    <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-5.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Kathryn Murphy</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-box p-0 mb-7">
                                    <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                                        <div class="avatar">
                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-6.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Jacob Jones</h6>
                                            <p class="mdtxt">You: consequat sunt</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="btn-area">
                                    <a href="profile-chat.html">See all inbox</a>
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
                                    <a href="profile-notification.html" class="d-flex justify-content-between align-items-center">
                                        <div class="left-item position-relative d-inline-flex gap-3">
                                            <div class="avatar position-relative d-inline-flex">
                                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                                <img class="abs-item position-absolute max-un" src="{{ asset('assets/images/icon/speech-bubble.png') }}" alt="icon">
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
                                    <a href="profile-notification.html" class="d-flex justify-content-between align-items-center">
                                        <div class="left-item position-relative d-inline-flex gap-3">
                                            <div class="avatar position-relative d-inline-flex">
                                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                                                <img class="abs-item position-absolute max-un" src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
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
                                    <a href="profile-notification.html" class="d-flex justify-content-between align-items-center">
                                        <div class="left-item position-relative d-inline-flex gap-3">
                                            <div class="avatar position-relative d-inline-flex">
                                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                                <img class="abs-item position-absolute max-un" src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
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
                                    <a href="profile-notification.html" class="d-flex justify-content-between align-items-center">
                                        <div class="left-item position-relative d-inline-flex gap-3">
                                            <div class="avatar position-relative d-inline-flex">
                                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                                <img class="abs-item position-absolute max-un" src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
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
                                    <a href="profile-notification.html">See all notification</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-item d-none d-lg-block profile-area position-relative">
                            <div class="profile-pic d-flex align-items-center">
                                <span class="avatar cmn-head active-status">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                </span>
                            </div>
                            <div class="main-area p-5 profile-content">
                                <div class="head-area">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="avatar-item">
                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                        </div>
                                        <div class="text-area">
                                            <h6 class="m-0 mb-1">Lori Ferguson</h6>
                                            <p class="mdtxt">Web Developer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="view-profile my-2">
                                    <a href="profile-post.html" class="mdtxt w-100 text-center py-2">View profile</a>
                                </div>
                                <ul>
                                    <li>
                                        <a href="profile-edit.html" class="mdtxt">
                                            <i class="material-symbols-outlined mat-icon"> settings </i>
                                            Settings & Privacy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="mdtxt">
                                            <i class="material-symbols-outlined mat-icon"> power_settings_new </i>
                                            Sign Out
                                        </a>
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
    <!-- header-section end -->

    <!-- Bottom Menu start -->
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
                        <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-7.png') }}" alt="avatar">
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
                    <div  class="single-box p-0 mb-7">
                        <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Annette Black</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div  class="single-box p-0 mb-7">
                        <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Ralph Edwards</h6>
                                <p class="mdtxt sms">Amet minim mollit non....</p>
                            </div>
                        </a>
                    </div>
                    <div  class="single-box p-0 mb-7">
                        <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Darrell Steward</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div  class="single-box p-0 mb-7">
                        <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Wade Warren</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div  class="single-box p-0 mb-7">
                        <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-5.png') }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Kathryn Murphy</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div class="single-box p-0 mb-7">
                        <a href="profile-chat.html" class="d-flex gap-2 align-items-center">
                            <div class="avatar">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-6.png') }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Jacob Jones</h6>
                                <p class="mdtxt">You: consequat sunt</p>
                            </div>
                        </a>
                    </div>
                    <div class="btn-area">
                        <a href="profile-chat.html">See all inbox</a>
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
                        <a href="profile-notification.html" class="d-flex justify-content-between align-items-center">
                            <div class="left-item position-relative d-inline-flex gap-3">
                                <div class="avatar position-relative d-inline-flex">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                    <img class="abs-item position-absolute max-un" src="{{ asset('assets/images/icon/speech-bubble.png') }}" alt="icon">
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
                        <a href="profile-notification.html" class="d-flex justify-content-between align-items-center">
                            <div class="left-item position-relative d-inline-flex gap-3">
                                <div class="avatar position-relative d-inline-flex">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                                    <img class="abs-item position-absolute max-un" src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
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
                        <a href="profile-notification.html" class="d-flex justify-content-between align-items-center">
                            <div class="left-item position-relative d-inline-flex gap-3">
                                <div class="avatar position-relative d-inline-flex">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                    <img class="abs-item position-absolute max-un" src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
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
                        <a href="profile-notification.html" class="d-flex justify-content-between align-items-center">
                            <div class="left-item position-relative d-inline-flex gap-3">
                                <div class="avatar position-relative d-inline-flex">
                                    <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                    <img class="abs-item position-absolute max-un" src="{{ asset('assets/images/icon/emoji-love.png') }}" alt="icon">
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
                        <a href="profile-notification.html">See all notification</a>
                    </div>
                </div>
            </div>
            <div class="single-item profile-area position-relative">
                <div class="profile-pic d-flex align-items-center">
                    <span class="avatar cmn-head active-status">
                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                    </span>
                </div>
                <div class="main-area p-5 profile-content">
                    <div class="head-area">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="avatar-item">
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1">Lori Ferguson</h6>
                                <p class="mdtxt">Web Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="view-profile my-2">
                        <a href="profile-post.html" class="mdtxt w-100 text-center py-2">View profile</a>
                    </div>
                    <ul>
                        <li>
                            <a href="profile-edit.html" class="mdtxt">
                                <i class="material-symbols-outlined mat-icon"> settings </i>
                                Settings & Privacy
                            </a>
                        </li>
                        <li>
                            <a href="#" class="mdtxt">
                                <i class="material-symbols-outlined mat-icon"> power_settings_new </i>
                                Sign Out
                            </a>
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
    <!-- Bottom Menu end -->

    <!-- Main Content start -->
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
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1"><a href="profile-post.html">Lerio Mao</a></h6>
                                <p class="mdtxt">@maolio</p>
                            </div>
                        </div>
                        <ul class="profile-link mt-7 mb-7 pb-7">
                            <li>
                                <a href="friend-request.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>Friend Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="suggestions.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person_add </i>
                                    <span>Suggestions</span>
                                </a>
                            </li>
                            <li>
                                <a href="all-friend.html" class="d-flex gap-4 active">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>All Friend</span>
                                </a>
                            </li>
                            <li>
                                <a href="block-list.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                    <span>Block List</span>
                                </a>
                            </li>
                        </ul>
                        <div class="mb-4">
                            <h6 class="d-inline-flex">
                                Contact
                            </h6>
                        </div>
                        <div class="d-flex flex-column gap-6">
                            <div class="profile-area d-center justify-content-between">
                                <div class="avatar-item d-flex gap-3 align-items-center">
                                    <div class="avatar-item">
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-9.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html" class="mdtxt">Piter Maio</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-7.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html" class="mdtxt">Floyd Miles</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-8.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html" class="mdtxt">Darrell Steward</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html" class="mdtxt">Kristin Watson</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html" class="mdtxt">Jane Cooper</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html" class="mdtxt">Devon Lane</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-9.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html" class="mdtxt">Annette Black</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-10.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html" class="mdtxt">Jerome Bell</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-11.png') }}" alt="avatar">
                                    </div>
                                    <div class="info-area">
                                        <h6 class="m-0"><a href="public-profile-post.html">Guy Hawkins</a></h6>
                                    </div>
                                </div>
                                <div class="btn-group cus-dropdown dropend">
                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                    </button>
                                    <ul class="dropdown-menu p-4 pt-2">
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> person_remove </i>
                                                <span>Unfollow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                <span>Hide Contact</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row cus-mar friend-request">
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-1.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Guy Hawkins</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-2.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Jerome Bell</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-3.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Arlene McCoy</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-4.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Darlene Robertson</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-5.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Bessie Cooper</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-6.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Courtney Henry</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-7.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Cody Fisher</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-8.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Ronald Richards</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-9.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Kristin Watson</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-10.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Darrell Steward</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-11.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Annette Black</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-12.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Devon Lane</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-13.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Kathryn Murphy</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-14.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Ralph Edwards</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-15.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Eleanor Pena</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                            <div class="single-box p-5">
                                <div class="avatar">
                                    <img class="avatar-img w-100" src="{{ asset('assets/images/all-friend-img-16.png') }}" alt="avatar">
                                </div>
                                <a href="public-profile-post.html"><h6 class="m-0 mb-2 mt-3">Esther Howard</h6></a>
                                <div class="btn-area mt-3">
                                    <button class="cmn-btn">Request</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content end -->

    <!-- Go Live Popup start -->
    <div class="go-live-popup">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="modal cmn-modal fade" id="goLiveMod">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-5">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="material-symbols-outlined mat-icon xxltxt"> close </i>
                                    </button>
                                </div>
                                <div class="top-content pb-5">
                                    <h5>Go Live</h5>
                                </div>
                                <div class="mid-area">
                                    <div class="d-flex mb-5 gap-3">
                                        <div class="profile-box">
                                            <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un" alt="icon"></a>
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
                                        <button type="button" class="cmn-btn alt" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
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
    <!-- Go Live Popup end -->

    <!-- video popup start -->
    <div class="go-live-popup video-popup">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="modal cmn-modal fade" id="photoVideoMod">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-5">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="material-symbols-outlined mat-icon xxltxt"> close </i>
                                    </button>
                                </div>
                                <div class="top-content pb-5">
                                    <h5>Add post photo/video</h5>
                                </div>
                                <div class="mid-area">
                                    <div class="d-flex mb-5 gap-3">
                                        <div class="profile-box">
                                            <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un" alt="icon"></a>
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
                                        <button type="button" class="cmn-btn alt" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                        <button class="cmn-btn">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video popup end -->

    <!-- Go Live Popup start -->
    <div class="go-live-popup">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="modal cmn-modal fade" id="activityMod">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-5">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="material-symbols-outlined mat-icon xxltxt"> close </i>
                                    </button>
                                </div>
                                <div class="top-content pb-5">
                                    <h5>Create post</h5>
                                </div>
                                <div class="mid-area">
                                    <div class="d-flex mb-5 gap-3">
                                        <div class="profile-box">
                                            <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un" alt="icon"></a>
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
                                    <div class="tooltips-area d-flex mt-3 gap-2">
                                        <button type="button" class="btn d-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Fallings/Activity">
                                            <i class="material-symbols-outlined mat-icon"> mood </i>
                                        </button>
                                        <button type="button" class="btn d-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Video">
                                            <i class="material-symbols-outlined mat-icon"> movie </i>
                                        </button>
                                        <button type="button" class="btn d-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Maps">
                                            <i class="material-symbols-outlined mat-icon"> location_on </i>
                                        </button>
                                        <button type="button" class="btn d-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Tag">
                                            <i class="material-symbols-outlined mat-icon"> sell </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="footer-area d-flex justify-content-between pt-5">
                                    <div class="left-area">
                                        <select>
                                            <option value="1">Public</option>
                                            <option value="2">Only Me</option>
                                            <option value="3">Friends</option>
                                            <option value="4">Custom</option>
                                        </select>
                                    </div>
                                    <div class="btn-area d-flex justify-content-end gap-2">
                                        <button type="button" class="cmn-btn alt" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                        <button class="cmn-btn">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Go Live Popup end -->

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
</body>

</html>