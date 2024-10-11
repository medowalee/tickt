<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create(['name' => 'خدمة 1', 'price' => 100.00]);
        Service::create(['name' => 'خدمة 2', 'price' => 200.00]);
        Service::create(['name' => 'خدمة 3', 'price' => 300.00]);
    }
}
