<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Candidate extends Model
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
        'first_name',
        'last_name',
        'gender',
        'photo',
        'age',
        'political_party_id'
    ];

    public function party()
    {
        return $this->belongsTo(PoliticalParty::class);
    }
}
