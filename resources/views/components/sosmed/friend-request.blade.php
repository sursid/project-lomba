@extends('main-sosmed')


@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/request-friend.js') }}"></script>
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
                                <a href="/sosmed/friend-request" class="d-flex gap-4 active">
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
                                <a href="/sosmed/block-list" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                    <span>Block List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row cus-mar friend-request">
                        @foreach ($pendingRequests as $request)
                            @php
                                $mutualFriends = DB::table('friendships as f1')
                                    ->join('friendships as f2', function ($join) use ($request) {
                                        $join->on(function ($query) use ($request) {
                                            $query
                                                ->where('f1.user_id', $request->user->id)
                                                ->where('f2.user_id', auth()->id())
                                                ->orWhere('f1.friend_id', $request->user->id)
                                                ->where('f2.friend_id', auth()->id());
                                        });
                                    })
                                    ->where('f1.status', 'accepted')
                                    ->where('f2.status', 'accepted')
                                    ->join(
                                        'users',
                                        'users.id',
                                        '=',
                                        DB::raw(
                                            'CASE WHEN f1.user_id = ' .
                                                $request->user->id .
                                                ' THEN f1.friend_id ELSE f1.user_id END',
                                        ),
                                    )
                                    ->select('users.id', 'users.avatar')
                                    ->distinct()
                                    ->limit(3)
                                    ->get();
                            @endphp
                            <div class="col-xl-4 col-sm-6 col-8">
                                <div class="single-box p-5">
                                    <div class="avatar-friend">
                                        <img class="aavatar-friend-img w-100" src="{{ $request->user->avatar }}"
                                            alt="avatar">
                                    </div>
                                    <a href="">
                                        <h6 class="m-0 mb-2 mt-3">{{ $request->user->name }}</h6>
                                        <h10 class="m-0 mb-2 mt-3">{{ $request->user->bio }}</h10>
                                    </a>
                                    <div class="friends-list d-center gap-1 text-center">
                                        @if ($mutualFriends->count() > 0)
                                            <ul class="d-center">
                                                @foreach ($mutualFriends as $friend)
                                                    <li><img src="{{ $friend->avatar }}" alt="mutual friend"></li>
                                                @endforeach
                                            </ul>
                                            <span class="smtxt m-0">{{ $mutualFriends->count() }} mutual friends</span>
                                        @endif
                                    </div>
                                    <div class="d-center gap-2 mt-4">
                                        <button type="button" class="cmn-btn confirm-friend-request"
                                            data-friendship-id="{{ $request->id }}">Confirm</button>
                                        <button type="button" class="cmn-btn alt delete-friend-request"
                                            data-friendship-id="{{ $request->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <style>
                    .avatar-friend {
                        aspect-ratio: 16/9;
                        width: 100%;
                        position: relative;
                        margin-bottom: 15px;
                        overflow: hidden;
                        border-radius: 10px;
                    }

                    .avatar-friend-img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        object-position: center 35%;
                    }
                </style>
            </div>
        </div>
    </main>
@endsection
