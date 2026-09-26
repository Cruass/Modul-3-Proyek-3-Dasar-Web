<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'activity_date',
        'category',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'activity_date' => 'date',
        ];
    }

    public function scopeFilterStatus($query, $status)
    {
        $validStatuses = ['Planned', 'Ongoing', 'Done'];
        
        if (in_array($status, $validStatuses)) {
            return $query->where('status', $status);
        }
        
        return $query;
    }
}