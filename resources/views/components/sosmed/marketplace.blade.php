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
                                <a href="/sosmed/group" class="d-flex gap-4">
                                    <i class="material-symbols-outlined mat-icon"> workspaces </i>
                                    <span>Group</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sosmed/marketplace" class="d-flex gap-4 active">
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
                        <h6>Marketplace</h6>
                    </div>

                    @php
                        // Ambil semua produk aktif dengan user dan images
                        $products = App\Models\Product::with([
                            'user',
                            'images' => function ($query) {
                                $query->orderBy('order', 'asc'); // Urutkan berdasarkan 'order' jika diperlukan
                            },
                        ])
                            ->where('is_active', true)
                            ->orderBy('created_at', 'desc')
                            ->get();
                    @endphp


                    <div class="row cus-mar">
                        @foreach ($products as $product)
                            <div class="col-xl-6 col-lg-8 col-md-6">
                                <div class="single-box marketplace-item p-2 p-sm-5">
                                    <div class="avatar-area position-relative">
                                        @if ($product->images->isNotEmpty())
                                            <img class="avatar-img w-100" src="{{ $product->images->first()->image_path }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            <img class="avatar-img w-100"
                                                src="{{ asset('assets/images/default-product.png') }}" alt="default">
                                        @endif
                                        <h5 class="position-absolute price-box">Rp. {{ number_format($product->price, 0) }}
                                        </h5>
                                    </div>
                                    <div class="info-box mt-12 text-start">
                                        <a href="{{ route('marketplace.detail', ['id' => $product->id]) }}">
                                            <h5>{{ $product->name }}</h5>
                                        </a>
                                    </div>                                    
                                    <div class="head-area mt-5 d-flex justify-content-between">
                                        <div class="d-flex w-100 gap-3 align-items-center justify-content-between">
                                            <div class="d-flex gap-3 align-items-center">
                                                <div class="avatar-item">
                                                    <img class="avatar-img max-un" src="{{ $product->user->avatar }}"
                                                        alt="avatar">
                                                </div>
                                                <div class="text-area text-start">
                                                    <h6 class="m-0 mb-1"><a href="#">{{ $product->user->name }}</a>
                                                    </h6>
                                                    <p class="mdtxt">{{ $product->category }}</p>
                                                </div>
                                            </div>
                                            @php
                                                $averageRating = $product->reviews->avg('rating'); // Menghitung rata-rata rating
                                                $roundedRating = round($averageRating); // Membulatkan rating ke angka terdekat
                                            @endphp
                                            <div class="star-area">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $roundedRating)
                                                        <a href="javascript:void(0)"><i class="fas fa-star"></i></a>
                                                    @else
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($products->isEmpty())
                            <div class="col-12 text-center">
                                <p>No products available</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
