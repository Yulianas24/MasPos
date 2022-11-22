@extends('layouts.app')
@section('content')
<div id="toast" style="display: none" class="hideMe fixed bg-[#36B37E] top-[11%] py-4 px-6 inline-flex text-sm text-white w-[60%] mx-[20%] justify-center">
  <img src="{{ asset('img/info.svg') }}" alt="">
  <p class="text-base font-semibold">Added to cart</p>
</div>
@if (session()->has('error'))
      <div id="hide" class="hideMe fixed bg-[#DE350B] top-[11%] py-4 px-6 inline-flex text-sm text-white w-[60%] mx-[20%] justify-center">
          <img src="{{ asset('img/error.svg') }}" alt="">
          <p class="text-base font-semibold">{{ session('error')}}</p>
      </div>
@endif
@if (session()->has('success'))
      <div id="hide" class="hideMe fixed bg-[#36B37E] top-[11%] py-4 px-6 inline-flex text-sm text-white w-[60%] mx-[20%] justify-center">
          <img src="{{ asset('img/info.svg') }}" alt="">
          <p class="text-base font-semibold">{{ session('success') }}</p>
      </div>
      
@endif
    <div class="menu-bar px-32 flex justify-end">
      <a href="/add-category" class="btn bg-[#B3D4FF99] text-[#0052CC] mr-3">+Add Category</a>
      <a href="/add-product" class="btn bg-[#B3D4FF99] text-[#0052CC] mr-3">+Add Products</a>
      <a class="btn" href = '/cart'>Cart</a>
    </div>
    <div class="mx-32 my-3 flex">
      @foreach ($categories as $item)
      <div class="h-full {{ Request('category') == $item->category_name ? 'border-b-2 border-blue-500 text-[#0052CC]' : 'border-b-2 text-[#7A869A]' ; }}  hover:border-blue-500  hover:text-[#0052CC] ">
        <a class="px-2 text-sm font-semibold  h-full" href="?category={{ $item->category_name }}">{{ $item->category_name }}</a>
      </div>
      @endforeach
      <div class="w-full border-b-2"></div>
    </div>
    {{-- Product list --}}
    <div class="grid grid-cols-5 justify-items-center gap-10 my-10 w-full px-32">
      @foreach ($products as $product)
        @include('layouts.ProductCard')
      @endforeach
    </div>
    {{-- End of Product list --}}

    <div class="flex justify-end w-auto h-auto mx-32 mb-10">
      <a class="btn text-center px-5 rounded-[3px] py-3 w-[205px] block " href="/cart" id="totalBill">Total Bill : Rp. 0</a>

    </div>
    <script>
      let products = @json($products);
    </script>
    @include('scripts.sessionScript')
@endsection