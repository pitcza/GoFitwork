<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstname', 'lastname', 'email', 'barangay', 'gender', 'occupation', 'reason',
        'subscription_fee', 'payment_status', 'start_date', 'end_date'
    ];

    protected $dates = [
        'start_date', 'end_date'
    ];

    // date fields converted to carbon instances
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
