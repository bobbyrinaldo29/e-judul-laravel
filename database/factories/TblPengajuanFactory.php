<?php

namespace Database\Factories;

use App\Models\TblPengajuan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TblPengajuanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TblPengajuan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => '17110161',
            'nama' => 'Bobby Rinaldo Sukma Dewa',
            'ptodi' => 'IF-S1',
            'judul' => 'Sistem Informasi Akademik Berbasis Web',
            'pengajuan' => 'Skripsi',
            'email' => 'bobbyrinaldo@live.com',
        ];
    }
}
