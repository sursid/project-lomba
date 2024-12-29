
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
                                <a href="index.html" class="d-flex gap-4">
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
                                <a href="pages.html" class="d-flex gap-4 active">
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
                <div class="col-xl-9 col-lg-8">
                    <div class="banner-area pages-create mb-5">
                        <div class="single-box p-5">
                            <div class="avatar-area">
                                <img class="avatar-img w-100" src="{{ asset('assets/images/page-cover-img.png') }}" alt="image">
                            </div>
                            <div class="top-area py-4 d-center flex-wrap gap-3 justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="avatar-item p">
                                        <img class="avatar-img max-un" src="{{ asset('assets/images/page-avatar-1.png') }}" alt="avatar">
                                    </div>
                                    <div class="text-area text-start">
                                        <h6 class="m-0 mb-1">Travel Moon</h6>
                                        <p class="mdtxt">Travel-30k Liked</p>
                                    </div>
                                </div>
                                <div class="btn-item d-center gap-3">
                                    <a href="#" class="cmn-btn gap-1">
                                        Liked
                                    </a>
                                    <a href="#" class="cmn-btn third gap-1">
                                        <i class="material-symbols-outlined mat-icon fs-xl"> add_box </i>
                                        Invite
                                    </a>
                                    <div class="btn-group cus-dropdown dropend">
                                        <button type="button" class="dropdown-btn d-center px-2" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <span>Hide</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="friends-list d-flex flex-wrap gap-2 align-items-center text-center">
                                <ul class="d-flex align-items-center justify-content-center">
                                    <li><img src="{{ asset('assets/images/avatar-3.png') }}" alt="image"></li>
                                    <li><img src="{{ asset('assets/images/avatar-2.png') }}" alt="image"></li>
                                    <li><img src="{{ asset('assets/images/avatar-4.png') }}" alt="image"></li>
                                    <li><img src="{{ asset('assets/images/avatar-5.png') }}" alt="image"></li>
                                    <li><img src="{{ asset('assets/images/avatar-6.png') }}" alt="image"></li>
                                    <li><img src="{{ asset('assets/images/avatar-7.png') }}" alt="image"></li>
                                    <li><img src="{{ asset('assets/images/avatar-8.png') }}" alt="image"></li>
                                    <li><img src="{{ asset('assets/images/avatar-9.png') }}" alt="image"></li>
                                    <li><img src="{{ asset('assets/images/avatar-10.png') }}" alt="image"></li>
                                </ul>
                                <span class="mdtxt d-center">Rezeka, Martiola, Larmjio, and 10+ more</span>
                            </div>
                            <div class="page-details">
                                <ul class="nav mt-5 pt-4 flex-wrap gap-2 tab-area" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link d-center active" id="feed-tab" data-bs-toggle="tab" data-bs-target="#feed-tab-pane"
                                            type="button" role="tab" aria-controls="feed-tab-pane" aria-selected="true">feed</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link d-center" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-tab-pane"
                                            type="button" role="tab" aria-controls="about-tab-pane" aria-selected="false">about</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link d-center" id="connections-tab" data-bs-toggle="tab" data-bs-target="#connections-tab-pane"
                                            type="button" role="tab" aria-controls="connections-tab-pane" aria-selected="false">connections</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link d-center" id="media-tab" data-bs-toggle="tab" data-bs-target="#media-tab-pane"
                                            type="button" role="tab" aria-controls="media-tab-pane" aria-selected="false">media</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link d-center" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos-tab-pane"
                                            type="button" role="tab" aria-controls="videos-tab-pane" aria-selected="false">videos</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="feed-tab-pane" role="tabpanel" aria-labelledby="feed-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xxl-8 col-xl-8 col-lg-12 d-flex flex-column gap-7">
                                    <div class="post-item d-flex flex-column gap-5 gap-md-7">
                                        <div class="post-single-box p-3 p-sm-5">
                                            <div class="top-area pb-5">
                                                <div class="profile-area d-center justify-content-between">
                                                    <div class="avatar-item d-flex gap-3 align-items-center">
                                                        <div class="avatar position-relative">
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                                        </div>
                                                        <div class="info-area">
                                                            <h6 class="m-0"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                                            <span class="mdtxt status">Active</span>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group cus-dropdown">
                                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <p class="description">I created Roughly plugin to sketch crafted hand-drawn elements which can be used to any usage (diagrams/flows/decoration/etc)</p>
                                                </div>
                                                <div class="post-img">
                                                    <img src="{{ asset('assets/images/post-img-1.png') }}" class="w-100" alt="image">
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
                                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un" alt="icon"></a>
                                                    </div>
                                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                        <input placeholder="Write a comment..">
                                                        <div class="file-input d-flex gap-1 gap-md-2">
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> gif_box </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> perm_media </span>
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
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                                        </div>
                                                        <div class="info-area">
                                                            <h6 class="m-0"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                                            <span class="mdtxt status">Active</span>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group cus-dropdown">
                                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <p class="description">I created Roughly plugin to sketch crafted hand-drawn elements which can be used to any usage (diagrams/flows/decoration/etc)</p>
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
                                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un" alt="icon"></a>
                                                    </div>
                                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                        <input placeholder="Write a comment..">
                                                        <div class="file-input d-flex gap-1 gap-md-2">
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> gif_box </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> perm_media </span>
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
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                                        </div>
                                                        <div class="info-item">
                                                            <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                                <div class="title-area">
                                                                    <h6 class="m-0 mb-3"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                                                    <p class="mdtxt">The only way to solve the problem is to code for the hardware directly</p>
                                                                </div>
                                                                <div class="btn-group dropend cus-dropdown">
                                                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                                    </button>
                                                                    <ul class="dropdown-menu p-4 pt-2">
                                                                        <li>
                                                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                                <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                                                <span>Hide Comments</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                                                        <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="single-comment-area comment-item-nested mt-4 mt-sm-7 ms-13 ms-sm-15">
                                                        <div class="d-flex gap-2 gap-sm-4 align-items-baseline">
                                                            <div class="avatar-item">
                                                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                                            </div>
                                                            <div class="info-item">
                                                                <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                                    <div class="title-area">
                                                                        <h6 class="m-0 mb-3"><a href="public-profile-post.html">Alex</a></h6>
                                                                        <p class="mdtxt">The only way to solve the</p>
                                                                    </div>
                                                                    <div class="btn-group dropend cus-dropdown">
                                                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                                        </button>
                                                                        <ul class="dropdown-menu p-4 pt-2">
                                                                            <li>
                                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                                    <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                                                    <span>Hide Comments</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
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
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-5.png') }}" alt="avatar">
                                                        </div>
                                                        <div class="info-area">
                                                            <h6 class="m-0"><a href="public-profile-post.html">Loprayos</a></h6>
                                                            <span class="mdtxt status">20m Ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group cus-dropdown">
                                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <p class="description">Nam ornare a nibh id sagittis. Vestibulum nec molestie urna, eget convallis mi. Vestibulum rhoncus ligula eget sem sollicitudin interdum. Aliquam massa lectus, fringilla non diam ut, laoreet convallis risus. Curabitur at metus imperdiet, pellentesque ligula vel,</p>
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
                                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un" alt="icon"></a>
                                                    </div>
                                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                        <input placeholder="Write a comment..">
                                                        <div class="file-input d-flex gap-1 gap-md-2">
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> gif_box </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> perm_media </span>
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
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                                        </div>
                                                        <div class="info-item active">
                                                            <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                                <div class="title-area">
                                                                    <h6 class="m-0 mb-3"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                                                    <p class="mdtxt">The only way to solve the problem is to code for the hardware directly</p>
                                                                </div>
                                                                <div class="btn-group dropend cus-dropdown">
                                                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                                    </button>
                                                                    <ul class="dropdown-menu p-4 pt-2">
                                                                        <li>
                                                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                                <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                                                <span>Hide Comments</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                                                        <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="sibling-comment comment-item-nested single-comment-area mt-7 ms-13 ms-sm-15">
                                                        <div class="d-flex gap-2 gap-sm-4 align-items-baseline">
                                                            <div class="avatar-item">
                                                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                                            </div>
                                                            <div class="info-item">
                                                                <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                                    <div class="title-area">
                                                                        <h6 class="m-0 mb-3"><a href="public-profile-post.html">Alexa</a></h6>
                                                                        <p class="mdtxt">The only way to solve the</p>
                                                                    </div>
                                                                    <div class="btn-group dropend cus-dropdown">
                                                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                                        </button>
                                                                        <ul class="dropdown-menu p-4 pt-2">
                                                                            <li>
                                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                                    <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                                                    <span>Hide Comments</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-comment-area comment-item-nested mt-7 ms-13 ms-sm-15">
                                                        <div class="d-flex gap-2 gap-sm-4 align-items-baseline">
                                                            <div class="avatar-item">
                                                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-7.png') }}" alt="avatar">
                                                            </div>
                                                            <div class="info-item">
                                                                <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                                    <div class="title-area">
                                                                        <h6 class="m-0 mb-3"><a href="public-profile-post.html">Haplika</a></h6>
                                                                        <p class="mdtxt">The only way to solve the</p>
                                                                    </div>
                                                                    <div class="btn-group dropend cus-dropdown">
                                                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                                        </button>
                                                                        <ul class="dropdown-menu p-4 pt-2">
                                                                            <li>
                                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                                    <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                                                    <span>Hide Comments</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                                                            <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
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
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                                        </div>
                                                        <div class="info-item w-100">
                                                            <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                                <div class="title-area">
                                                                    <h6 class="m-0 mb-3"><a href="public-profile-post.html">Marlio</a></h6>
                                                                    <div class="post-img">
                                                                        <img src="{{ asset('assets/images/icon/emoji-love-2.png') }}" alt="icon">
                                                                    </div>
                                                                </div>
                                                                <div class="btn-group dropend cus-dropdown">
                                                                    <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                                    </button>
                                                                    <ul class="dropdown-menu p-4 pt-2">
                                                                        <li>
                                                                            <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                                <i class="material-symbols-outlined mat-icon"> hide_source </i>
                                                                                <span>Hide Comments</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="droplist d-flex align-items-center gap-2" href="#">
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
                                                                        <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
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
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                                        </div>
                                                        <div class="info-area">
                                                            <h6 class="m-0"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                                            <span class="mdtxt status">Active</span>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group cus-dropdown">
                                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un" alt="icon"></a>
                                                    </div>
                                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                        <input placeholder="Write a comment..">
                                                        <div class="file-input d-flex gap-1 gap-md-2">
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> gif_box </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> perm_media </span>
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
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                                        </div>
                                                        <div class="info-area">
                                                            <h6 class="m-0"><a href="public-profile-post.html">Lori Cortez</a></h6>
                                                            <span class="mdtxt status">Active</span>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group cus-dropdown">
                                                        <button type="button" class="dropdown-btn" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <p class="description">I created Roughly plugin to sketch crafted hand-drawn elements which can be used to any usage (diagrams/flows/decoration/etc)</p>
                                                </div>
                                                <div class="post-img">
                                                    <img src="{{ asset('assets/images/post-img-1.png') }}" class="w-100" alt="image">
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
                                                        <a href="#"><img src="{{ asset('assets/images/add-post-avatar.png') }}" class="max-un" alt="icon"></a>
                                                    </div>
                                                    <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                        <input placeholder="Write a comment..">
                                                        <div class="file-input d-flex gap-1 gap-md-2">
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> gif_box </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="file-upload">
                                                                <label class="file">
                                                                    <input type="file">
                                                                    <span class="file-custom border-0 d-grid text-center">
                                                                        <span class="material-symbols-outlined mat-icon m-0 xxltxt"> perm_media </span>
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
                                <div class="col-xxl-4 col-xl-4 col-lg-10 mt-5 mt-xl-0">
                                    <div class="cus-scrollbar">
                                        <div class="sidebar-wrapper d-flex al-item flex-wrap justify-content-end justify-content-xl-center flex-column flex-md-row flex-xl-column flex gap-6">
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        Info
                                                    </h6>
                                                </div>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Page- Travel Agency</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt link"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="91e5f4e2e5d1fcf0f8fdbff2fefc">[email&#160;protected]</a></span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt link">www.wisoky.com</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> call </i>
                                                        <span class="mdtxt">(316) 555-0116</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        About
                                                    </h6>
                                                </div>
                                                <p class="mdtxt descript">Lorem ipsum dolor sit amet cons all Ofectetur. Pellentesque ipsum necat  congue pretium cursus orci. It Commodo donec tellus lacus pellentesque sagittis habitant quam amet praesent. </p>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Always</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt">31k Member</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="sidebar-area post-item p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        Photos
                                                    </h6>
                                                </div>
                                                <div class="post-single-box">
                                                    <div class="post-img d-flex justify-content-between flex-wrap gap-2 gap-lg-3">
                                                        <div class="single d-grid gap-3">
                                                            <img src="{{ asset('assets/images/post-img-6.png') }}" alt="image">
                                                            <img src="{{ asset('assets/images/post-img-5.png') }}" alt="image">
                                                        </div>
                                                        <div class="single d-grid gap-3">
                                                            <img src="{{ asset('assets/images/post-img-6.png') }}" alt="image">
                                                            <img src="{{ asset('assets/images/post-img-5.png') }}" alt="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xxl-8 col-xl-7">
                                    <div class="single-box p-3 p-sm-5">
                                        <div class="head-area text-start">
                                            <h6>Bio</h6>
                                            <p class="mdtxt mt-6">“Lorem ipsum dolor sit amet consectetur. Nec donec vestibulum eleifend lectus ipsum ultrices et dictum”.</p>
                                        </div>
                                        <ul class="d-grid gap-3 mt-4">
                                            <li class="d-center gap-3 justify-content-between">
                                                <div class="info-area d-flex align-items-center gap-2">
                                                    <i class="material-symbols-outlined mat-icon"> integration_instructions </i>
                                                    <span class="mdtxt">Developer</span>
                                                </div>
                                                <div class="input-item d-center text-start">
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-3 m-0"> public </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> public </i>
                                                                    <span>Public</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                                                    <span>Only me</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center ps-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> edit </i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> delete </i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-center gap-3 justify-content-between">
                                                <div class="info-area d-flex align-items-center gap-2">
                                                    <i class="material-symbols-outlined mat-icon"> school </i>
                                                    <span class="mdtxt">Master's degree</span>
                                                </div>
                                                <div class="input-item d-center text-start">
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-3 m-0"> public </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> public </i>
                                                                    <span>Public</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                                                    <span>Only me</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center ps-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> edit </i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> delete </i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-center gap-3 justify-content-between">
                                                <div class="info-area d-flex align-items-center gap-2">
                                                    <i class="material-symbols-outlined mat-icon"> flag </i>
                                                    <span class="mdtxt link"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6317061017230e020a0f4d000c0e">[email&#160;protected]</a></span>
                                                </div>
                                                <div class="input-item d-center text-start">
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-3 m-0"> public </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> public </i>
                                                                    <span>Public</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                                                    <span>Only me</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center ps-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> edit </i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> delete </i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-center gap-3 justify-content-between">
                                                <div class="info-area d-flex align-items-center gap-2">
                                                    <i class="material-symbols-outlined mat-icon"> language </i>
                                                    <span class="mdtxt link">www.wisoky.com</span>
                                                </div>
                                                <div class="input-item d-center text-start">
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-3 m-0"> public </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> public </i>
                                                                    <span>Public</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                                                    <span>Only me</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center ps-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> edit </i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> delete </i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-center gap-3 justify-content-between">
                                                <div class="info-area d-flex align-items-center gap-2">
                                                    <i class="material-symbols-outlined mat-icon"> call </i>
                                                    <span class="mdtxt">(316) 555-0116</span>
                                                </div>
                                                <div class="input-item d-center text-start">
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-3 m-0"> public </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> public </i>
                                                                    <span>Public</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                                                    <span>Only me</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center ps-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> edit </i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> delete </i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-center gap-3 justify-content-between">
                                                <div class="info-area d-flex align-items-center gap-2">
                                                    <i class="material-symbols-outlined mat-icon"> pin_drop </i>
                                                    <span class="mdtxt">USA</span>
                                                </div>
                                                <div class="input-item d-center text-start">
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-3 m-0"> public </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> public </i>
                                                                    <span>Public</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                                                    <span>Only me</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center ps-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> edit </i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> delete </i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-center gap-3 justify-content-between">
                                                <div class="info-area d-flex align-items-center gap-2">
                                                    <i class="material-symbols-outlined mat-icon"> house </i>
                                                    <span class="mdtxt">775 Rolling Green Rd.</span>
                                                </div>
                                                <div class="input-item d-center text-start">
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-3 m-0"> public </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> public </i>
                                                                    <span>Public</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                                                    <span>Only me</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> share </i>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="group-btn cus-dropdown dropend">
                                                        <button type="button" class="dropdown-btn d-center ps-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-symbols-outlined fs-xxl m-0"> more_horiz </i>
                                                        </button>
                                                        <ul class="dropdown-menu p-4 pt-2">
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> edit </i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="droplist d-flex align-items-center gap-2" href="#">
                                                                    <i class="material-symbols-outlined mat-icon"> delete </i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-5 col-lg-10 mt-5 mt-xl-0">
                                    <div class="cus-scrollbar">
                                        <div class="sidebar-wrapper d-flex al-item flex-wrap justify-content-end justify-content-xl-center flex-column flex-md-row flex-xl-column flex gap-6">
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        Info
                                                    </h6>
                                                </div>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Page- Travel Agency</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt link"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f387968087b39e929a9fdd909c9e">[email&#160;protected]</a></span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt link">www.wisoky.com</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> call </i>
                                                        <span class="mdtxt">(316) 555-0116</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        About
                                                    </h6>
                                                </div>
                                                <p class="mdtxt">Lorem ipsum dolor sit amet cons all Ofectetur. Pellentesque ipsum necat  congue pretium cursus orci. It Commodo donec tellus lacus pellentesque sagittis habitant quam amet praesent. </p>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Always</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt">31k Member</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connections-tab-pane" role="tabpanel" aria-labelledby="connections-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xxl-8">
                                    <div class="single-box p-5">
                                        <ul class="nav flex-wrap gap-2 tab-area" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link d-center active" id="followers-tab" data-bs-toggle="tab" data-bs-target="#followers-tab-pane" type="button" role="tab" aria-controls="followers-tab-pane" aria-selected="true">followers</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="following-tab" data-bs-toggle="tab" data-bs-target="#following-tab-pane" type="button" role="tab" aria-controls="following-tab-pane" aria-selected="false" tabindex="-1">following</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="followers-tab-pane" role="tabpanel" aria-labelledby="followers-tab" tabindex="0">
                                            <div class="search-area d-center my-7 flex-wrap gap-2 justify-content-between">
                                                <div class="total-followers">
                                                    <h6>30k Followers</h6>
                                                </div>
                                                <form action="#" class="d-flex align-items-stretch justify-content-between gap-4">
                                                    <div class="input-area py-2 w-100 gap-2 d-flex align-items-center">
                                                        <i class="material-symbols-outlined mat-icon">search</i>
                                                        <input type="text" placeholder="Search" autocomplete="off">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-1.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Cameron Williamson</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-2.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Esther Howard</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-3.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Brooklyn Simmons</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-4.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Courtney Henry</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-5.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Eleanor Pena</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-6.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Arlene McCoy</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-7.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Devon Lane</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-8.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Ronald Richards</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-9.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Kathryn Murphy</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-10.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="#">Darrell Steward</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-11.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Guy Hawkins</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-12.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="#">Floyd Miles</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-13.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Cameron Williamson</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-14.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Wade Warren</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-12 my-5 text-center">
                                                    <button class="cmn-btn alt third fw-600">Load More</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="following-tab-pane" role="tabpanel" aria-labelledby="following-tab" tabindex="0">
                                            <div class="search-area d-center my-7 flex-wrap gap-2 justify-content-between">
                                                <div class="total-followers">
                                                    <h6>30k Followers</h6>
                                                </div>
                                                <form action="#" class="d-flex align-items-stretch justify-content-between gap-4">
                                                    <div class="input-area py-2 w-100 gap-2 d-flex align-items-center">
                                                        <i class="material-symbols-outlined mat-icon">search</i>
                                                        <input type="text" placeholder="Search" autocomplete="off">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-6.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Arlene McCoy</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-7.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Devon Lane</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-8.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Ronald Richards</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-9.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Kathryn Murphy</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-3.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Brooklyn Simmons</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-13.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Cameron Williamson</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-md-6">
                                                    <div class="single-box member-single p-3">
                                                        <div class="profile-area d-center justify-content-between">
                                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                                <div class="avatar-item">
                                                                    <img class="avatar-img max-un" src="{{ asset('assets/images/followers-img-14.png') }}" alt="avatar">
                                                                </div>
                                                                <div class="info-area text-start">
                                                                    <h6 class="m-0"><a href="public-profile-post.html">Wade Warren</a></h6>
                                                                    <p class="mdtxt status">10 Mutual Friends</p>
                                                                </div>
                                                            </div>
                                                            <div class="group-btn cus-dropdown">
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
                                                <div class="col-12 my-5 text-center">
                                                    <button class="cmn-btn alt third fw-600">Load More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-10 mt-5 mt-xl-0">
                                    <div class="cus-scrollbar">
                                        <div class="sidebar-wrapper d-flex al-item flex-wrap justify-content-end justify-content-xl-center flex-column flex-md-row flex-xl-column flex gap-6">
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        Info
                                                    </h6>
                                                </div>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Page- Travel Agency</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt link"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9de9f8eee9ddf0fcf4f1b3fef2f0">[email&#160;protected]</a></span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt link">www.wisoky.com</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> call </i>
                                                        <span class="mdtxt">(316) 555-0116</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        About
                                                    </h6>
                                                </div>
                                                <p class="mdtxt">Lorem ipsum dolor sit amet cons all Ofectetur. Pellentesque ipsum necat  congue pretium cursus orci. It Commodo donec tellus lacus pellentesque sagittis habitant quam amet praesent. </p>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Always</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt">31k Member</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="media-tab-pane" role="tabpanel" aria-labelledby="media-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xxl-8">
                                    <div class="single-box p-5">
                                        <div class="row cus-mar">
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-1.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-2.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-3.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-4.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-5.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-6.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-7.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-8.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-9.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-10.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-11.png') }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-box">
                                                    <img class="w-100" src="{{ asset('assets/images/photo-gallery-12.png') }}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-10 mt-5 mt-xl-0">
                                    <div class="cus-scrollbar">
                                        <div class="sidebar-wrapper d-flex al-item flex-wrap justify-content-end justify-content-xl-center flex-column flex-md-row flex-xl-column flex gap-6">
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        Info
                                                    </h6>
                                                </div>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Page- Travel Agency</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt link"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fd89988e89bd909c9491d39e9290">[email&#160;protected]</a></span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt link">www.wisoky.com</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> call </i>
                                                        <span class="mdtxt">(316) 555-0116</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        About
                                                    </h6>
                                                </div>
                                                <p class="mdtxt">Lorem ipsum dolor sit amet cons all Ofectetur. Pellentesque ipsum necat  congue pretium cursus orci. It Commodo donec tellus lacus pellentesque sagittis habitant quam amet praesent. </p>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Always</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt">31k Member</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="videos-tab-pane" role="tabpanel" aria-labelledby="videos-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xxl-8 col-xl-8">
                                    <div class="single-box p-5">
                                        <div class="row cus-mar">
                                            <div class="col-md-6">
                                                <div class="single-box">
                                                    <div class="magnific-area position-relative d-flex align-items-center justify-content-around">
                                                        <div class="bg-area w-100">
                                                            <img class="bg-item w-100" src="{{ asset('assets/images/video-bg-1.png') }}" alt="image">
                                                        </div>
                                                        <div class="content-area text-center position-absolute d-flex align-items-center justify-content-center">
                                                            <div class="content-box">
                                                                <a class="mfp-iframe popupvideo d-flex align-items-center justify-content-center" href="https://www.youtube.com/watch?v=Djz8Nc0Qxwk">
                                                                    <i class="material-symbols-outlined mat-icon fs-1"> play_arrow </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-box">
                                                    <div class="magnific-area position-relative d-flex align-items-center justify-content-around">
                                                        <div class="bg-area w-100">
                                                            <img class="bg-item w-100" src="{{ asset('assets/images/video-bg-2.png') }}" alt="image">
                                                        </div>
                                                        <div class="content-area text-center position-absolute d-flex align-items-center justify-content-center">
                                                            <div class="content-box">
                                                                <a class="mfp-iframe popupvideo d-flex align-items-center justify-content-center" href="https://www.youtube.com/watch?v=Djz8Nc0Qxwk">
                                                                    <i class="material-symbols-outlined mat-icon fs-1"> play_arrow </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-box">
                                                    <div class="magnific-area position-relative d-flex align-items-center justify-content-around">
                                                        <div class="bg-area w-100">
                                                            <img class="bg-item w-100" src="{{ asset('assets/images/video-bg-3.png') }}" alt="image">
                                                        </div>
                                                        <div class="content-area text-center position-absolute d-flex align-items-center justify-content-center">
                                                            <div class="content-box">
                                                                <a class="mfp-iframe popupvideo d-flex align-items-center justify-content-center" href="https://www.youtube.com/watch?v=Djz8Nc0Qxwk">
                                                                    <i class="material-symbols-outlined mat-icon fs-1"> play_arrow </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-box">
                                                    <div class="magnific-area position-relative d-flex align-items-center justify-content-around">
                                                        <div class="bg-area w-100">
                                                            <img class="bg-item w-100" src="{{ asset('assets/images/video-bg-4.png') }}" alt="image">
                                                        </div>
                                                        <div class="content-area text-center position-absolute d-flex align-items-center justify-content-center">
                                                            <div class="content-box">
                                                                <a class="mfp-iframe popupvideo d-flex align-items-center justify-content-center" href="https://www.youtube.com/watch?v=Djz8Nc0Qxwk">
                                                                    <i class="material-symbols-outlined mat-icon fs-1"> play_arrow </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-box">
                                                    <div class="magnific-area position-relative d-flex align-items-center justify-content-around">
                                                        <div class="bg-area w-100">
                                                            <img class="bg-item w-100" src="{{ asset('assets/images/video-bg-5.png') }}" alt="image">
                                                        </div>
                                                        <div class="content-area text-center position-absolute d-flex align-items-center justify-content-center">
                                                            <div class="content-box">
                                                                <a class="mfp-iframe popupvideo d-flex align-items-center justify-content-center" href="https://www.youtube.com/watch?v=Djz8Nc0Qxwk">
                                                                    <i class="material-symbols-outlined mat-icon fs-1"> play_arrow </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-box">
                                                    <div class="magnific-area position-relative d-flex align-items-center justify-content-around">
                                                        <div class="bg-area w-100">
                                                            <img class="bg-item w-100" src="{{ asset('assets/images/video-bg-6.png') }}" alt="image">
                                                        </div>
                                                        <div class="content-area text-center position-absolute d-flex align-items-center justify-content-center">
                                                            <div class="content-box">
                                                                <a class="mfp-iframe popupvideo d-flex align-items-center justify-content-center" href="https://www.youtube.com/watch?v=Djz8Nc0Qxwk">
                                                                    <i class="material-symbols-outlined mat-icon fs-1"> play_arrow </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-10 mt-5 mt-xl-0">
                                    <div class="cus-scrollbar">
                                        <div class="sidebar-wrapper d-flex al-item flex-wrap justify-content-end justify-content-xl-center flex-column flex-md-row flex-xl-column flex gap-6">
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        Info
                                                    </h6>
                                                </div>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Page- Travel Agency</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt link"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b5c1d0c6c1f5d8d4dcd99bd6dad8">[email&#160;protected]</a></span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt link">www.wisoky.com</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> call </i>
                                                        <span class="mdtxt">(316) 555-0116</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="sidebar-area p-5">
                                                <div class="mb-3">
                                                    <h6 class="d-inline-flex">
                                                        About
                                                    </h6>
                                                </div>
                                                <p class="mdtxt">Lorem ipsum dolor sit amet cons all Ofectetur. Pellentesque ipsum necat  congue pretium cursus orci. It Commodo donec tellus lacus pellentesque sagittis habitant quam amet praesent. </p>
                                                <ul class="d-grid gap-2 mt-5">
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                        <span class="mdtxt">Always</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> flag </i>
                                                        <span class="mdtxt">31k Member</span>
                                                    </li>
                                                    <li class="d-flex align-items-center gap-2">
                                                        <i class="material-symbols-outlined mat-icon"> language </i>
                                                        <span class="mdtxt">Public</span>
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
    <script data-cfasync="false" src="{{ asset('/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script><script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/plyr.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/plugin.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>