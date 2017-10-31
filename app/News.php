<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'title', 'alias', 'anot', 'author_id', 'bodytext', 'date', 'published',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getNews()
{
    $news_list = News::all();
    return $news_list;
}
}
