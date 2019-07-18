@extends('layouts.admin_layout')

@section('content')

<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">{{$auto['name']}}
            <div class="btn-actions-pane-right">
                <div role="group" class="btn-group-sm btn-group">

                </div>
            </div>
        </div>

        <div class="card-body">
            <form class="" action="{{route('auto_edit', array("id"=>$auto['id']))}}" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="lab">Наименование</label>
                            <input name="name" value="{{$auto['name']}}" id="exampleEmail" placeholder="Наименование авто" type="text" class="form-control">
                        </div>
                    </div>
                    @if(@isset($data['classes']))
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="exampleSelect" class="lab">Класс автомобиля</label>
                                <select name="class_auto_id" id="exampleSelect" class="form-control">
                                    @foreach($data['classes'] as $class)
                                        @if ($class['id'] == $auto['class_auto_id'])
                                            <option selected value="{{$class['id']}}">{{$class['name']}}</option>
                                        @else
                                           <option value="{{$class['id']}}">{{$class['name']}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label for="exampleSelect" class="lab">Коробка передач</label>
                            <select name="korobka" id="korobka" class="form-control">
                                <option value="1">автомат</option>
                                <option value="2">коробка</option>
                                <option value="3">вариатор</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label for="exampleSelect" class="lab">Тип руля</label>
                            <select name="type_rule" id="type" class="form-control">
                                <option value="1">правый</option>
                                <option value="2">левый</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="lab">Мощность двигателя (лс)</label>
                            <input name="mosh" value="{{$auto['mosh']}}" id="mosh" placeholder="Мощность двигателя" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="lab">Объем двигателя (литра)</label>
                            <input name="v" step="0.1" value="{{$auto['v']}}" id="mosh" placeholder="Объем двигателя" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="lab">Стоимость (руб)</label>
                            <input name="cena" value="{{$auto['cena']}}" id="mosh" placeholder="Стоимость" type="number" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="position-relative form-group"><label for="exampleText" class="lab">Описание</label>
                            <textarea rows="5" name="opisanie" id="editor1" class="form-control" >{{$auto['opisanie']}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="position-relative form-group"><label for="exampleFile" class="lab">Загрузите фото авто</label>
                            <input name="files" id="exampleFile" type="file" class="form-control-file filestyle" data-buttonName="btn-primary" multiple="true">
                        </div>
                        <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>

                    </div>


                    {{csrf_field()}}
                    <div class="col-md-12">
                        <button type="submit" class="mt-1 btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>


    </div>




</div>
@endsection