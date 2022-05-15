<?php

use App\Picture;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Picture::create
        ([
            'name'     => 'Pic 1',
            'image'    => 'p1.jpg',
            'album_id' => 1
        ]);

        Picture::create
        ([
            'name'     => 'Pic 2',
            'image'    => 'p2.jpg',
            'album_id' => 1
        ]);

        Picture::create
        ([
            'name'     => 'Pic 3',
            'image'    => 'p3.jpg',
            'album_id' => 2
        ]);
    }
}
