@extends('layouts.dashboard')
@section('body')
    <div class="p-5 space-y-2 bg-white rounded-lg">
        <table class="w-full table-auto overscroll-x-auto">
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
                <tr class="border">
                    <td>{{ $account->unique_id }}</td>
                    <td>{{ $account->account_number }}</td>
                    <td>{{ $account->account_name }}</td>
                    <td>{{ $account->bank_name }}</td>
                    <td>
                        @if ($account->verified)
                        Not Verified
                        @else
                        <a href="" class="px-2 py-1 bg-purple-900">Verify</a>
                        @endif
                    </td>
                    <td>
                        <x-action edit="{{ route('account.edit', ['id' => $account->id]) }}"
                            delete="{{ route('account.destroy', ['id' => $account->id]) }}">
                        </x-action>
                    </td>
                </tr>
                @empty
                <tr class="border-t border-b">
                    <td colspan="6" class="py-2 font-bold text-center text-gray-400">
                        No Account Added Yet
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
