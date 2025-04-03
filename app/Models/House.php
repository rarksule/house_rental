<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use App\Models\User;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
    ];


    public function owner()
    {
        return $this->hasOne(User::class, 'owner_id');
    }

    public function tenant()
    {
        return $this->hasOne(User::class, 'tenant_id');
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

    // public function getNameAttribute(): string
    // {
    //     return $this->first_name . ' ' . $this->last_name;
    // }

    public function getImageAttribute(): string
    {
        if ($this->getMedia() != null) {
            return $this->getFirstMediaUrl();
        }
        return asset('assets/images/no-image.jpg');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
