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
                                <img class="profile-nusatani avatar-img max-un" src="{{ Auth::user()->avatar }}" alt="avatar">
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
                                <a href="/sosmed/event" class="d-flex gap-4 active">
                                    <i class="material-symbols-outlined mat-icon"> workspace_premium </i>
                                    <span>Event</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/group" class="d-flex gap-4">
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
                    <div class="head-area mb-4 mb-lg-5 mt-5 mt-lg-0">
                        <h6>Discover Events</h6>
                    </div>
                    <div class="top-area mb-5 d-center flex-wrap gap-3 justify-content-between">
                        <ul class="nav flex-wrap gap-2 tab-area" role="tablist">
                            <!-- Tab All -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-center active" id="all-tab" data-bs-toggle="tab"
                                    data-bs-target="#all-tab-pane" type="button" role="tab"
                                    aria-controls="all-tab-pane" aria-selected="true">
                                    All
                                </button>
                            </li>

                            <!-- Dynamic Tabs based on event types -->
                            @php
                                $eventTypes = \App\Models\Event::select('type')->distinct()->pluck('type')->toArray();
                            @endphp

                            @foreach ($eventTypes as $type)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-center" id="{{ $type }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#{{ $type }}-tab-pane" type="button" role="tab"
                                        aria-controls="{{ $type }}-tab-pane" aria-selected="false">
                                        {{ ucfirst($type) }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content">
                        <!-- Tab All -->
                        <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab"
                            tabindex="0">
                            <div class="row cus-mar friend-request">
                                @foreach ($eventTypes as $type)
                                    @php
                                        $events = \App\Models\Event::where('type', $type)->get();
                                    @endphp

                                    @foreach ($events as $event)
                                        @php
                                            // Cek apakah user sudah terdaftar di event ini
                                            $isRegistered = \App\Models\EventRegistration::where('event_id', $event->id)
                                                ->where('user_id', auth()->user()->id)
                                                ->exists();
                                        @endphp
                                        <div class="col-xl-4 col-sm-6 col-8">
                                            <div class="single-box p-5">
                                                <div class="avatar-box-nusantara position-relative">
                                                    <img class="avatar-img-nusantara w-100"
                                                        src="{{ $event->cover_image }}" alt="avatar">
                                                    <div
                                                        class="abs-area w-100 position-absolute top-0 p-3 d-center justify-content-between">
                                                        <span
                                                            class="date-area mdtxt">{{ $event->start_date->format('d M Y') }}</span>
                                                        <div class="btn-group cus-dropdown dropend">
                                                            <button type="button" class="dropdown-btn d-center px-2"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="material-symbols-outlined fs-xxl m-0"> more_horiz
                                                                </i>
                                                            </button>
                                                            <ul class="dropdown-menu p-4 pt-2">
                                                                <li>
                                                                    <a class="droplist d-flex align-items-center gap-2"
                                                                        href="#">
                                                                        <i class="material-symbols-outlined mat-icon">
                                                                            person_remove </i>
                                                                        <span>Unfollow</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="droplist d-flex align-items-center gap-2"
                                                                        href="#">
                                                                        <i class="material-symbols-outlined mat-icon">
                                                                            hide_source </i>
                                                                        <span>Hide</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="/sosmed/event/{{ $event->id }}">
                                                    <h6 class="m-0 mt-4">{{ $event->title }}</h6>
                                                </a>
                                                <span class="smtxt city-area">{{ $event->location }}</span>
                                                <div class="d-center gap-2 mt-4">
                                                    <button class="cmn-btn" id="interested-btn-{{ $event->id }}"
                                                        data-user-id="{{ auth()->user()->id }}"
                                                        data-event-id="{{ $event->id }}"
                                                        @if ($isRegistered) style="background-color: #e0e0e0; color: #b0b0b0; cursor: not-allowed; pointer-events: none;" @endif>
                                                        @if ($isRegistered)
                                                            Already Registered
                                                        @else
                                                            Interested
                                                        @endif
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <!-- Dynamic Tabs Content for each event type -->
                        @foreach ($eventTypes as $type)
                            <div class="tab-pane fade" id="{{ $type }}-tab-pane" role="tabpanel"
                                aria-labelledby="{{ $type }}-tab" tabindex="0">
                                <div class="row cus-mar friend-request">
                                    @php
                                        $events = \App\Models\Event::where('type', $type)->get();
                                    @endphp

                                    @foreach ($events as $event)
                                        @php
                                            // Cek apakah user sudah terdaftar di event ini
                                            $isRegistered = \App\Models\EventRegistration::where('event_id', $event->id)
                                                ->where('user_id', auth()->user()->id)
                                                ->exists();
                                        @endphp
                                        <div class="col-xl-4 col-sm-6 col-8">
                                            <div class="single-box p-5">
                                                <div class="avatar-box-nusantara position-relative">
                                                    <img class="avatar-img-nusantara w-100"
                                                        src="{{ $event->cover_image }}" alt="avatar">
                                                    <div
                                                        class="abs-area w-100 position-absolute top-0 p-3 d-center justify-content-between">
                                                        <span
                                                            class="date-area mdtxt">{{ $event->start_date->format('d M Y') }}</span>
                                                        <div class="btn-group cus-dropdown dropend">
                                                            <button type="button" class="dropdown-btn d-center px-2"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="material-symbols-outlined fs-xxl m-0"> more_horiz
                                                                </i>
                                                            </button>
                                                            <ul class="dropdown-menu p-4 pt-2">
                                                                <li>
                                                                    <a class="droplist d-flex align-items-center gap-2"
                                                                        href="#">
                                                                        <i class="material-symbols-outlined mat-icon">
                                                                            person_remove </i>
                                                                        <span>Unfollow</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="droplist d-flex align-items-center gap-2"
                                                                        href="#">
                                                                        <i class="material-symbols-outlined mat-icon">
                                                                            hide_source </i>
                                                                        <span>Hide</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="">
                                                    <h6 class="m-0 mt-4">{{ $event->title }}</h6>
                                                </a>
                                                <span class="smtxt city-area">{{ $event->location }}</span>
                                                <div class="d-center gap-2 mt-4">
                                                    <button class="cmn-btn" id="interested-btn-{{ $event->id }}"
                                                        data-user-id="{{ auth()->user()->id }}"
                                                        data-event-id="{{ $event->id }}"
                                                        @if ($isRegistered) style="background-color: #e0e0e0; color: #b0b0b0; cursor: not-allowed; pointer-events: none;" @endif>
                                                        @if ($isRegistered)
                                                            Already Registered
                                                        @else
                                                            Interested
                                                        @endif
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
        <script src="{{ asset('assets/js/register-event.js') }}"></script>
    </main>
@endsection
