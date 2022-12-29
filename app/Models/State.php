<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class State extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'uuid',
        'country_id',
        'name',
        'inec_ref',
    ];

    public function lgas()
    {
        return $this->hasMany(Lga::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class);
    }
}
