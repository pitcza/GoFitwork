<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'email', 'barangay', 'gender', 'occupation', 'start_by', 'reason'];

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
