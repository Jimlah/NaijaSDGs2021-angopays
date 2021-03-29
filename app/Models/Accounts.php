<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function hideAccount()
    {
        $hideAcct =  preg_replace('\d(?=\d{4})', '#', $this->account_number);
        return $hideAcct;
    }
}
