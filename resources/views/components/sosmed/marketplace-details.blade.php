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
                        <h5>Marketplace Details</h5>
                    </div>
                    <div class="row">
                        <div class="shop-content">
                            <div class="shop-details-content">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-xl-6 col-md-8">
                                        <div class="slider-for">
                                            @php
                                                // Ambil product_id dari URL (segmen terakhir)
                                                $product_id = request()->route('id'); // Mengambil {id} dari URL

                                                // Ambil gambar produk berdasarkan product_id
                                                $images = App\Models\ProductImage::where(
                                                    'product_id',
                                                    $product_id,
                                                )->get();
                                            @endphp

                                            @foreach ($images as $image)
                                                <div class="single-slide">
                                                    <img src="{{ $image->image_path }}" alt="product image">
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="slider-nav">
                                            @foreach ($images as $image)
                                                <div class="single-slide">
                                                    <div class="slide">
                                                        <img src="{{ $image->image_path }}" alt="product image">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @php
                                        // Mengambil ID produk dari segmen URL terakhir
                                        $productId = request()->segment(count(request()->segments()));

                                        // Ambil data produk berdasarkan ID
                                        $product = DB::table('products')->where('id', $productId)->first();

                                        // Ambil gambar produk terkait
                                        $images = DB::table('product_images')->where('product_id', $productId)->get();

                                        // Ambil rating produk dari tabel product_reviews dan hitung rata-ratanya
                                        $ratingCount = DB::table('product_reviews')
                                            ->where('product_id', $productId)
                                            ->count();
                                        $averageRating = DB::table('product_reviews')
                                            ->where('product_id', $productId)
                                            ->avg('rating'); // Rata-rata rating
                                    @endphp

                                    @if ($product)
                                        <div class="col-xl-6 col-md-8 mt-7 mt-xl-0">
                                            <h4>{{ $product->name }}</h4>
                                            <div class="star-item my-4 d-flex gap-2 align-items-center">
                                                <div class="star-area">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $averageRating)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p class="mdr">
                                                    <span>({{ $ratingCount }} ratings)</span>
                                                </p>
                                            </div>

                                            <p>Product Id: {{ $product->id }}</p>
                                            <div class="price-area d-flex my-4 gap-3 align-items-center">
                                                <h4 class="cur-price">Rp. {{ number_format($product->price, 0) }}</h4>
                                            </div>

                                            <p class="description">{{ $product->description }}</p>

                                            <div class="single-input cart-content my-4">
                                                <div class="d-flex gap-3">
                                                    <div class="qtySelector px-4 px-3 d-inline-flex align-items-center text-center">
                                                        <i class="fas fa-minus d-center decreaseQty"></i>
                                                        <input type="text" class="qtyValue text-center m-0 xxltxt" value="1" autocomplete="off">
                                                        <i class="fas fa-plus d-center increaseQty"></i>
                                                    </div>
                                                </div>
                                            </div>                                            

                                            <button class="cmn-btn w-100 text-center d-flex justify-content-center"
                                                data-product-id="{{ $product->id }}" onclick="addToCart(this)">
                                                Add To Cart
                                            </button>

                                        </div>
                                    @else
                                        <p>Product not found.</p>
                                    @endif


                                </div>
                            </div>
                            <div class="product-about mt-60">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <br>
                                        <div class="tab-content">
                                            <div class="description">
                                                <h4 class="mb-4">About this item</h4>
                                                <p>{{ $product->description }}</p>
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
        <script src="{{ asset('assets/js/add-to-cart.js') }}"></script>
    </main>
@endsection
