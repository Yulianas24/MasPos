@extends('layouts.app')
@section('content')
<form action="/add-product" method="post" enctype="multipart/form-data">
  @csrf
  <div class="w-[900px] h-[500px] mx-auto">
    <h1 class="font-bold mb-4">Add Product</h1>
    <hr class="w-full mb-5">
    <div class="grid grid-cols-2 gap-4 h-full w-full ">
      {{-- input image --}}
      <div class="">
        <label for="image">
          <div class=" grid content-center justify-items-center bg-blue-100 w-[180px] h-[180px] mx-auto mt-10 rounded-md  bg-cover" id="image_prev">
              <input type="file" name="image" id="image" hidden required onchange="myFunction()">
              <div id="image_child" class="grid content-center justify-items-center">
                <img src="{{ asset('img/cloud_up.svg') }}" alt="">
                <p class="text-[#0052CC]">upload image</p>
              </div>
            </div>
        </label>
      </div>
      {{-- input text and select --}}
      <div class="py-10 px-14">
        <div class="inp-box w-full">
          <label for="product name">Product Name</label><br>
          <input type="text" name="product_name" id="" placeholder="" required>
        </div>
        <div class="inp-box w-full">
          <label for="price">Price</label><br>
          <input type="number" name="price" id="price" required>
        </div>
        <div class="inp-box w-full">
          <label for="category">Category</label><br>
          <select name="category_id" id="" required>
            <option value="" selected hidden>Select</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex justify-end  w-full mt-16">
          <a href="/" class="btn btn-trans mr-3">Cancel</a>
          <button type="submit" class="btn">Confirm</button>
        </div>
      </div>
    </div>
  </div>
</form>


<script>
function myFunction() {

    var file = document.getElementById('image').files[0];
    var child = document.getElementById('image_child');
    var reader  = new FileReader();
    // it's onload event and you forgot (parameters)
    reader.onload = function(e)  {
        var image = document.createElement("img");
        // the result image data
        image.src = e.target.result;
        document.getElementById("image_prev").style.backgroundImage = "url("+image.src+")"; 
        child.style.display = 'none';
    }
    // you have to declare the file loading
    reader.readAsDataURL(file);
}
</script>
@endsection