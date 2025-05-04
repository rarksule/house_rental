<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use App\Models\User;
use Spatie\MediaLibrary\InteractsWithMedia;

class House extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'tenant_id',
        'lease_amount',
        'payment_date',
        'address',
        'map_link',
        'amenities',
    ];


    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'house_id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'payment_date' => 'datetime',
    ];

    public function getImage()
    {
        if ($this->getMedia() != null) {
            $media = $this->getMedia('images');
            $imageUrls = [];
            foreach ($media as $image) {
                array_push($imageUrls, $image->getUrl());
            }
            return $imageUrls;
        }
        return [];
    }

    public function addImage(): void
    {
        $this->addMediaFromRequest('image')->toMediaCollection('images');
    }

    public function setAmenitiesAttribute($value): void
    {
        $this->attributes['amenities'] = json_encode($value);
    }

    public function getAmenitiesAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }


}
