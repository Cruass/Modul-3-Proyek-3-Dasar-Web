<?php

namespace App\Services;

use App\Models\Activity;
use Exception;

class ActivityService
{
    public function updateStatus(Activity $activity, string $newStatus): bool
    {
        $statusOrder = [
            'Planned' => 1,
            'Ongoing' => 2,
            'Done' => 3,
        ];

        $currentRank = $statusOrder[$activity->status] ?? 0;
        $newRank = $statusOrder[$newStatus] ?? 0;

        if ($newRank < $currentRank) {
            throw new Exception("Status kegiatan tidak boleh mundur dari {$activity->status} ke {$newStatus}.");
        }

        $activity->status = $newStatus;

        return $activity->save();
    }
}
