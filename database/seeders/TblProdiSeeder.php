<?php

namespace Database\Seeders;

use App\Models\TblProdi;
use Illuminate\Database\Seeder;

class TblProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TblProdi::factory(1)->create();
    }
}
