@extends('layouts.admin_layout')

@section('title')
    <div class="page-title-subheading">Автомобили </div>
@endsection


@section('content')


    <div class="col-md-12" id="ObjectBlock">
        <div class="main-card mb-3 card" id="table_data">
            <div class="card-header">Автомобили
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">

                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" data-role="autoTable">
                    </table>
                </div>

            </div>
        </div>




        <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
                <button class="btn btn-info" data-role="addAutoButton" id="open_new">Добавить</button>
            </div>
        </div>


    </div>

@endsection


@section('js')
    <script>
        $(document).ready(function() {
            // Очищение таблицы
            function initTable(table){
                $r =
                    `<div class="main-card mb-3 card" id="table_data">`+
                    `<div class="card-header">Автомобили`+
                    `<div class="btn-actions-pane-right">`+
                    `<div role="group" class="btn-group-sm btn-group">`+
                    `</div>`+
                    `</div>`+
                    `</div></div>`;
                table.html($r);
            }

            function loadtable(table, params={}){
                //initTable(table);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/private/auto/all',
                    data: {},
                    success: function (data) {
                        if(data['status'] == 'ok'){
                            let arr = data['rez'];
                            var h = ` <div class="table-responsive">`+
                                `<table class="align-middle mb-0 table table-borderless table-striped table-hover">`+
                                `<thead>`+
                                `<tr>`+
                                `<th class="text-center">Id</th>`+
                                `<th class="text-center">Фото</th>`+
                                `<th class="text-center">Наименование</th>`+
                                `<th class="text-center">Описание</th>`+
                                `<th class="text-center">Действия</th>`+
                                `</tr>`+
                                `</thead>`+
                                `<tbody>`;
                            for (var i = 0; i < arr.length; i++) {
                                if(arr[i].preview=="1"){preview="/storage/images/no-image.png";}else{
                                    preview=`/storage/images/`+arr[i].id+`/`+arr[i].preview;
                                }
                                h += ` <tr data-id="`+arr[i].id+`">`+
                                    `<td class="text-center text-muted" rid="`+arr[i].id+`">`+arr[i].id+`</td>`+
                                    `<td class="text-center text-muted"><img src="`+preview+`" style="width: 50px;"></td>`+
                                    `<td class="text-center text-muted">`+arr[i].name+`</td>`+
                                    `<td class="text-center text-muted">`+arr[i].opisanie+`</td>`+
                                    `<td class="text-center">`+
                                    `<button type="button" data-role="deleteAutoButton" data-id="`+arr[i].id+`" id="del1" class="btn btn-danger btn-sm" style="margin-right: 5px;">Удалить</button>`+
                                    `<button type="button" data-id="`+arr[i].id+`" id="edit_auto" class="btn btn-primary btn-sm" >Редактировать</button>`+
                                    `</td>`+
                                    `</tr>`;
                            }
                            h += `</tbody></table>`;
                        }
                        $('#table_data').append(h);
                    },
                });



            }


            //loadtable($('#ObjectBlock'));
            //loadtable($('#table_data'));

        });
    </script>
    <script>
        var all_auto = @json($all);
        var all_classes = @json($classes);
        var all_files = @json($kobject);

    </script>

    <script type="text/javascript" src={{asset('assets/js/bootstrap-table.min.js')}}></script>
    <script type="text/javascript" src={{asset('assets/js/auto.js?v=211')}}></script>
    <script type="text/javascript" src={{asset('assets/js/bootstrap-filestyle.min.js')}}></script>

    <script type="text/javascript" src={{asset('assets/js/sweetalert2.all.min.js')}}></script>

@endsection