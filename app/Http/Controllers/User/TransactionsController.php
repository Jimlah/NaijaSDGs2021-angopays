<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Twilio\Rest\Client;
use App\Models\Accounts;
use Illuminate\Support\Str;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RaveController;
use App\Http\Controllers\Twillo;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Accounts::where('user_id', auth()->user()->id)
            ->get();

        return view('user.transactions.create', [
            'accounts' => $accounts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_number' => 'required',
            'amount' => 'required',
            'recipient_uid' => 'required'
        ]);

        $recipient_uid = $request->recipient_uid;
        $recipient_uid = explode('.', $recipient_uid);

        $user = User::where('username', $recipient_uid[0])->get();
        if (!$user) {
            session()->flash('Error', 'Invalid Account details');
            return redirect()->back();
        }

        do {
            $trx_ref = Str::random(10);
        } while (Transactions::where('trx_ref', '=',  $trx_ref)->first() instanceof User);

        // Withdrawing from Account
        $transaction = new Transactions();
        $transaction->trx_ref = $trx_ref;
        $transaction->user_id = $request->user()->id();
        $transaction->account_id = $request->account_number;
        $transaction->amount = - ($request->amount + 25);
        $transaction->recipient_uid = $request->recipient_uid;
        $transaction->otp = Str::random(4);
        $transaction->status = "processing";
        $transaction->save();

        Twillo::message($request->user()->phone_number, "OTP ".$transaction->OTP);

        return view(route('transactions.show', ['id'=> $transaction->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);

        // $transaction = new Transactions();
        // $transaction->trx_ref = $trx_ref;
        // $transaction->user_id = $request->recipient_uid;
        // $transaction->account_id = $request->account_number;
        // $transaction->amount = $request->amount;
        // $transaction->recipient_uid = $request->user()->id();
        // $transaction->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
