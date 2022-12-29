<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Voting extends Model
{
    use HasFactory;

    protected $table='votings';

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
        'polling_unit_id',
        'registered_voters',
        'accredited_voters',
        'votes_casted',
        'valid_votes',
        'invalid_votes',
        'user_id',
        'date',
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function voteCounts()
    {
        return $this->hasMany(VoteCount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pollingUnit()
    {
        return $this->belongsTo(PollingUnit::class);
    }
}
