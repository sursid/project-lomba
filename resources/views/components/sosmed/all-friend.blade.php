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
                                <img class="avatar-img max-un" src="{{ asset('assets/images/avatar-1.png') }}"
                                    alt="avatar">
                            </div>
                            <div class="text-area">
                                <h6 class="m-0 mb-1"><a href="profile-post">Lerio Mao</a></h6>
                                <p class="mdtxt">@maolio</p>
                            </div>
                        </div>
                        <ul class="profile-link mt-7 mb-7 pb-7">
                            <li>
                                <a href="friend-request" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>Friend Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="suggestions" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> person_add </i>
                                    <span>Suggestions</span>
                                </a>
                            </li>
                            <li>
                                <a href="all-friend" class="d-flex gap-4 active">
                                    <i class="material-symbols-outlined mat-icon"> person </i>
                                    <span>All Friend</span>
                                </a>
                            </li>
                            <li>
                                <a href="block-list" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> lock </i>
                                    <span>Block List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row cus-mar friend-request">
                        @foreach ($friends as $friend)
                            @php
                                $mutualFriends = DB::table('friendships as f1')
                                    ->join('friendships as f2', function ($join) use ($friend) {
                                        $join->on(function ($query) use ($friend) {
                                            $query
                                                ->where('f1.user_id', $friend->id)
                                                ->where('f2.user_id', auth()->id())
                                                ->orWhere('f1.friend_id', $friend->id)
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
                                                $friend->id .
                                                ' THEN f1.friend_id ELSE f1.user_id END',
                                        ),
                                    )
                                    ->select('users.id', 'users.avatar')
                                    ->distinct()
                                    ->limit(3)
                                    ->get();
                            @endphp
                            <div class="col-xxl-3 col-md-5 col-sm-6 col-8">
                                <div class="single-box p-5">
                                    <div class="avatar-friend">
                                        <img class="avatar-friend-img w-100" src="{{ $friend->avatar }}" alt="avatar">
                                    </div>
                                    <a href="public-profile-post">
                                        <h6 class="m-0 mb-2 mt-3">{{ $friend->name }}</h6>
                                        <h10 class="m-0 mb-2 mt-3">{{ $friend->bio }}</h10>
                                    </a>
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
