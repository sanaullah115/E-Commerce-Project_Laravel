@if ($products->count()>0)
@foreach ($products as $item)
<div class="col-md-6 col-lg-6 col-xl-4">
    <div class="rounded position-relative fruite-item">
        <div class="fruite-img">
            <img src="{{asset('/Upload/Product/'.$item->image)}}" class="img-fluid w-100 rounded-top" alt="">
        </div>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits
        </div>
        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
            <h4>{{$item->title}}</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
                <p class="text-dark fs-5 fw-bold mb-0">${{$item->price}}</p>
                <a href="{{Auth::user() ?'javascript:void(0);': route('login')}}" class="btn border border-secondary rounded-pill px-3 text-primary add_to_cart" data-product_id="{{$item->id}}"><i
                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@else
<div class="col-md-6 col-lg-6 col-xl-4">
    <img src="{{ asset('img/no-product.png') }}" alt="">
</div>
@endif


@php
$perPage = 2; // Har page par products ki sankhya
$currentPage = request()->get('page', 1); // Current page number
$offset = ($currentPage - 1) * $perPage; // Offset calculate karna
$productsOnPage = array_slice($products->toArray(), $offset, $perPage); // Slice productsfor the current page
@endphp
<div class="col-12">
    <div class="pagination d-flex justify-content-center mt-5">
        @if ($currentPage > 1)
        <a href="?page={{ $currentPage - 1 }}" class="rounded  ">&laquo;</a>
        @else
        <a href="#" class="disabled rounded">&laquo;</a>
        @endif

        @for ($i = 1; $i <= ceil(count($products) / $perPage); $i++) <a href="?page={{ $i }}"
            class="rounded {{ $i == $currentPage ? 'active' : '' }}">{{ $i }}</a>
            @endfor


            @if ($currentPage < ceil(count($products) / $perPage)) <a href="?page={{ $currentPage + 1 }}"
                class="rounded">&raquo;</a>
                @else
                <a href="#" class="rounded">&raquo;</a>
                @endif
    </div>
</div>