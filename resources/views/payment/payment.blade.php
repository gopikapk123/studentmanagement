@extends('commonlayout.app')

@section('content')

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Razorpay Payment Gateway
        </h1>

        <a href="{{ url('/') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">

            Cancel

        </a>

    </div>

    <form action="/payment/pay" method="POST">

        @csrf

        <!-- NAME -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Name
            </label>

            <input type="text"
                   name="name"
                   value="{{$name?? ''}}"
                   placeholder="Enter Name"
                   required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- EMAIL -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Email
            </label>

            <input type="email"
                   name="email"
                  value="{{$email ?? ''}}"
                   placeholder="Enter Email"
                   required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- AMOUNT -->
        <div class="mb-5">

            <label class="block mb-2 font-medium text-gray-700">
                Amount
            </label>

            <input type="number"
                   name="amount"
                    value="{{$amount ?? ''}}"
                   placeholder="Enter Amount"
                   required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <div class="flex gap-4">

            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

                Pay Now

            </button>

            <a href="{{ url('/') }}"
               class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-500">

                Back

            </a>

        </div>

    </form>

</div>

@if(isset($order_id))

<form action="/payment/success" method="POST">

    @csrf

    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{ env('RAZORPAY_KEY') }}"
        data-amount="{{ $amount * 100 }}"
        data-currency="INR"
        data-order_id="{{ $order_id }}"
        data-buttontext="Proceed To Payment"
        data-name="Laravel Payment"
        data-description="Payment Gateway Demo"
        data-prefill.name="{{ $name }}"
        data-prefill.email="{{ $email }}">
    </script>

    <input type="hidden" name="name" value="{{ $name }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="amount" value="{{ $amount }}">
    <input type="hidden" name="psyment_id" id="psyment_id">
    <input type="hidden" name="order_id" value="{{ $order_id }}">

</form>

@endif

@endsection