@extends('layouts.dashboard')
@section('body')
    <div class="p-5 space-y-2 bg-white rounded-lg">
        <form action="{{ route('accounts.store') }}" method="POST" class="space-y-2 md:w-1/2">
            <p>New Acount Details</p>
            @csrf
            <div class="flex flex-col w-full">
                <label for="account_number">Account Number</label>
                <input class="w-full px-2 py-1 border border-purple-900" type="tel" name="account_number" id="account_number">
            </div>
            <div class="flex flex-col w-full">
                <label for="account_name">Account Name</label>
                <input class="w-full px-2 py-1 border border-purple-900" type="text" name="account_name" id="account_name">
            </div>
            <div class="flex flex-col w-full">
                <label for="bank_name">Bank Name</label>
                <select class="w-full px-2 py-1 border border-purple-900" name="bank_name" id="bank_name">
                    @foreach ($banks as $bank)
                        <option value="{{$bank->code}}">{{$bank->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col w-full ">
                <button class="w-full py-1 py-2 font-bold bg-purple-900" type="submit">Add Account</button>
            </div>
        </form>
    </div>

@endsection
