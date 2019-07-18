<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Page;
use App\Zakaz;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ZakazMail;

class ZakazController extends Controller
{
    // Заказ автомобиля
    public function show(Request $request){
        if($request->isMethod('POST')){
            $input = $request->except('_token');
            $zakaz = new Zakaz();

            // Заполнение объекта данными
            $zakaz->fill($input);
            // Преобразование строки в дату
            $rr = strtotime($zakaz->datn);
            $zakaz->datn = date('Y-m-d H:i:s', $rr);
            $rr = strtotime($zakaz->datk);
            $zakaz->datk= date('Y-m-d H:i:s', $rr);

            // Сохранение
            if($zakaz->save()){
                try{
                    // отправка Email
                    Mail::to('ab.litvinov.sl@gmail.com')->send(new ZakazMail($zakaz));
                }
                catch (\Exception  $e){
                    return response()->json(['status'=>'error', 'rez' =>$e]);
                }
                return response()->json(['status'=>'ok', 'rez' =>'Заявка была успешно отправлена! С Вами свяжутся в ближайшее время']);
            }
            else{
                return response()->json(['status'=>'error', 'rez' =>'Заявка не была отправлена!']);
            }
        }
        else{
            if(view()->exists('site.zakaz')){
                $news = News::orderBy('id', 'desc')->take(2)->get();
                $pages = Page::all();
                $auto = Auto::all();
                $param = 0;
                $param = $request->get('auto');

                $menu = array();
                foreach ($pages as $page){
                    $item = array('title'=>$page->name, 'alias' => $page->alias);
                    array_push($menu, $item);
                }
                return view('site.zakaz', array('menu' => $menu, 'auto'=>$auto, 'param'=>$param, 'news'=>$news));
            }
        }
    }


}
