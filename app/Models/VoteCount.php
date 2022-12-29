<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VoteCount extends Model
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
        'voting_id',
        'polling_unit_id',
        'political_party_id',
        'user_id',
        'votes',
    ];

    public function voting()
    {
        return $this->belongsTo(Voting::class);
    }

    public function party()
    {
        return $this->belongsTo(PoliticalParty::class);
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function pollingUnit()
    {
        return $this->belongsTo(PollingUnit::class);
    }

    public function politicalParty()
    {
        return $this->belongsTo(PoliticalParty::class);
    }
}
