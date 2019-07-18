<?php

namespace App\Http\Controllers;

use App\News;
use App\Page;
use Illuminate\Http\Request;

class ConditionsController extends Controller
{
    // Показ страницы условия
    public function show(){
        if(view()->exists('site.usloviya')){
            $pages = Page::all();
            $news = News::orderBy('id', 'desc')->take(2)->get();
            $menu = array();
            foreach ($pages as $page){
                $item = array('title'=>$page->name, 'alias' => $page->alias);
                array_push($menu, $item);
            }
            return view('site.usloviya', array('menu' => $menu, 'news'=>$news));
        }
    }

    // Показ новостей
    public function show_news(Request $request, $id){
        if(view()->exists('site.news')){
            $pages = Page::all();
            $menu = array();
            foreach ($pages as $page){
                $item = array('title'=>$page->name, 'alias' => $page->alias);
                array_push($menu, $item);
            }
            $news = News::orderBy('id', 'desc')->take(2)->get();
            $n = News::findOrFail($id);
            return view('site.news', array('menu' => $menu, 'news'=>$news, 'n'=>$n));

        }
    }
}
