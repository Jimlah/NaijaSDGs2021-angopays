@extends('layouts.dashboard')
@section('body')
    <div class="p-5 space-y-2 bg-white rounded-lg">
        <form action="{{ route('transactions.update', [$id]) }}" method="POST" class="space-y-2 md:w-1/2">
            <p>Enter Your OTP</p>
            @csrf
            {{method_field('PUT')}}
            <div class="flex flex-col w-full">
                <label for="otp">OTP</label>
                <input class="w-full px-2 py-1 border border-purple-900" type="text" name="otp" id="otp">
            </div>
            <div class="flex flex-col w-full ">
                <button class="w-full py-1 py-2 font-bold text-white bg-purple-900" type="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection
