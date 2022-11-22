@extends('layouts.app')
@section('content')
    <div class="grid justify-items-center mx-auto w-[500px] h-[350px] mt-[9%]">
      <h1 class="text-xl font-semibold">Payment successful</h1>
      <div class="grid h-[100px] w-[100px] bg-[#36B37E] rounded-full justify-items-center content-center">
        <img  class="" src="{{ asset("img/check.svg") }}" alt="">
      </div>
      <h1 class="text-xl font-semibold">Rp.{{ number_format($bill, 0, '.', ',')  }}</h1>
      <a href="/" class="btn btn-trans h-[44px]">Back to home</a>
    </div>
    <script>
      sessionStorage.clear();
    </script>
@endsection