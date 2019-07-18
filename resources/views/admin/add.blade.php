@extends('admin.layout')

@section('content')

    <div class="col-md-12">
        <div class=" " >
            <div class="card-header" style="font-size: 21px; font-family: txt4;">Новый автомобиль
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">

                    </div>
                </div>
            </div>

            <div class="card-body" >
                <div class="" action="{{route('auto_add')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-row">

                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">Основное</div>

                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="lab">Наименование</label>
                                            <input name="name" value="{{old('name')}}" id="name" placeholder="Наименование авто" type="text" class="form-control">
                                        </div>
                                    </div>

                                    @if(@isset($all_classes))
                                        <div class="col-md-6" style="margin-bottom: 15px;">
                                            <div class="position-relative form-group"><label for="exampleSelect" class="lab">Класс автомобиля</label>
                                                <div>
                                                    @foreach($all_classes as $class)
                                                        <input class="selected_classes" type="checkbox" data-id="{{$class['id']}}" id="t{{$class['id']}}" name="clases[]" value="{{$class['id']}}"><label style="padding-right: 15px;"  for="t{{$class['id']}}">{{$class['name']}}</label>

                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="exampleSelect" class="lab">Коробка передач</label>
                                            <select name="korobka" id="korobka" class="form-control">
                                                <option value="1" korobka-id="1">автомат</option>
                                                <option value="2" korobka-id="2">коробка</option>
                                                <option value="3" korobka-id="3">вариатор</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="exampleSelect" class="lab">Тип руля</label>
                                            <select name="type_rule" id="type_rule" class="form-control">
                                                <option value="1" rule-id="1">правый</option>
                                                <option value="2" rule-id="2">левый</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="lab">Мощность двигателя (лс)</label>
                                            <input name="mosh" value="{{old('mosh')}}" id="mosh" placeholder="Мощность двигателя" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="lab">Объем двигателя (литра)</label>
                                            <input name="v" step="0.1" value="{{old('v')}}" id="v" placeholder="Объем двигателя" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleText" class="lab">Описание</label>
                                            <textarea rows="5" name="opisanie" id="opisanie" class="form-control" >{{old('opisanie')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleText" class="lab">Комплектация</label>
                                            <textarea rows="5" name="complect" id="complect" class="form-control" >{{old('complect')}}</textarea>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                        {{--                    ************************--}}

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Прайс</div>

                                <div class="panel-body">
                                    <div class="col-md-2">
                                        <div class="position-relative form-group">
                                            <label for="setka1" class="lab">от 1 до 3 дн.</label>
                                            <input name="setka1" value="{{old('setka1')}}" id="setka1" placeholder="Стоимость" type="number" class="form-control" min="1">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="position-relative form-group">
                                            <label for="setka1" class="lab">от 4 до 7 дн.</label>
                                            <input name="setka2" value="{{old('setka2')}}" id="setka2" placeholder="Стоимость" type="number" class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="position-relative form-group">
                                            <label for="setka1" class="lab">> 7 дн.</label>
                                            <input name="setka3" value="{{old('setka3')}}" id="setka3" placeholder="Стоимость" type="number" class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="position-relative form-group">
                                            <label for="setka1" class="lab">Залог</label>
                                            <input name="zalog" value="{{old('zalog')}}" id="zalog" placeholder="Стоимость" type="number" class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="position-relative form-group">
                                            <label for="setka1" class="lab">Без ограничения</label>
                                            <input name="without" value="{{old('without')}}" id="without" placeholder="Стоимость" type="number" class="form-control" min="1">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        {{--                    ************************--}}

                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">Загрузите фото авто</div>

                                <div class="panel-body">

                                    <input name="files" id="pictures_files" type="file" class="form-control-file filestyle" data-buttonName="btn-primary" multiple="true" onchange="onFileSelected(event)" style="padding-bottom: 25px;">

                                    <div class="col-md-12" id="all_fotos">
                                    </div>
                                </div>

                            </div>

                        </div>

                        {{csrf_field()}}
                        <div class="col-md-12" style="margin-top: 25px;">
                            <button id="save" type="submit" class="mt-1 btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>



        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="    padding-bottom: 25px;">
                        <h5 class="modal-title" id="m_title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" id="m_body">
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
<script>
    var classes = @json($classes);
    var auto = @json($auto);
    var addFiles = [];
    var preview = '';
    var tek_file='';

    // Добавление фотографии
    function add_foto(img, tek){
        let html = document.createElement('div');
        let title = ''; let data_new = '0';
        if(tek!=''){title = tek;data_new = tek;}else{title=img; }
        html.style.marginBottom = '15px';
        let r = '';
        if(img.src){
            r ='<img src="'+img.src+'"  datanew="'+data_new+'" title="'+title+'" alt="" class="rounded" style="width:120px; height: 90px;    object-fit: cover;">';
        }else
        {
            r ='<img src="'+img+'" datanew="'+data_new+'" title="'+title+'" alt="" class="rounded" style="width:120px;height: 90px;    object-fit: cover;">';
        }
        let button_main = '';
        if(preview){
            if(img == preview){
                button_main += '<button class="btn btn-sm btn-disable main_button" style="margin-right: 5px;">главная</button>';
            }
            else {
                button_main += '<button class="btn btn-sm main_button" style="margin-right: 5px;">главная</button>';
            }
        }
        else{
            button_main += '<button class="btn btn-sm main_button" style="margin-right: 5px;">главная</button>';
        }
        html.classList.add("col-md-3");
        html.innerHTML =
            '<div class="mb-3 card card-body" style="text-align: center;">'+
            '<div class="img-responsive">'+
            r +
            '</div>'+
            '<div style="margin-top: 10px;">'+
            button_main +
            '<button class="btn btn-sm del_foto" id="del_foto">удалить</button>'+
            '</div>'+

            '</div>'
        ;

        let del_b = html.querySelectorAll('.del_foto')[0];
        del_b.addEventListener('click', function () {
            if(this.parentNode.parentNode.querySelectorAll('img')[0].getAttribute('datanew')=='0'){
                deleteFiles.push(this.parentNode.parentNode.querySelectorAll('img')[0].title);
            }
            else{
                for(var t=0; t<addFiles.length; t++){
                    if(addFiles[t].name == this.parentNode.parentNode.querySelectorAll('img')[0].title){
                        addFiles.splice(t, 1);
                    }
                }
            }
            r = this.parentElement.querySelectorAll('.main_button')[0];

            this.parentNode.parentNode.parentNode.remove();
            if(r.classList.contains('btn-disable')){
                tek = document.querySelectorAll('.main_button')[0];
                if(tek != undefined){
                    preview = tek.parentNode.parentNode.querySelectorAll('img')[0].title;
                    tek.classList.add('btn-disable');

                }
                else{preview = '';}
            }

        });

        let main_b = html.querySelectorAll('.main_button')[0];
        main_b.addEventListener('click', function () {
            mm = document.getElementsByClassName('main_button');
            preview = this.parentNode.parentNode.querySelectorAll('img')[0].title;
            for(var j =0; j<mm.length; j++){
                mm[j].classList.remove('btn-disable');
            }
            this.classList.add('btn-disable');
        });

        document.getElementById('all_fotos').insertBefore(html, null);

    }

    // Функция, при выборе файлов
    function onFileSelected(event) {
        var selectedFile = event.target.files;

        for(var i = 0; i<selectedFile.length; i++)
        {
            var reader = new FileReader();
            var imgtag = document.getElementById("all_fotos");
            reader.onloadstart = function(event){
                let rt = 1;
            };
            reader.onload = function(event) {
                globalPic = new Image();
                globalPic.src = event.target.result;
                globalPic.title = selectedFile.name;
                tek_file = event.target.filename;
                add_foto(globalPic, tek_file);
            };
            reader.filename = selectedFile[i].name;
            reader.readAsDataURL(selectedFile[i]);
            tek_file = selectedFile[i].name;
            addFiles.push(selectedFile[i]);
        }
        document.getElementById('pictures_files').value="";


    };

    // Ajax функция
    function peredat(fd){
        return $.ajax({
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            url: '{{route('auto_add')}}',
            type: 'post',
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            data: fd,
            success: function (data) {

            },
        });
    }

    $(document).ready(function() {
        // При копировании, передается базовый автомобиль и заполняются данные в форме
        /////////////////////////////////////////////////////////////
       if(auto != null){
           if(classes){
               for(var t=0; t<classes.length; t++){
                   $rt = $('[data-id='+classes[t].id+']')[0];
                   $rt.checked = true;
               }
           }

           let dd = $('[korobka-id="{{$auto['korobka']}}"')[0];
           dd.selected = true;
           let dd1 = $('[rule-id="{{$auto['type_rule']}}"')[0];
           dd1.selected = true;
           $('#mosh').val({{$auto['mosh']}});
           $('#v').val({{$auto['v']}});
           $('#opisanie').val(auto['opisanie']);
           $('#complect').val(auto['complect']);
           $('#setka1').val({{$auto['setka1']}});
           $('#setka2').val({{$auto['setka2']}});
           $('#setka3').val({{$auto['setka3']}});
           $('#zalog').val({{$auto['zalog']}});
           $('#without').val({{$auto['without']}});
       }

        /////////////////////////////////////////////////////////////
        // Функция сохранения нового авто
        $('#save').click(function() {
            var errors = [];
            let fd = new FormData;
            let all_classes = [];
            $(".selected_classes").each(function (index) {
                if ($(this).prop('checked') == true) {
                    all_classes.push(Number($(this).val()));
                }
            });

            //*************************//
            if($('#name').val()==''){errors.push('Необходимо внести название!')}
            if($('#mosh').val()==''){errors.push('Необходимо внести мощность!')}
            if($('#v').val()==''){errors.push('Необходимо внести объем двигателя!')}
            if($('#opisanie').val()==''){errors.push('Необходимо внести описание!')}
            if($('#setka1').val()==''){errors.push('Необходимо внести стоимость от 1 до 3 дн.!')}
            if($('#setka2').val()==''){errors.push('Необходимо внести стоимость от 4 до 7 дн.!')}
            if($('#setka3').val()==''){errors.push('Необходимо внести стоимость > 7 дн.!')}
            if($('#zalog').val()==''){errors.push('Необходимо внести сумму залога!')}
            if($('#without').val()==''){errors.push('Необходимо внести сумму Без ограничения!')};
            if(all_classes.length==0){errors.push('Необходимо указать хотя бы один класс автомобиля!')};
            //*************************//
            if((errors.length)>0){
                $('#m_title').html('');
                let r = '<ul>';
                for(var k = 0; k < errors.length; k++) {
                    r += '<li style="list-style: none; font-size: 16px;">'+errors[k]+'</li>';
                }
                r += '</ul>';
                Swal.fire({html:r, width:'96rem'});
            }
            else{
                fd.append('name', $('#name').val());
                fd.append('korobka', $('#korobka').val());
                fd.append('type_rule', $('#type_rule').val());
                fd.append('mosh', $('#mosh').val());
                fd.append('v', $('#v').val());
                fd.append('opisanie', $('#opisanie').val());

                fd.append('setka1', $('#setka1').val());
                fd.append('setka2', $('#setka2').val());
                fd.append('setka3', $('#setka3').val());
                fd.append('zalog', $('#zalog').val());
                fd.append('without', $('#without').val());
                fd.append('complect', $('#complect').val())

                fd.append('preview', preview);
                new_f = [];
                for(var i=0;i<addFiles.length;i++) {
                    fd.append("file_" + i, addFiles[i]);
                    new_f.push("file_" + i);
                }
                fd.append('addFiles', new_f);
                fd.append('classes', all_classes);

                Swal.fire({
                    title: 'Вы уверены, что хотите добавить данные?',
                    confirmButtonText: 'Да',
                    cancelButtonText: 'Нет',
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return peredat(fd).then(response => {
                            if (response.status=='ok') {
                            }
                            return response.rez;
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            text: result.value
                        }).then(()=>{
                            document.location.href = "{{route('auto_all')}}";
                        });
                    }
                })


            }
        });



    });

</script>
@endsection
