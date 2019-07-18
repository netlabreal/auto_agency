<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Exception\ImageException;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

class Auto extends Model
{
    protected $table = 'auto';
    protected $fillable = ['name', 'mosh', 'class_auto_id', 'korobka', 'type_rule', 'v', 'opisanie', 'setka1', 'setka2', 'setka3', 'zalog', 'without', 'complect'];
    protected $attributes = ['preview' => '/storage/images/no-image.png', 'class_auto_id' => 0, 'cena' => 0];

    // Возвращает все прайсы на данный авто
    public function all_price(){
        return $this->hasMany(Price::class);
    }
    // Возвращает все авто на определенный класс
    public function all_classes(){
        return $this->belongsToMany(ClassAuto::class, 'cl_vs_auto');
    }
    // удаление папки
    function deleteFilePath(){
        $dir = '/public/images' . '/' . $this->id. '/';
        Storage::deleteDirectory($dir);
    }
    //Сохраняет файлы
    function saveFiles($file, $prv){
        $name = $file->getClientOriginalName();
        $vvv = 0;
        if($prv == $name){
            $vvv = 1;
        }
        if (!preg_match('/\.jpe?g$/i', $name)) {
            $name .= '.jpg';
        }
        $nameInStorage = str_random(20);
        $photoData = [
            'name' => $name,
            'prview'=>$nameInStorage,
            'type' => 'image/jpeg',
            'path' => '/public/images' . '/' . $this->id. '/',
            'pathf' => '/public/images' . '/' . $this->id. '/' . $nameInStorage . '.jpg',
            'sitef' => '/storage/images' . '/' . $this->id. '/' . $nameInStorage . '.jpg'
        ];
        // Открытие изображения
        try {
            $image = Image::make($file->getRealPath());
        } catch (ImageException $exception) {
            throw new \Exception('Это не изображение');
        }
        // Создание и сохранение большого изображения
        $image->resize(1024, 768, function (\Intervention\Image\Constraint $constraint) {
//            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $bigContent = (string)$image->encode('jpg', 95);
        $photoData['size'] = strlen($bigContent);


        if(!Storage::exists($photoData['path'])) {
            Storage::makeDirectory($photoData['path'], '775', true);
        }

        Storage::put($photoData['pathf'], $bigContent);
        if($vvv == 1){
            $this->preview = $photoData['sitef'];
            $this->save();
        }
        return $this->return_files();
    }

    // Сохраняет превью
    function savePreview(UploadedFile $file){
        $name = $file->getClientOriginalName();
        if (!preg_match('/\.jpe?g$/i', $name)) {
            $name .= '.jpg';
        }
        $nameInStorage = str_random(20);
        $photoData = [
            'name' => $name,
            'prview'=>$nameInStorage,
            'type' => 'image/jpeg',
            'path' => '/public/prview' . '/' . $this->id. '/',
            'pathf' => '/public/prview' . '/' . $this->id. '/' . $nameInStorage . '.jpg',
            'sitef' => '/storage/prview' . '/' . $this->id. '/' . $nameInStorage . '.jpg'
        ];
        // Открытие изображения
        try {
            $image = Image::make($file->getRealPath());
        } catch (ImageException $exception) {
            throw new \Exception('Это не изображение');
        }
        // Создание и сохранение большого изображения
        $image->resize(1024, 1024, function (\Intervention\Image\Constraint $constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $bigContent = (string)$image->encode('jpg', 95);
        $photoData['size'] = strlen($bigContent);

        Storage::deleteDirectory($photoData['path']);
        if(!Storage::exists($photoData['path'])) {
            Storage::makeDirectory($photoData['path'], '775', true);
        }

        Storage::put($photoData['pathf'], $bigContent);
        $this->preview = $photoData['prview'].'.jpg';
        $this->save();

        return $photoData;
    }

    // Возвращает файлы
    function return_files(){
        $directory = 'public/images/'.$this->id;
        $files = Storage::allFiles($directory);
        foreach ($files as $j=>$ff){
            $files[$j] = str_replace('public', '/storage', $ff);
        }
        $rez=$files;
        if(count($files)>0){$rez=$files;}
        return $rez;
    }

    // Удаление файлов
    function delete_files(){
        $directory = 'public/images/'.$this->id;
        Storage::deleteDirectory($directory);
    }

    function delete_file($f){
        $directory = 'public/images/'.$this->id;
        $f = str_replace('storage', 'public', $f);
        if(Storage::exists($f)) {

            Storage::delete($f);
        }
    }


}
