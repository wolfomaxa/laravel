<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table = 'authors';
    protected $fillable = [
        'authors',
    ];
    public function getAuthors()
    {
        $authors_list = Authors::all();
        return $authors_list;
    }
}
