<?php

namespace Database\Factories;

use App\Models\TblProdi;
use Illuminate\Database\Eloquent\Factories\Factory;

class TblProdiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TblProdi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prodi' => 'IF-S1',
        ];
    }
}
