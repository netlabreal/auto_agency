<?php

namespace App\Http\Controllers;

use App\News;
use App\Page;

class UslugyController extends Controller
{
    // Показ страницы услуги
    public function show(){
        if(view()->exists('site.uslugy')){
            $pages = Page::all();
            $news = News::orderBy('id', 'desc')->take(2)->get();
            $menu = array();
            foreach ($pages as $page){
                $item = array('title'=>$page->name, 'alias' => $page->alias);
                array_push($menu, $item);
            }
            return view('site.uslugy', array('menu' => $menu, 'news'=>$news));
        }
    }
}
