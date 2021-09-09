<?php

namespace Database\Seeders;

use App\Models\ThnAjaran;
use Illuminate\Database\Seeder;

class ThnAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThnAjaran::factory()->count(1)->create();
    }
}
