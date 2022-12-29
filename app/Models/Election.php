<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Election extends Model
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
        'active',
        'year',
        'type'
    ];

    public function voteCount()
    {
        return $this->hasMany(VoteCount::class);
    }

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }

    public function electionDetails()
    {
        return $this->hasMany(ElectionDetail::class);
    }
}
