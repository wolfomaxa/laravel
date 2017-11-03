<?php

namespace App\Http\Controllers;

use App\Authors;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpParser\Builder\Class_;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $newsModel, Authors $authorsModels)
    {
        $news_list = $newsModel->getNews();
        $authors_list = $authorsModels->getAuthors();
        $obj = new Two();
        $s = $obj->run(5, 6, 13);

        return view('news.index', compact('news_list','authors_list'))->with('s',$s);
    }
   public function GenerateSitemap(News $newsModel, Request $request){
        $content_begin ="<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
        xmlns:news=\"http://www.google.com/schemas/sitemap-news/0.9\">";
        $content_end = "</urlset>";
//        $content =
       $domain = $request->getHttpHost();
       $news_list = $newsModel->getNews();
       $content ='';
       foreach ($news_list as $news)
       {
           $content .= ' <url>
    <loc>'.$domain.'/'.$news->alias. '</loc>
    <news:news>
      <news:publication>
       <news:name>Известия</news:name>
        <news:language>ru</news:language>
      </news:publication>
<news:publication_date>
    '.$news->date.'</news:publication_date>
      <news:title>'.$news->title.'</news:title></news:news></url>';

       }

       File::put('sitemap.xml', $content_begin.$content.$content_end);
       return redirect('/sitemap.xml');
   }
    /**
     * @param $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($alias)
    {
        $news =  \App\News::where('alias', '=', $alias)->firstOrFail();
        return view('news.show', compact('news'));
    }
    public function getNewsThisWeek(News $newsModel)
    {
        $news_list = $newsModel->getNewsThisWeek();

     return view('news.news_in_week', compact('news_list','$news_list'));
    }
    public function doubleArray()
    {
        $old_array1 = array(5, 105, 10, 12, 5, 5, 5, 12, 12, 10);
        $new1 = [];
        $old_array = array(5, 105, 10, 12, 5, 5, 5, 12, 12, 10);
        sort($old_array);
        foreach ($old_array as $key=>$value1) {
            $i = 0;
            foreach ($old_array as $key1=>$value2) {
                if ($value1 == $value2) {
                    $i++;
                }
                if ($i > 1) {
                    unset($old_array[$key]);
                }
            }
        }
        foreach ($old_array as $key3=>$value2) {
            $new[] =$value2;
     }
        $first_el = array_shift($old_array1);
        $last_el = array_pop($old_array1);
        foreach ($old_array1 as $new_arr) {
            if (!in_array($new_arr, $new1))
            { $new1[] = $new_arr; }

        }
           sort($new1);
        $arrr = range(0, 100);

        return view('news.examle', compact('new', 'old_array1'))->with('new1',$new1)->with('arrr',$arrr)->with(['first_el'=>$first_el, 'last_el'=>$last_el]);
    }

    public function search(News $newsModel, Request $request)
    {
        $search1 = array();
        $search2 = array();
        $search3 = array();
        if ($request->phrase !='' and empty($request->corectly)){
        $search1 =  $newsModel->Search_phrase($request->phrase)->toArray();
            }
            else
            {
        $search1 =  $newsModel->Search_phrase_corectly($request->phrase)->toArray();
            }
        if ($request->select2 !=''){
            $search2 =  $newsModel->Search_authors($request->select2)->toArray();
        }
        if ($request->created !=''){
            $search3 =  $newsModel->Search_date($request->created)->toArray();
        }
        $search_array = array_merge($search1, $search2, $search3);
        $search_array = array_unique($search_array);

        $news_list = $newsModel->News_from_ids($search_array);
        return view('news.search', compact('news_list'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
interface I{
    function run($b, $c);
}
class Foo implements I {
    public $a;
    public $b;
    public $c;

    public function __construct() {
        $this->a = 10;
    }
    public function run($b, $c){
        $this->b = $b;
        $this->c = $c;
        return $this->a + $this->b + $this->c;
    }

}
class Two extends Foo {
    public $d;
    public function run($b, $c, $d=null){
        $this->d = $d;
        return $this->d + parent::run($b, $c);
    }
}


