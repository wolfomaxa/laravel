<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use DB;
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


    public function getShortBodytextAttribute()
    {
        $str = $this->bodytext;
        $length = 150;
        $new_str = mb_substr($str, 0, mb_strpos($str, " ", $length) ?: $length);
        return (mb_strlen($new_str) > $length) ? $new_str."..." : $new_str;
    }
    public function getReplaceBodytextAttribute()
    {
        $str = $this->bodytext;
        $count = null;
        $returnMatch = preg_match_all('~<.*>(.*)</.*>~ U', $str, $matches);
//        $returnValue = preg_replace('~<.*>(.*)</.*>~ U', '<h1>$1</h1>', $str, 1, $count);
        $return = preg_replace('/'.preg_quote($matches[0][0],'/').'/', '<h1>'.$matches[0][0].'</h1><h2>'.$matches[0][1].'</h2>', $str, 1);
        return $return;
//        $string = "<p> nnnnnn</p> <p>asdasdsadasdas</p>";
//        $tsd = 10;
//        $newstring = preg_replace_callback(
//            '~<.*>(.*)</.*>~',
//            function($match) { return ((var_dump($match))); },
//            $string
//        );
//        return $newstring;
    }

public function getNewsThisWeek()
{
    $week_begin = Carbon\Carbon::now()->startOfWeek()->toDateString();
    $week_end = Carbon\Carbon::now()->endOfWeek()->toDateString();
    $news_list = News::whereBetween( DB::raw('date(date)'), [$week_begin, $week_end])->get();
    return $news_list;
}
    public function Search_phrase($query)
    {
        $search = News::where([
            ['title', 'like', '%'.$query.'%'],
        ])->orWhere([
            ['annot', 'like', '%'.$query.'%'],
        ])->orWhere([
            ['bodytext', 'like', '%'.$query.'%'],
        ])->pluck('id');
        return $search;
    }
    public function Search_phrase_corectly($query)
    {
        $search = News::where([
            ['title', 'like', $query],
        ])->orWhere([
            ['annot', 'like', $query],
            ])->orWhere([
            ['bodytext', 'like', $query],
            ])->pluck('id');
        return $search;
    }
    public function Search_authors($query)
    {
        $search = News::where([
            ['author_id', 'like', '%'.$query.'%'],
        ])->pluck('id');
        return $search;
    }
    public function Search_date($query)
    {
        $search = News::where([
            ['date', 'like', '%'.$query.'%'],
        ])->pluck('id');
        return $search;
    }
    public function News_from_ids($query)
    {
        $news_list = News::whereIn('id', $query)
            ->get();
        return $news_list;
    }

}
