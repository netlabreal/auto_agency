<?php

namespace App\Http\Controllers;

use App\Auto;
use App\ClassAuto;
use App\Dopuslugy;
use App\News;
use App\Page;
use Illuminate\Http\Request;

class AutoprokatController extends Controller
{
    // Показ всех объектов
    public function show(Request $request){
        $param = 0;
        $kol_sutok = 1;
        $dop=[];
        $auto = [];
        $setka = 'setka1';

        $cl = ClassAuto::all();
        $param = $request->get('class');
        // Определение кол-ва суток
        $kol_sutok = $request->get('kol_sutok');
        if($kol_sutok>3 and $kol_sutok<8){$setka = 'setka2';}
        if($kol_sutok>7){$setka = 'setka3';}
        //*************************
        if($param == 0){$auto = Auto::all(); }
        else{$auto = ClassAuto::find($param)->all_auto;}

        if($request->get('cena')){
            $kl = explode(",", $request->get('cena'));
            $auto = $auto->where($setka, '>=', (int)$kl[0])->where($setka, '<=', (int)$kl[1]);
        }

        $pages = Page::all();
        $news = News::orderBy('id', 'desc')->take(2)->get();
        $menu = array();
        foreach ($pages as $page){
            $item = array('title'=>$page->name, 'alias' => $page->alias);
            array_push($menu, $item);
        }
        return view('site.autopark', array('menu' => $menu, 'auto' => $auto, 'param'=>$param, 'class'=>$cl, 'setka'=>$setka, 'news'=>$news));
    }

    // Показ всего прайса
    public function price(Request $request){
        if(view()->exists('site.price')){
            $menu = array();
            $pages = Page::all();
            foreach ($pages as $page){
                $item = array('title'=>$page->name, 'alias' => $page->alias);
                array_push($menu, $item);
            }
            // ********************************//
            $cl = ClassAuto::all();
            $dop = Dopuslugy::all();
            $news = News::orderBy('id', 'desc')->take(2)->get();
            $all = [];
            foreach ($cl as $c){
                $autos = $c->all_auto;
                $ar = array('name'=>$c->name, 'autos'=>$autos);
                array_push($all, $ar);
            }
             return view('site.price', array('menu' => $menu, 'all' => $all, 'dop' => $dop, 'news'=>$news));
        }
    }
}
