<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            ['id' => Service::SERVICE_CAMPING, 'name' => 'Camping', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Service::SERVICE_BUNGALOWS, 'name' => 'Domki', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Service::SERVICE_GUESTHOUSE, 'name' => 'Pensjonat', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
