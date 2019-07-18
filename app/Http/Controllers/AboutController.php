<?php

namespace App\Http\Controllers;

use App\News;
use App\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show(){
        if(view()->exists('site.about')){
            $news = News::orderBy('id', 'desc')->take(2)->get();
            $pages = Page::all();
            $menu = array();
            foreach ($pages as $page){
                $item = array('title'=>$page->name, 'alias' => $page->alias);
                array_push($menu, $item);
            }
            return view('site.about', array('menu' => $menu, 'news'=>$news));
        }
    }
}
