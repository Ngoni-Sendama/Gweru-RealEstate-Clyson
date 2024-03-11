<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['house_id', 'name', 'phone_number', 'message'];


    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
