<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lga extends Model
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
        'name',
        'state_id',
        'inec_ref'
    ];

    protected $appends = ['total_votes'];
    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function getTotalVotesAttribute()
    {
        $wards = $this->wards();
        $pollingUnits = $wards->pollingUnits()->sum('registered_voters');
        return $pollingUnits;
    }
}
