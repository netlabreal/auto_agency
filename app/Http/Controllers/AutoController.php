<?php

namespace App\Http\Controllers;

use App\Dopuslugy;
use App\News;
use App\Page;
use Validator;
use Illuminate\Http\Request;
use App\Auto;
use App\ClassAuto;
use File;
use Image;



class AutoController extends Controller
{

    public function __construct()
    {

    }

    public function all_data(Request $request){
            $auto = Auto::all();
            return response()->json(['rez' => $auto, 'status' => 'ok']);

    }

    public function all_images(Request $request){
        if ($request->isMethod('post')) {
            if ($request->get('id')) {
                $auto = Auto::find($request->get('id'));
                return response()->json(['rez'=>$auto->return_files(), 'status'=>'ok']);

            }
        }
    }


   //Редактирование автомобиля
    public function edit(Request $request, $id){
        $auto = Auto::find($id);
        // Если объект не найден, то редирект на основную
        if($auto==null){
            return redirect()->route('auto_all');
        }
        $all_classes = ClassAuto::all();
        // GET запрос
        if($request->isMethod('GET')){
            $classes = $auto->all_classes;
            $files = $auto->return_files();
            $prev = $auto->preview;

            return view('admin.edit', array('auto' => $auto, 'classes'=>$classes, 'all_classes'=>$all_classes, 'files'=>$files, 'preview'=>$prev));
        }
        // POST запрос
        if($request->isMethod('POST')) {
            $input = $request->except('_token');
            $prev = $input['preview'];
            // Заполняем новыми данными объект
            $auto->fill($input);
            // Обновление превью
           if($prev== '' or is_null($prev)){
               $prev='storage/images/no-image.png';
           }
            $auto->preview = $prev;
            // Обновление класса авто
            if($input['classes']){
                $cl = explode(',', $input['classes']);
                if($input['old_classes']){
                    $old_cl = explode(',', $input['old_classes']);
                    $auto->all_classes()->detach($old_cl);
                }
                $auto->all_classes()->attach($cl);
            }
            // Удаляем файлы
            if($input['deleteFiles']){
                $del = explode(',', $input['deleteFiles']);
                foreach($del as $fd){
                    $auto->delete_file($fd);
                }
            }
            // Добавляем файлы
            if($input['addFiles']){
                foreach(explode(',', $input['addFiles']) as $image) {
                    $f = $request->file($image);
                    $auto->saveFiles($f, $prev);
                }
            }
            // Проверка, что обновление прошло без ошибок
            if($auto->update()){
                return response()->json(['rez' =>'Автомобиль '.$auto->name.' был успешно обновлен!', 'status'=>'ok', 'auto'=>$auto]);
            }
            else{
                return response()->json(['rez' =>'Автомобиль '.$auto->name.' не был обновлен!', 'status'=>'error', 'auto'=>$auto]);
            }


        }
    }
    //Удаление автомобиля
    public function delete(Request $request)
    {
        $rez = ''; $i = 0; $status = 'error';
        if ($request->isMethod('post')) {
            if($request->get('id')) {
                $auto = Auto::find($request->get('id'));
                $n = $auto['name'];
                $status = 'ok';
                $auto->delete_files();
                $auto->all_classes()->detach();
                $auto->delete();
                $rez = 'Автомобиль '.$n.' был успешно удален!';
            }
        }
        return response()->json(['rez'=>$rez, 'auto'=>$auto, 'status'=> $status]);
    }
    //Вывод автомобиля
    public function show(Request $request, $id)
    {
        $pages = Page::all();
        $auto = Auto::find($id);
        $menu = array();
        foreach ($pages as $page){
            $item = array('title'=>$page->name, 'alias' => $page->alias);
            array_push($menu, $item);
        }

        if (!is_null($auto)) {
            $f = $auto->return_files();
            $dop = $auto->all_classes;
            $news = News::orderBy('id', 'desc')->take(2)->get();
            return view('site.one', array('menu' => $menu, 'auto' => $auto, 'files'=>$f, 'dop'=>$dop, 'news'=>$news));
        }
        else
        {
            return redirect()->route('autopark')->with('status', 'Автомобиля с id '.$id.' не существует!');
        }
    }
    // Добавление автомобиля
   public function add(Request $request){
       if($request->isMethod('get')){
           if(view()->exists('admin.add')){
               $auto = null;
               $classes = null;
               $all_classes = ClassAuto::all();
               if($request->get('base')){
                   $auto = Auto::find($request->get('base'));
                    if($auto!= null){
                        $classes = $auto->all_classes;
                        return(view('admin.add', array('all_classes'=>$all_classes, 'auto'=>$auto, 'classes'=>$classes)));
                    }
                    else{return redirect()->route('auto_all');}

               }else{
                   return(view('admin.add', array('all_classes'=>$all_classes, 'auto'=>$auto, 'classes'=>$classes)));
               }
           }
           abort(404);
       }

       if($request->isMethod('post')){
           $input = $request->except('_token');
           $auto = new Auto();
           $auto->fill($input);
           // Определяем превью
           if($input['preview'] == '' or is_null($input['preview'])){
               $input['preview']='storage/images/no-image.png';
           }

           if($auto->save()){
               // Класс авто
               $cl = explode(',', $input['classes']);
               $auto->all_classes()->attach($cl);

               // Добавляем файлы
               if($input['addFiles']){
                   foreach(explode(',', $input['addFiles']) as $image) {
                       $f = $request->file($image);
                       $auto->saveFiles($f, $input['preview']);
                   }
               }

               return response()->json(array('status'=>'ok', 'rez'=>'Автомобиль '.$auto['name'].' был успешно добавлен!'));
           }else{
                return response()->json(array('status'=>'error', 'rez'=>'Автомобиль '.$auto['name'].' не был добавлен!'));
           }
       }

   }
   // Вывод всех автомобилей
   public function all(Request $request){
       if(view()->exists('admin.main')){
           $auto = Auto::all();
           return view('admin.main', array('data'=>$auto));
       }
    }

    // Вывод дополнительных услуг
    public function dop(){
        $dop = Dopuslugy::all();
        return view('admin.dop', array('dop'=>$dop));
    }
    // Добавление дополнительной услуги
    public function add_dop(Request $request){
        if($request->isMethod('get')){
            return(view('admin.add_dop'));
        }
        if($request->isMethod('post')){
            $input = $request->except('_token');
            $dop = new Dopuslugy();
            $dop->fill($input);
            if($dop->save()){
                return response()->json(array('status'=>'ok', 'rez'=>'Услуга '.$dop['name'].' была успешно добавлен!'));
            }else{
                return response()->json(array('status'=>'error', 'rez'=>'Услуга '.$dop['name'].' не была добавлена!'));
            }
        }
    }
    // Редактирование дополнительной услуги
    public function edit_dop(Request $request, $id){
        $dop = Dopuslugy::find($id);
        if($request->isMethod('GET')){
            return view('admin.edit_dop', array('dop' => $dop));
        }
        if($request->isMethod('POST')) {
            $input = $request->except('_token');
            // Заполнение новыми данными
            $dop->fill($input);
            // Обновление
            if($dop->update()){
                return response()->json(['rez' =>'Услуга '.$dop->name.' была успешно обновлена!', 'status'=>'ok', 'dop'=>$dop]);
            }
            else{
                return response()->json(['rez' =>'Услуга '.$dop->name.' не была обновлена!', 'status'=>'error', 'dop'=>$dop]);
            }

        }

    }
    // Удаление дополнительной услуги
    public function delete_dop(Request $request)
    {
        $rez = ''; $i = 0; $status = 'error';
        if ($request->isMethod('post')) {
            if($request->get('id')) {
                $dop = Dopuslugy::find($request->get('id'));
                $n = $dop['name'];
                $status = 'ok';
                $dop->delete();
                $rez = 'Услуга '.$n.' была успешно удалена!';
            }
        }
        return response()->json(['rez'=>$rez, 'dop'=>$dop, 'status'=> $status]);
    }

    //Вывод всех новостей
    public function news(){
        $news = News::all();
        return view('admin.news', array('news'=>$news));
    }
    // Добавление новости
    public function add_news(Request $request){
        if($request->isMethod('get')){
            return(view('admin.add_news'));
        }
        if($request->isMethod('post')){
            $input = $request->except('_token');
            $news = new News();
            // Заполнение
            $news->fill($input);
            // Сохранение
            if($news->save()){
                return response()->json(array('status'=>'ok', 'rez'=>'Новость '.$news['name'].' была успешно добавлена!'));
            }else{
                return response()->json(array('status'=>'error', 'rez'=>'Новость '.$news['name'].' не была добавлена!'));
            }

        }
    }
    // Удаление новости
    public function delete_news(Request $request){
        $rez = ''; $i = 0; $status = 'error';
        if ($request->isMethod('post')) {
            if($request->get('id')) {
                $news= News::find($request->get('id'));
                $n = $news['name'];
                $status = 'ok';
                $news->delete();
                $rez = 'Новость '.$n.' была успешно удалена!';
            }
        }
        return response()->json(['rez'=>$rez, 'news'=>$news, 'status'=> $status]);
    }
    // Редактирование новости
    public function edit_news(Request $request, $id){
        $news = News::find($id);

        if($request->isMethod('GET')){
            return view('admin.edit_news', array('news' => $news));
        }

        if($request->isMethod('post')){
            $input = $request->except('_token');
            $news->fill($input);

            if($news->update()){
                return response()->json(['rez' =>'Новость '.$news->name.' была успешно обновлена!', 'status'=>'ok', 'news'=>$news]);
            }
            else{
                return response()->json(['rez' =>'Новость '.$news->name.' не была обновлена!', 'status'=>'error', 'news'=>$news]);
            }
        }
    }

}
