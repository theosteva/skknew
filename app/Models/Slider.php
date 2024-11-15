<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_size',
        'button_text',
        'button_link',
        'button_bg_color',
        'button_text_color',
        'button_size',
        'image',
        'overlay_opacity',
        'order',
        'is_active',
        'text_color',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'title_size' => 'integer',
        'overlay_opacity' => 'float',
    ];

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }

    public static function getButtonSizes(): array
    {
        return [
            'very-small' => [
                'padding' => '5px 10px',
                'font-size' => '12px',
            ],
            'small' => [
                'padding' => '8px 15px',
                'font-size' => '14px',
            ],
            'medium' => [
                'padding' => '10px 20px',
                'font-size' => '16px',
            ],
            'large' => [
                'padding' => '12px 25px',
                'font-size' => '18px',
            ],
            'very-large' => [
                'padding' => '15px 30px',
                'font-size' => '20px',
            ],
        ];
    }

    public function getButtonStyle(): string
    {
        $sizes = self::getButtonSizes();
        $size = $sizes[$this->button_size] ?? $sizes['medium'];

        return "
            background-color: {$this->button_bg_color};
            color: {$this->button_text_color};
            padding: {$size['padding']};
            font-size: {$size['font-size']};
        ";
    }
} 