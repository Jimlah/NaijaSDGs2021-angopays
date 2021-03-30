<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = array(
            'trx_ref',
            'user_id',
            'account_id',
            'charged_amount',
            'amount',
            'recipient_uid',
            'status',
            'otp',
    );
}
