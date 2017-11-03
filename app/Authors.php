<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
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
    public function getAuthorsHaveNews()
    {
        $authors_list_news = DB::table('authors')
            ->whereIn('id',function ($query) {
                $query->select(DB::raw('author_id'))
                    ->from('news')
                    ->whereRaw('news.author_id = authors.id');
            })
            ->get();
//
        return $authors_list_news;
    }
}
