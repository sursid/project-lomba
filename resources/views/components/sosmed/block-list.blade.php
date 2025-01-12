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
                                <a href="all-friend.html" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>All Friend</span>
                                </a>
                            </li>
                            <li>
                                <a href="block-list.html" class="d-flex gap-4 active">
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
                        <div class="col-xl-12">
                            <div class="single-box text-start p-5">
                                <div class="table-responsive">
                                    <div class="title-area mb-3">
                                        <h6>Blocked Member</h6>
                                    </div>
                                    <table class="table m-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="avatar-item">
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar">
                                                        </div>
                                                        <a href="public-profile-post.html" class="text-area">
                                                            <p class="m-0">Jerome Bell</p>
                                                        </a>
                                                    </div>
                                                </th>
                                                <td><p class="blocked">Blocked 27/08/2022</p></td>
                                                <td>
                                                    <div class="btn-area d-flex justify-content-end gap-3">
                                                        <button class="cmn-btn">Unblock</button>
                                                        <button class="d-center cmn-btn alt px-2">
                                                            <i class="material-symbols-outlined"> delete </i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="avatar-item">
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-2.png') }}" alt="avatar">
                                                        </div>
                                                        <a href="public-profile-post.html" class="text-area">
                                                            <p class="m-0">Piter Maio</p>
                                                        </a>
                                                    </div>
                                                </th>
                                                <td><p class="blocked">Blocked 26/08/2022</p></td>
                                                <td>
                                                    <div class="btn-area d-flex justify-content-end gap-3">
                                                        <button class="cmn-btn">Unblock</button>
                                                        <button class="d-center cmn-btn alt px-2">
                                                            <i class="material-symbols-outlined"> delete </i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="avatar-item">
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-3.png') }}" alt="avatar">
                                                        </div>
                                                        <a href="public-profile-post.html" class="text-area">
                                                            <p class="m-0">Floyd Miles</p>
                                                        </a>
                                                    </div>
                                                </th>
                                                <td><p class="blocked">Blocked 26/08/2022</p></td>
                                                <td>
                                                    <div class="btn-area d-flex justify-content-end gap-3">
                                                        <button class="cmn-btn">Unblock</button>
                                                        <button class="d-center cmn-btn alt px-2">
                                                            <i class="material-symbols-outlined"> delete </i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="avatar-item">
                                                            <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-4.png') }}" alt="avatar">
                                                        </div>
                                                        <a href="public-profile-post.html" class="text-area">
                                                            <p class="m-0">Devon Lane</p>
                                                        </a>
                                                    </div>
                                                </th>
                                                <td><p class="blocked">Blocked 26/08/2022</p></td>
                                                <td>
                                                    <div class="btn-area d-flex justify-content-end gap-3">
                                                        <button class="cmn-btn">Unblock</button>
                                                        <button class="d-center cmn-btn alt px-2">
                                                            <i class="material-symbols-outlined"> delete </i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection