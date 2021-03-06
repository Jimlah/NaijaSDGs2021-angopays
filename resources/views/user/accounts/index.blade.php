@extends('layouts.dashboard')
@section('body')
    <div class="p-5 space-y-2 overflow-x-scroll bg-white rounded-lg md:overflow-hidden">
        <table class="w-full tabl-auto">
            <thead>
                <tr>
                    <td>Unique ID</td>
                    <td>Account Number</td>
                    <td>Account Name</td>
                    <td>Bank Name</td>
                    <td>Verified</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($accounts as $account)
                <tr class="border-t border-b ">
                    <td class="py-2 mx-2">{{ $account->unique_id }}</td>
                    <td class="py-2 mx-2 ">{{ $account->account_number }}</td>
                    <td class="py-2 mx-2 ">{{ $account->account_name }}</td>
                    <td class="py-2 mx-2 ">{{ $account->bank_name }}</td>
                    <td class="py-2 mx-2 ">
                        @if ($account->verified)
                        Verified
                        @else
                        <a href="" class="px-2 py-1 bg-purple-900 rounded-md">Verify</a>
                        @endif
                    </td>
                    <td class="py-2 mx-2 ">
                        <x-action edit="{{ route('accounts.edit', [ $account->id]) }}"
                            delete="{{ route('accounts.destroy', [$account->id]) }}">
                        </x-action>
                    </td>
                </tr>
                @empty
                <tr class="border-t border-b">
                    <td colspan="6" class="py-2 text-gray-400 text -center mx-2font-bold">
                        No Account Added Yet
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
