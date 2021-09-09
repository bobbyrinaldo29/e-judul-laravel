<?php

namespace Database\Seeders;

use App\Models\TblListJudul;
use Illuminate\Database\Seeder;

class TblListJudulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TblListJudul::factory()->count(1)->create();
    }
}
