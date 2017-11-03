<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Roumen\Sitemap;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\URL;
use App\News;


class SitemapController extends Controller
{
    public function index() {

        $sitemap = App::make("sitemap");

        $sitemap->add(URL::to('/'), '2016-11-18T12:30:00+02:00', '1.0', 'monthly');



        $pages = DB::table('news')->orderBy('created_at', 'desc')->get();

        foreach ($pages as $page)
        {

            $sitemap->add('http://sitename.ru/'.$page->title.'/'.$page->alias, $page->updated_at, '0.5', 'yearly');
        }


        $sitemap->store('xml', 'sitemap');
    }
}