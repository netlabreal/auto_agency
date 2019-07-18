@extends('admin.layout')

@section('content')

<div class="col-md-12">
    <div class=" " >
        <div class="card-header" style="font-size: 21px; font-family: txt4;">{{$dop['name']}}
            <div class="btn-actions-pane-right">
                <div role="group" class="btn-group-sm btn-group">

                </div>
            </div>
        </div>

        <div class="card-body" >
            <div class="" action="{{route('dop_uslugy_edit', array("id"=>$dop['id']))}}" method="POST" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="col-md-12">
                        <div class="panel panel-default">

                        <div class="panel-heading">Основное</div>

                        <div class="panel-body">
                            <div class="col-md-8">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="lab">Наименование</label>
                                    <input name="name" value="{{$dop['name']}}" id="name" placeholder="Наименование авто" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="lab">Стоимость</label>
                                    <input name="cena" value="{{$dop['cena']}}" id="cena" placeholder="Стоимость" type="number" class="form-control">
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
        var dop = @json($dop);

        function peredat(fd){
            let res;
            res = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                url: '{{route('dop_uslugy_edit', array("id"=>$dop['id']))}}',
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
                if($('#name').val()==''){errors.push('Необходимо внести название!')}
                if($('#cena').val()==''){errors.push('Необходимо внести стоимость!')}

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
                    fd.append('cena', $('#cena').val());
                    fd.append('id', {{$dop['id']}});

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
                                document.location.href = "{{route('dop_uslugy')}}";
                            });
                        }
                    })


                }

            });

        });

    </script>
@endsection