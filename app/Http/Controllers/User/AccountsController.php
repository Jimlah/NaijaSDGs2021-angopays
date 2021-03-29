<?php

namespace App\Http\Controllers\User;

use App\Models\Accounts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RaveController;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Accounts::where('user_id', auth()->user()->id)
                    ->get();

        return view('user.accounts.index', [
            'accounts' => $accounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = RaveController::getAllBank();
        return view('user.accounts.create', [
            'banks' => $banks
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
            'account_number' => 'required|numeric|unique:accounts',
            'account_name' => 'required',
            'bank_name' => 'required',
            ]);

        $validateAccount = RaveController::validateAccount(
            $request->account_number,
            $request->bank_name
        );

        if ($validateAccount->status != "success") {
            session()->flash('error', 'Unable validate Account');
            return redirect()->back();
        }

        $account_name = explode(' ', $request->account_name);
        $validateAcountName = strtolower($validateAccount->data->account_name);
        $validateAcountName = explode(' ', $validateAcountName);

        $valid1 = array_search(strtolower($account_name[0]), $validateAcountName);
        array_splice($validateAcountName, $valid1, 1);
        $valid2 = array_search(strtolower($account_name[1]), $validateAcountName);

        if($valid1 === false || $valid2 === false){
            session()->flash('error', 'Account Name Incorrect');
            return redirect()->back();
        }

        $accounts = Accounts::where('user_id', $request->user()->id)
                                ->get()
                                ->count();
        $accounts += 1;
        Accounts::create([
            'unique_id' => "a" . $accounts,
            'user_id' => $request->user()->id,
            'account_number' => $request->account_number,
            'account_name' => $validateAccount->data->account_name,
            'bank_name' => $request->bank_name,
        ]);

        session()->flash('success', 'You have successfully added a new account and genarated a new ID');
        return view('user.accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Accounts::find();
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
