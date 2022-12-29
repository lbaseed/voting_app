<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PoliticalParty extends Model
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
        'logo',
        'abreviation'
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function electionDetail()
    {
        return $this->hasOne(ElectionDetail::class);
    }
}
