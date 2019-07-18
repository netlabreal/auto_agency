@extends('admin.layout')

@section('content')

<div class="col-md-12">
    <div class=" " >
        <div class="card-header" style="font-size: 21px; font-family: txt4;">{{$news['name']}}
            <div class="btn-actions-pane-right">
                <div role="group" class="btn-group-sm btn-group">

                </div>
            </div>
        </div>

        <div class="card-body" >
            <div class="" action="{{route('news_edit', array("id"=>$news['id']))}}" method="POST" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="col-md-12">
                        <div class="panel panel-default">

                        <div class="panel-heading">Основное</div>

                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="lab">Заголовок новости</label>
                                    <input name="name" value="{{$news['name']}}" id="name" placeholder="Заголовок новости" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="position-relative form-group"><label for="exampleText" class="lab">Текст новости</label>
                                    <textarea rows="10" name="opisanie" id="opisanie" class="form-control" >{{$news['opisanie']}}</textarea>
                                </div>
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

</div>
@endsection

@section('js')
    <script>
        var news = @json($news);

        // Ajax функция отправки данных
        function peredat(fd){
            let res;
            res = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                url: '{{route('news_edit', array("id"=>$news['id']))}}',
                type: 'post',
                processData: false,
                contentType: false,
                dataType: "json",
                enctype: 'multipart/form-data',
                data: fd,
                success:function (data) {

                }
            });
            return res;
        }

        $(document).ready(function() {
            //******************************************
            var formData = new FormData();

            $('#save').click(function(){
                var errors = [];
                var fd = new FormData;

                // Проверка заполненности данными
                if($('#name').val()==''){errors.push('Необходимо внести заголовок новости!')}
                if($('#opisanie').val()==''){errors.push('Необходимо внести новость!')}

                if((errors.length)>0){
                    $('#m_title').html('');
                    let r = '<ul>';
                    for(var k = 0; k < errors.length; k++) {
                        r += '<li style="font-size: 16px; list-style: none;">'+errors[k]+'</li>';
                    }
                    r += '</ul>';
                    Swal.fire({html:r, width:'40%'});
                }
                else{
                    fd.append('name', $('#name').val());
                    fd.append('opisanie', $('#opisanie').val());
                    fd.append('id', {{$news['id']}});

                    Swal.fire({
                        title: 'Подтверждение обновления данных',
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
                                document.location.href = "{{route('news')}}";
                            });
                        }
                    })


                }

            });

        });

    </script>
@endsection