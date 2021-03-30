@extends('layouts.dashboard')
@section('body')
    <div class="p-5 space-y-2 overflow-x-scroll bg-white rounded-lg md:overflow-hidden">
        <table class="w-full tabl-auto">
            <thead>
                <tr>
                    <td>Transaction Ref</td>
                    <td>Amount</td>
                    <td>Charged Amount</td>
                    <td>Status</td>
                    <td>Recipient Name</td>
                    <td>Recipient UID</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                <tr class="border-t border-b ">
                    <td class="py-2 mx-2">{{ $transaction->trx_ref }}</td>
                    <td class="py-2 mx-2 ">{{ $transaction->amount }}</td>
                    <td class="py-2 mx-2 ">{{ $transaction->charged_amount }}</td>
                    <td class="py-2 mx-2 ">{{ $transaction->status }}</td>
                    <td class="py-2 mx-2 ">{{ $transaction->recipient_uid }}</td>
                    <td class="py-2 mx-2 ">{{ $transaction->recipient_uid }}</td>
                </tr>
                @empty
                <tr class="border-t border-b">
                    <td colspan="6" class="py-2 text-gray-400 text -center mx-2font-bold">
                        No transaction Added Yet
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
