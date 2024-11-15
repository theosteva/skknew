<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Body extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getIconOptions(): array
    {
        return [
            'icon-umbrella' => 'Umbrella',
            'icon-monitor' => 'Monitor',
            'icon-cup' => 'Cup',
            'icon-pencil' => 'Pencil',
            'icon-cog' => 'Cog',
            'icon-layers' => 'Layers',
        ];
    }
}
