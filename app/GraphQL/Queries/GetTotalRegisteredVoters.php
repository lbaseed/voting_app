<?php

namespace App\GraphQL\Queries;

use App\Models\PollingUnit;

final class GetTotalRegisteredVoters
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $pollingUnits = PollingUnit::all();

        return [
            "totalPollingUnits" => $pollingUnits->count(),
            "totalVoters" => $pollingUnits->sum("registered_voters")
        ];
    }
}
