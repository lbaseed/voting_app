<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ElectionDetail extends Model
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
        'election_id',
        'political_party_id',
        'candidate_id',
        'total_votes',
        'position',
        'winner',
        'zone',
        'description'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
