<?php

namespace App\GraphQL\Mutations;

use App\Models\Voting;
use App\Models\VoteCount;
use App\Models\ElectionDetail;

final class CreateVoting
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $voting = Voting::create($args);

        if (array_key_exists('vote_counts', $args)) {
            foreach ($args["vote_counts"] as $key => $voteCount) {
                $voteCount['voting_id'] = $voting->id;
                $storeCount = VoteCount::create($voteCount);
                $electionDetail = ElectionDetail::firstWhere('political_party_id', $storeCount->political_party_id);
                $electionDetail->increment('total_votes', $storeCount->votes);
            }
        }

        return $voting;
    }
}
