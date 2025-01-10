<?php

namespace Database\Seeders;

use App\Models\MetaSetting;
use Illuminate\Database\Seeder;

class MetaSettingSeeder extends Seeder
{
    public function run()
    {
        MetaSetting::create([
            'meta_title' => 'Website Title',
            'meta_description' => 'Website Description',
            'meta_keywords' => 'keyword1, keyword2',
            'meta_author' => 'Author Name',
            'google_analytics_id' => '',
            'google_ads_id' => '',
            'og_title' => '',
            'og_description' => '',
            'og_image' => '',
        ]);
    }
} 