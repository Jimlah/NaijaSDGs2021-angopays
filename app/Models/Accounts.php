<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unique_id',
        'user_id',
        'account_name',
        'account_number',
        'bank_name',
    ];

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
