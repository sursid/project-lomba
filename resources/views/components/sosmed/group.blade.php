@extends('main-sosmed')
@section('content')
    <style>
        .avatar-box-nusantara {
            position: relative;
            width: 100%;
            overflow: hidden;
            height: 200px;
            /* Tentukan tinggi box */
        }

        .avatar-img-nusantara {
            object-fit: cover;
            /* Memastikan gambar menutupi area dengan memotong bagian yang tidak diperlukan */
            width: 100%;
            height: 100%;
            object-position: center;
            /* Memastikan bagian tengah gambar yang terlihat */
        }
    </style>
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
                    <div class="head-area mb-5">
                        <h6>Group</h6>
                    </div>
                    @php
                        // Ambil semua grup berdasarkan tipe dari database
                        $groups = App\Models\Group::all()->groupBy('type');
                    @endphp

                    <div class="popular-area mb-5 d-center flex-wrap gap-3 justify-content-between">
                        <ul class="nav flex-wrap gap-2 tab-area" role="tablist">
                            @foreach ($groups as $type => $groupList)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-center @if ($loop->first) active @endif"
                                        id="{{ $type }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#{{ $type }}-tab-pane" type="button" role="tab"
                                        aria-controls="{{ $type }}-tab-pane" aria-selected="true">
                                        {{ ucwords(str_replace('-', ' ', $type)) }}
                                    </button>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="tab-content">
                        @foreach ($groups as $type => $groupList)
                            <div class="tab-pane fade @if ($loop->first) show active @endif"
                                id="{{ $type }}-tab-pane" role="tabpanel" aria-labelledby="{{ $type }}-tab">
                                <div class="row cus-mar friend-request">
                                    @foreach ($groupList as $group)
                                        <div class="col-xl-4 col-sm-6 col-8">
                                            <div class="single-box p-5">
                                                <div class="avatar-box-nusantara position-relative">
                                                    <img class="avatar-img-nusantara w-100" src="{{ $group->cover_image }}"
                                                        alt="avatar">
                                                    <div
                                                        class="abs-area w-100 position-absolute top-0 p-3 d-center justify-content-end">
                                                        <div class="btn-group cus-dropdown dropend">
                                                            <button type="button" class="dropdown-btn d-center px-2"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="material-symbols-outlined fs-xxl m-0"> more_horiz
                                                                </i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="abs-avatar-item">
                                                    <img class="avatar-img max-un" src="{{ $group->cover_image }}"
                                                        alt="avatar">
                                                </div>
                                                <a href="/sosmed/group/{{ $group->id }}">
                                                    <h6 class="m-0 mb-2 mt-3">{{ $group->name }}</h6>
                                                </a>
                                                <p
                                                    class="smtxt @if ($group->privacy == 'public') public-group @else private-group @endif">
                                                    {{ ucwords($group->privacy) }} Group
                                                </p>
                                                <div class="friends-list d-center mt-3 gap-1 text-center">
                                                    <ul class="d-center">
                                                        @foreach ($group->members()->with('user')->take(3)->get() as $member)
                                                            <li><img src="{{ $member->user->avatar }}" alt="image"></li>
                                                        @endforeach
                                                    </ul>
                                                    <span class="smtxt m-0">{{ $group->members_count }} Member</span>
                                                </div>
                                                <div class="d-center btn-border pt-5 gap-2 mt-4">
                                                    <button class="cmn-btn join-group-btn"
                                                        data-user-id="{{ Auth::id() }}"
                                                        data-group-id="{{ $group->id }}"
                                                        @php
                                                        $isMember = $group->members()
                                                                                ->where('user_id', Auth::id())
                                                                                ->exists(); @endphp
                                                        @if ($isMember) style="background-color: #e0e0e0; color: #b0b0b0; cursor: not-allowed; pointer-events: none;" @endif>
                                                        {{ $isMember ? 'Already Registered' : 'Join' }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/register-group.js') }}"></script>
    </main>
@endsection
