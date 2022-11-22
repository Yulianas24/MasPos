@extends('layouts.app')
@section('content')
    <div class="mx-32">
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-b">
                  <tr>
                    <th scope="col" class="text-left px-6 py-4">
                      
                    </th>
                    <th scope="col" class="text-left px-6 py-4">
                      Product
                    </th>
                    <th scope="col" class="text-center px-6 py-4">
                      Qty
                    </th>
                    <th scope="col" class="text-center px-6 py-4">
                      Sub Total
                    </th>
                    <th scope="col" class="text-left px-6 py-4">
                      
                    </th>
                  </tr>
                </thead>
                <tbody id="data_body">
                  
                </tbody>
              </table>
              <div class="flex w-full justify-end text-sm font-semibold  mt-5">
                <h1 class="text-end mr-72">Total</h1>
                <h1 id="totalText" class="text-end">Rp. 0</h1>
              </div>
              <div class="w-full h-auto my-10 text-right flex justify-end">
                <a href="/" class="btn btn-trans mr-3">Back to home</a>
                <form action="/cart/pay" method="post" class="">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                  <input type="hidden" name="totalBill" value='' id="inputBill" required>
                  <button id="payBtn" type="submit" class="btn" onclick="clear()">Pay Bill</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('scripts.cartScript')
@endsection