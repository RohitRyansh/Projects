<?php

namespace Database\Seeders;

use App\Models\WebType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $webTypes = WebType::ALL_TYPES;

        foreach ($webTypes as $key =>  $type) {
            WebType::create([
                'id' => $key,
                'name' => $type,
            ]);
        }
    }
}
