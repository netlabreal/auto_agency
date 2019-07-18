@extends('admin.layout')

@section('content')
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}
    <div class="col-md-12" id="ObjectBlock">
                    <div class="page-header">
                        <h1> <small>Автомобили</small></h1>
                    </div>

                    <div class="card mb-3 widget-content" style="margin-top: 15px; padding:15px; margin-bottom: 15px;">
                        <div class="widget-content-wrapper">
                            <button class="btn btn-info" data-role="addAutoButton" id="open_new">Добавить</button>
                        </div>
                    </div>


                    <div class="mb-3 widget-content">
                        <div class="widget-content-wrapper">

                            <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover" data-role="autoTable">
                                </table>
                            </div>

                        </div>
                    </div>



    </div>
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}
@endsection
<!--++++++++++++++++++++++++++++++++++++++++++-->
@section('js')
<script type="text/javascript">
    var all_auto = @json($data);
    var tabl;

    $(document).ready(function() {
        tabl = createAutoTable(document.querySelector('table[data-role="autoTable"]'));

        $('#open_new').click(function(){
            document.location.href = "{{route('auto_add')}}";
        });


        // Создание таблицы автомобилей //
        function createAutoTable(table)
        {
            const $table = $(table);

            $table.bootstrapTable({
                sortName: 'id',
                search:true,
                searchText:'',
                columns: [
                    {title: 'Номер', field: 'id', sortable: true,},
                    {title:'Фото', field:'', formatter:((value, row, index) => {
                            let yk = '';
                            if (row['preview'] == '') {
                                yk = '<img style="width:70px;" src ="/storage/images/no-image.png">';
                            } else {
                                yk = '<img style="width:70px;" src ="' + row['preview'] + '">';
                            }
                            return yk;
                        })},
                    {title: 'Наименование', field: 'name',sortable: true,},
                    {title: 'Описание', field: 'opisanie',},
                    {
                        title: '',
                        field: 'external_id',
                        align: 'center',
                        formatter: (value, row, index) => {
                            return `<button class="btn btn-sm btn-info" data-action="edit" data-context="edit" style="margin-right: 10px;margin-top:5px;margin-bottom: 10px;" onclick="location.href='/private/automobiles/edit/`+row['id']+`'" >Редактировать</button>`+
                                `<button class="btn btn-sm btn-success" data-action="copy" data-context="copy" onclick="location.href='/private/automobiles/add?base=`+row['id']+`'">Копировать</button>`+
                                '<button class="btn btn-sm btn-danger" data-action="edit" data-context="del" style="margin-top:10px;">Удалить</button>';

                        },
                        events: {
                            'click [data-action="edit"]': (event, value, row) => {
                                event.preventDefault();
                                if(event.target.dataset["context"]=="edit"){
                                }
                                else{deleteAuto(row);}
                            },
                            'click [data-action="copy"]': (event, value, row) => {
                               //
                            }
                        },



                    }
                ],
                data: all_auto,
                rowAttributes: function(row, index) {
                    return {
                        'name': index + 1
                    };
                }
            });

            // Убирает лишние рамки
            $table.css('borderBottom', 'none');
            $table.find('thead > tr:first-child > th').css('borderTop', 'none');
            $table.closest('.fixed-table-container').css('border', 'none');

            return $table;
        }


        function deleteAuto(auto){
            Swal.fire({
                title: 'Вы уверены, что хотите удалить данный объект?',
                text: "",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:'Отмена',
                confirmButtonText: 'Да, удалить!',
                preConfirm: ()=>{

                }
            }).then((result) => {
                if (result.value) {
                    all_auto.map(real=>{
                        if(real['id'] == auto['id']){
                            let index = all_auto.indexOf(real);
                            all_auto.splice(index, 1);
                            server_delete(auto['id']);
                            updateAuto();
                        }
                    });
                }
            });
        }

        function updateAuto()
        {
            tabl.bootstrapTable('load', all_auto);
        }

        function server_delete(rid){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                url: '{{route('delete_auto') }}',
                type: 'post',
                data: {'id': rid},
                success: function (data) {
                    if (data['status'] == 'ok') {
                        Swal.fire({text:data['rez']}).then((result) => {
                            if (result.value) {
                                //document.location.href = "{{route('auto_all')}}";
                            }
                        });
                    } else {
                        Swal.fire('Произошла ошибка!');
                    }
                },
                error: function () {
                    Swal.fire('Произошла ошибка!');
                }
            });

        };


    });
</script>
@endsection
</body>
</html>
