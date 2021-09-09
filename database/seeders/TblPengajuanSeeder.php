<?php

namespace Database\Seeders;

use App\Models\TblPengajuan;
use Illuminate\Database\Seeder;

class TblPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TblPengajuan::factory(1)->create();
    }
}
