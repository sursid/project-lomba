@extends('main-sosmed')
@section('content')
    <style>
        .avatar-img-nusatani {
            object-fit: cover;
            /* Menjaga gambar agar tetap proporsional dan dipotong */
            object-position: center;
            /* Menjaga agar bagian tengah gambar tetap terlihat */
            height: 300px;
            /* Mengatur tinggi gambar sesuai kebutuhan */
            width: 100%;
            /* Membuat gambar memenuhi lebar elemen */
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
                    @php
                        // Mendapatkan ID event dari URL
                        $eventId = request()->segment(count(request()->segments()));

                        // Mengambil event berdasarkan ID
                        $event = App\Models\Event::find($eventId);
                        $userId = Auth::id();
                        $isRegistered = DB::table('event_registrations')
                      ->where('event_id', $eventId)
                      ->where('user_id', $userId)
                      ->exists();
                    @endphp

                    <div class="banner-area mb-5">
                        <div class="single-box">
                            <div class="avatar-box position-relative">
                                <!-- Menampilkan gambar event jika ada, atau gambar default -->
                                <img class="avatar-img avatar-img-nusatani w-100" src="{{ $event->cover_image }}"
                                    alt="image">


                                <div class="abs-area position-absolute top-0 p-3 p-lg-5 p-xl-10">
                                    <!-- Format tanggal event -->
                                    <span
                                        class="date-area mdtxt">{{ $event && $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('d M Y') : 'N/A' }}</span>
                                </div>

                                <div class="abs-area position-absolute bottom-0 p-3 p-lg-5 p-xl-10 pb-3 pb-lg-5 pb-xl-8">
                                    <!-- Nama event -->
                                    <h4>{{ $event && $event->title ? $event->title : 'Event Not Found' }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details-area p-5 mb-5">
                        <div class="top-area pb-6 mb-6 d-center flex-wrap gap-3 justify-content-between">
                            <ul class="nav flex-wrap gap-2 tab-area" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-center active" id="about-tab" data-bs-toggle="tab"
                                        data-bs-target="#about-tab-pane" type="button" role="tab"
                                        aria-controls="about-tab-pane" aria-selected="true">about</button>
                                </li>
                            </ul>
                            <div class="btn-item d-center flex-wrap gap-3">
                                @if($isRegistered)
            <button class="cmn-btn d-center third gap-1 interested-btn" disabled 
                    style="background-color: #e0e0e0; color: #b0b0b0; cursor: not-allowed;">
                    <i class="material-symbols-outlined mat-icon fs-xl" style="color: green;">grade</i>
                Already Registered
            </button>
        @else
            <button class="cmn-btn d-center third gap-1 interested-btn" 
                    data-user-id="{{ $userId }}" 
                    data-event-id="{{ $event->id }}">
                <i class="material-symbols-outlined mat-icon fs-xl">grade</i>
                Interested
            </button>
        @endif
                            </div>                            
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="about-tab-pane" role="tabpanel"
                                aria-labelledby="about-tab" tabindex="0">
                                <div class="row gap-5 gap-xl-0">
                                    <div class="col-xl-7">
                                        <div class="friends-list d-flex gap-3 align-items-center text-center">
                                            <ul class="d-flex align-items-center justify-content-center">
                                                @php
                                                    // Mengambil event_id dari URL segmen
                                                    $eventId = request()->segment(3);

                                                    // Ambil 3 pengguna terbaru yang terdaftar pada event ini
                                                    $latestUsers = \App\Models\EventRegistration::where(
                                                        'event_id',
                                                        $eventId,
                                                    )
                                                        ->latest() // Urutkan berdasarkan waktu pendaftaran terbaru
                                                        ->take(3) // Ambil 3 pengguna terbaru
                                                        ->with('user') // Mengambil data user yang terdaftar
                                                        ->get();

                                                    // Menghitung jumlah orang yang mendaftar untuk event ini
                                                    $peopleCount = \App\Models\EventRegistration::where(
                                                        'event_id',
                                                        $eventId,
                                                    )->count();
                                                @endphp

                                                @foreach ($latestUsers as $registration)
                                                    <li>
                                                        <img src="{{ $registration->user->avatar }}" alt="image"
                                                            class="rounded-circle" width="40" height="40">
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <span class="mdtxt d-center">{{ $peopleCount }} People Going</span>
                                        </div>

                                        @php
                                            use Carbon\Carbon;

                                            // Ambil event berdasarkan ID dari segmen URL
                                            $event = DB::table('events')->where('id', $eventId)->first();

                                            // Ambil penyelenggara (user) berdasarkan user_id dari event
                                            $organizer = DB::table('users')
                                                ->where('id', $event->user_id)
                                                ->first();

                                            // Hitung durasi event
                                            $startDate = Carbon::parse($event->start_date);
                                            $now = Carbon::now();
                                            $duration = $startDate->diffInDays($now); // Durasi dalam hari
                                        @endphp

                                        <ul class="d-grid gap-2 my-5">
                                            <!-- Durasi Event -->
                                            <li class="d-flex align-items-center gap-2">
                                                <i class="material-symbols-outlined mat-icon"> schedule </i>
                                                <span class="mdtxt">{{ $duration }} Day</span>
                                            </li>

                                            <!-- Nama Penyelenggara -->
                                            <li class="d-flex align-items-center gap-2">
                                                <i class="material-symbols-outlined mat-icon"> flag </i>
                                                <span class="mdtxt">Event by {{ $organizer->name }}</span>
                                            </li>

                                            <!-- Tipe Event -->
                                            <li class="d-flex align-items-center gap-2">
                                                <i class="material-symbols-outlined mat-icon"> language </i>
                                                <span class="mdtxt">{{ ucfirst($event->type) }}</span>
                                            </li>
                                        </ul>

                                        <h5 class="time-schedule">{{ $startDate->format('M d, Y \A\t h:i A') }} -
                                            {{ Carbon::parse($event->end_date)->format('h:i A') }}</h5>

                                        <div class="description-box mt-4">
                                            <p class="mdtxt">{{ $event->description }}</p>
                                        </div>
                                    </div>

                                    <div class="col-xl-5">
                                        <div class="find-tickets p-5">
                                            <iframe
                                                src="{{ $event->map_iframe }}"></iframe>
                                            <p class="mdtxt">"{{ $event->location }}"</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/detail-event.js') }}"></script>
    </main>
@endsection
