<?php

use App\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::create
        ([
            'name' => 'Album 1',
        ]);

        Album::create
        ([
            'name' => 'Album 2',
        ]);

        Album::create
        ([
            'name' => 'Album 3',
        ]);
    }
}
