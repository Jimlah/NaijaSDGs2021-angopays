@extends('layouts.dashboard')
@section('body')
    <div class="p-5 space-y-2 bg-white rounded-lg">
        <form action="{{ route('transactions.store') }}" method="POST" class="space-y-2 md:w-1/2">
            <p>Transfer Acount Details</p>
            @csrf
            <div class="flex flex-col w-full">
                <label for="account_number">Account ID</label>
                <span class="text-xs text-gray-400">Pick account</span>
                <select class="w-full px-2 py-1 border border-purple-900" name="account_number" id="account_number">
                    @foreach ($accounts as $account)
                    <option value="{{$account->id}}">{{$account->account_number}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col w-full">
                <label for="amount">Amount</label>
                <input class="w-full px-2 py-1 border border-purple-900" type="number" name="amount" id="amount">
            </div>
            <div class="flex flex-col w-full">
                <label for="recipient_uid">Recipient UID</label>
                <input class="w-full px-2 py-1 border border-purple-900" type="text" name="recipient_uid" id="recipient_uid">
            </div>
            <div class="flex flex-col w-full ">
                <button class="w-full py-1 py-2 font-bold bg-purple-900" type="submit">Login</button>
            </div>
        </form>
    </div>

@endsection
