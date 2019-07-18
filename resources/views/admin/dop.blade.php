@extends('admin.layout')

@section('content')
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}
    <div class="col-md-12" id="ObjectBlock">
        <div class="page-header">
            <h1> <small>Дополнительные услуги</small></h1>
        </div>

        <div class="card mb-3 widget-content" style="margin-top: 15px; padding:15px; margin-bottom: 15px;">
            <div class="widget-content-wrapper">
                <button class="btn btn-info" data-role="addAutoButton" id="open_new">Добавить</button>
            </div>
        </div>


        <div class="mb-3 widget-content">
            <div class="widget-content-wrapper">

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" data-role="dopTable">
                    </table>
                </div>

            </div>
        </div>



    </div>
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}
@endsection

@section('js')
    <script type="text/javascript">
        var dop = @json($dop);
        var tabl;

        // Создание таблицы дополнительных услуг //
        function createDopTable(table)
        {
            const $table = $(table);

            $table.bootstrapTable({
                sortName: 'id',
                search:true,
                searchText:'',
                columns: [
                    {title: 'Номер', field: 'id', sortable: true,},
                    {title: 'Услуга', field: 'name',sortable: true,},
                    {title: 'Стоимость', field: 'cena',},
                    {
                        title: '',
                        field: 'external_id',
                        align: 'center',
                        formatter: (value, row, index) => {
                            return `<button class="btn btn-sm btn-info" data-action="edit" data-context="edit" style="margin-right: 10px;margin-top:5px;margin-bottom: 10px;" onclick="location.href='/private/dopolnytelno/edit/`+row['id']+`'" >Редактировать</button>`+
                                '<button class="btn btn-sm btn-danger" data-action="edit" data-context="del" >Удалить</button>';

                        },
                        events: {
                            'click [data-action="edit"]': (event, value, row) => {
                                event.preventDefault();
                                if(event.target.dataset["context"]=="edit"){
                                }
                                else{deleteDop(row);}
                            },
                        },



                    }
                ],
                data: dop,
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

        function server_delete(rid){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                url: '{{route('dop_delete') }}',
                type: 'post',
                data: {'id': rid},
                success: function (data) {
                    if (data['status'] == 'ok') {
                        Swal.fire({text:data['rez']}).then((result) => {
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

        function updateDop()
        {
            tabl.bootstrapTable('load', dop);
        }

        function deleteDop(d){
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
                    dop.map(real=>{
                        if(real['id'] == d['id']){
                            let index = dop.indexOf(real);
                            dop.splice(index, 1);
                            server_delete(d['id']);
                            updateDop();
                        }
                    });
                }
            });
        }



        $(document).ready(function() {
            tabl = createDopTable(document.querySelector('table[data-role="dopTable"]'));

            $('#open_new').click(function(){
                document.location.href = "{{route('dop_uslugy_add')}}";
            });

        });

    </script>
@endsection
