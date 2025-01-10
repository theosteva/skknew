<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'platform',
        'icon',
        'url',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static function getIconOptions(): array
    {
        return [
            'icon-facebook' => 'Facebook',
            'icon-twitter' => 'Twitter',
            'icon-instagram' => 'Instagram',
            'icon-linkedin' => 'LinkedIn',
            'icon-youtube' => 'YouTube',
            'icon-tiktok' => 'TikTok',
            'icon-whatsapp' => 'WhatsApp',
            'icon-telegram' => 'Telegram'
        ];
    }
} 