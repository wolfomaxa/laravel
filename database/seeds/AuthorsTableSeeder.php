<?php

use Illuminate\Database\Seeder;
use App\Authors;
class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authors::create([
        'authors' => 'Александр Чернов',
        ]);
        Authors::create([
        'authors' => 'Евгений Шепельский',
        ]);
        Authors::create([
        'authors' => 'Владимир Мясоедов',
        ]);
        Authors::create([
        'authors' => 'Юрий Рудис',
        ]);
    }
}
