<nav class=" px-32 py-5 w-full bg-[#0052CC] text-white">
  <div class="flex items-center justify-between w-full h-full">
    <h1 class=" font-semibold">MASPOS</h1>
    <div class=" flex items-center">
      <p class="mr-3 peer">{{ auth()->user()->username }}</p>
      <img src="{{ asset('img\Avatar.svg') }}" alt="" class="peer">
      <a href="/logout" class="invisible peer-hover:visible hover:visible fixed right-32 top-14 h-auto w-auto bg-gray-500 px-3 py-2 rounded-md ">
        <p>logout</p>
      </a>
    </div>
  </div>
</nav>