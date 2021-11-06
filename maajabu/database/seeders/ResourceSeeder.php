<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\Artist;
use App\Models\Studio;
use App\Models\Category;
use App\Models\Engineer;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Social_network;
use App\Models\Tarif;
use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Studio::factory()->count(2)->create();
        // Artist::factory()->count(20)->create();
        // Category::factory()->count(7)->create();
        // Engineer::factory()->count(10)->create();
        // Phone::factory()->count(2)->create();
                Reservation::factory()->count(15)->create();
                Service::factory()->count(4)->create();
                Social_network::factory()->count(4)->create();
        // Tarif::factory()->count(2)->create();
        // User::factory()->count(10)->create();
                Work::factory()->count(27)->create();


    }
}
