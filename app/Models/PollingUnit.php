<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PollingUnit extends Model
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
        'ward_id',
        'name',
        'registered_voters',
        'inec_ref'
    ];

    public function voteCount()
    {
        return $this->hasMany(VoteCount::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
