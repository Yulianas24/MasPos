@extends('layouts.app')
@section('content')
  <div class=" w-[500px] h-[300px] mx-auto mt-[10%]">
    <h1 class="font-bold text-center my-4">Add Category</h1>
    <hr class="bg-gray-400">
    <form action="/add-category" method="POST" class="h-full w-full ">
      @csrf
      <div class="w-[70%] mx-auto mt-10">
        <label for="category">Category name</label><br>
        <input type="text" name="category" id="category">
      </div>
      <div class="mx-auto flex justify-center w-[70%] mt-16">
        <a href="/" class="btn btn-trans mr-3">Cancel</a>
        <button type="submit" class="btn">Confirm</button>
      </div>
    </form>
  </div>
@endsection