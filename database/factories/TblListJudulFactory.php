<?php

namespace Database\Factories;

use App\Models\TblListJudul;
use Illuminate\Database\Eloquent\Factories\Factory;

class TblListJudulFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TblListJudul::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'thn_ajaran_id' => '2017/2018',
            'namaJudul' => 'Sistem Informasi Perpustakaan Berbasis Web Studi Kasus Di SMK Widya Dirgantara Bandung',
            'penulis' => 'Bobby Rinaldo',
            'metode' => 'OOSE',
            'thn_ajaran_id' => '2017/2018',
            'abstrak' => 'Ini adalah Sistem Informasi Perpustakaan Berbasis Web yang menggunakan metode OOSE',
        ];
    }
}
