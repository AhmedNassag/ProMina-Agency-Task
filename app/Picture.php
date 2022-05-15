<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table    = 'pictures';
    protected $fillable = ['name','image','album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
