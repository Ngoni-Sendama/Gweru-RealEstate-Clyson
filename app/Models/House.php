<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'category_id',
        'agent_id',
        'name',
        'city',
        'image',
        'location',
        'additional_image_link',
        'number_of_rooms',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'price_per_month',
        'description',
        'area',
        'floor_plan',
        'video',
        'borehole_available',
        'parking_available',
        'internet_connection',
        'solar_system',
        'swimming_pool',
        'availability_status',
    ];


    protected $casts = [
        'additional_image_link' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(HouseCategory::class);
    }


    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

}
