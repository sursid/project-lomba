@extends('main-sosmed')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
                                <img class="avatar-img max-un" src="{{ Auth::user()->avatar }}" alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1"><a href="profile-post">{{ Auth::user()->name }}</a></h6>
                                <p class="mdtxt"><span>@</span>{{ Auth::user()->username }} </p>
                            </div>
                        </div>
                        <ul class="profile-link mt-7 mb-7 pb-7">
                            <li>
                                <a href="/sosmed/friend-request" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>Friend Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/suggestions" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person_add </i>
                                    <span>Suggestions</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/all-friend" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>All Friend</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/block-list" class="d-flex gap-4 active">
                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                    <span>Block List</span>
                                </a>
                            </li>
                        </ul>
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
                                    @php
                                        $blockedUsers = DB::table('blocks')
                                            ->join('users', 'blocks.blocked_user_id', '=', 'users.id')
                                            ->where('blocks.user_id', auth()->id())
                                            ->select(
                                                'blocks.id as block_id',
                                                'users.*',
                                                'blocks.created_at as blocked_at',
                                            )
                                            ->get();
                                    @endphp

                                    <table class="table m-0">
                                        <tbody>
                                            @foreach ($blockedUsers as $blockedUser)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="d-flex gap-3 align-items-center">
                                                            <div class="avatar-item">
                                                                <img class="avatar-img max-un"
                                                                    src="{{ $blockedUser->avatar }}" alt="avatar">
                                                            </div>
                                                            <a href=""
                                                                class="text-area">
                                                                <p class="m-0">{{ $blockedUser->name }}</p>
                                                            </a>
                                                        </div>
                                                    </th>
                                                    <td>
                                                        <p class="blocked">
                                                            Blocked
                                                            {{ \Carbon\Carbon::parse($blockedUser->blocked_at)->format('d/m/Y') }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="btn-area d-flex justify-content-end gap-3">
                                                            <button 
    type="button" 
    class="cmn-btn unblock-user" 
    data-user-id="{{ $blockedUser->id }}"
    onclick="removeBlockedUser(this)"
>
    Unblock
</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @if ($blockedUsers->isEmpty())
                                        <div class="text-center py-4">
                                            <p>No blocked users found.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/block-page.js') }}"></script>
    </main>
@endsection
