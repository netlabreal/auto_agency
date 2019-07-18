<?php

namespace App\Http\Controllers;

use App\ClassAuto;
use App\News;
use Illuminate\Http\Request;
use App\Page;
use DB;

class IndexController extends Controller
{
    // Главная страница
    public function execute(Request $request){
        if($request->isMethod('post')){}
        $pages = Page::all();
        $news = News::orderBy('id', 'desc')->take(2)->get();
        $classes = ClassAuto::all();
        $menu = array(); $cl = array();
        foreach ($pages as $page){
            $item = array('title'=>$page->name, 'alias' => $page->alias);
            array_push($menu, $item);
        }
        foreach ($classes as $class){
            $it = array('name'=>$class->name);
            array_push($cl, $it);
        }
        return view('site.index', array('menu' => $menu, 'tags'=>$tags, 'cl_auto'=>$cl, 'news'=>$news));
    }


}
