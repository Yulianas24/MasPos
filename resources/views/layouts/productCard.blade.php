<div class="grid w-[200px] h-[300px] rounded-2xl shadow-lg shadow-gray-300">
  <img class="object-cover w-[200px] h-[165px] rounded-t-2xl" src="{{ asset("storage/".$product->image) }}" alt="">
  <div class="m-3">
    <div class="flex justify-between  text-sm">
      <p class="tracking-tighter font-semibold">{{ $product->product_name }}</p>
      <form action="/{{ $product->product_name }}/delete" method="POST" class="inline-flex">
        @method('delete')
        @csrf
        <button type="submit" class="bg-[#DE350B] text-white text-[8px] px-1 rounded-[3px]" onclick="return confirm('Are you sure?')">Delete</button>
      </form>
    </div>
    <p class="text-base font-bold">Rp. {{ number_format($product->price, 2, '.', ','); }}</p>
  </div>
  <div class="justify-self-center pb-3">
    <a type="#" id="addCart" class=" btn text-xs px-5  rounded-[3px] h-8 hover:cursor-pointer" onclick="getId('{{ $product->id }}')">+ Add to Cart</a>
  </div>
</div>
