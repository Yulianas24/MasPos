<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{ $title }}</title>
</head>
<body>
  
  <div class="w-screen h-screen">
    <div class="flex justify-between bg-[#0052CC] w-full h-1/2 px-[120px] pt-[50px] text-white z-0">
      <h1 class=" text-3xl font-semibold ">MAS POS</h1>
      <p>Call Us  +62 817-1902-092</p>
    </div>
    <div class="grid justify-items-center w-[500px] h-[400px] mx-auto bg-white -mt-[15%] py-10 px-20 shadow-lg rounded-xl">
      <h1 class="text-xl font-medium">Login</h1>
      @if (session()->has('loginError'))
      <div class="fixed bg-[#DE350B] top-[11%] py-4 px-6  text-sm text-white w-[500px]">
          <p>Login failed, please try again</p>
      </div>
      @endif
      <form id="login_form" class="form" action="/login" method="POST">
        @csrf
        <div class="w-full">
          <label for="username">Username</label><br>
          <input type="text" name="username" id="username" placeholder="Enter username" required>
        </div>
        <div class="w-full">
          <label for="password">Password</label><br>
          <input type="password" name="password" id="password" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn mx-auto py-0">Login</button>
      </form>
    </div>
  </div>
</body>
</html>