<?php

namespace Database\Seeders;

use App\Models\Personajes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PersonajeSeeder extends Seeder
{
    public function run(): void
    {
        Personajes::insert([
            [
                'nombre' => 'Mario',
                'url_imagen' => 'https://static.wikia.nocookie.net/mario/images/3/3c/Wario_MP100.png/revision/latest/scale-to-width-down/1200?cb=20171120161202&path-prefix=es',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Luigi',
                'url_imagen' => 'https://static.wikia.nocookie.net/mario/images/3/3c/Wario_MP100.png/revision/latest/scale-to-width-down/1200?cb=20171120161202&path-prefix=es',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Peach',
                'url_imagen' => 'https://static.wikia.nocookie.net/mario/images/3/3c/Wario_MP100.png/revision/latest/scale-to-width-down/1200?cb=20171120161202&path-prefix=es',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Bowser',
                'url_imagen' => 'https://static.wikia.nocookie.net/mario/images/3/3c/Wario_MP100.png/revision/latest/scale-to-width-down/1200?cb=20171120161202&path-prefix=es',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Toad',
                'url_imagen' => 'https://static.wikia.nocookie.net/mario/images/3/3c/Wario_MP100.png/revision/latest/scale-to-width-down/1200?cb=20171120161202&path-prefix=es',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Yoshi',
                'url_imagen' => 'https://static.wikia.nocookie.net/mario/images/3/3c/Wario_MP100.png/revision/latest/scale-to-width-down/1200?cb=20171120161202&path-prefix=es',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
