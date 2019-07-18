@extends('admin.layout')

@section('content')
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}
    <div class="col-md-12" id="ObjectBlock">
        <div class="page-header">
            <h1> <small>Новости</small></h1>
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
        var news = @json($news);
        var tabl;

        // Создание таблицы дополнительных услуг //
        function createNewsTable(table)
        {
            const $table = $(table);

            $table.bootstrapTable({
                sortName: 'id',
                search:true,
                searchText:'',
                columns: [
                    {title: 'Номер', field: 'id', sortable: true,},
                    {title: 'Наименование', field: 'name',sortable: true,},
                    {title: 'Текст', field: 'opisanie',sortable: false,},
                    {
                        title: '',
                        field: 'external_id',
                        align: 'center',
                        formatter: (value, row, index) => {
                            return `<button class="btn btn-sm btn-info" data-action="edit" data-context="edit" style="margin-right: 10px;margin-top:5px;margin-bottom: 10px;" onclick="location.href='/private/news/edit/`+row['id']+`'" >Редактировать</button>`+
                                '<button class="btn btn-sm btn-danger" data-action="edit" data-context="del" >Удалить</button>';

                        },
                        events: {
                            'click [data-action="edit"]': (event, value, row) => {
                                event.preventDefault();
                                if(event.target.dataset["context"]=="edit"){
                                }
                                else{deleteNews(row);}
                            },
                        },
                    }
                ],
                data: news,
            });

            // Убирает лишние рамки
            $table.css('borderBottom', 'none');
            $table.find('thead > tr:first-child > th').css('borderTop', 'none');
            $table.closest('.fixed-table-container').css('border', 'none');

            return $table;
        }
        // Удаление
        function server_delete(rid){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                url: '{{route('news_delete') }}',
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
        // Обновление
        function updateNews()
        {
            tabl.bootstrapTable('load', news);
        }
        // Удаление
        function deleteNews(d){
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
                    news.map(real=>{
                        if(real['id'] == d['id']){
                            let index = news.indexOf(real);
                            news.splice(index, 1);
                            server_delete(d['id']);
                            updateNews();
                        }
                    });
                }
            });
        }



        $(document).ready(function() {
            tabl = createNewsTable(document.querySelector('table[data-role="dopTable"]'));

            $('#open_new').click(function(){
                document.location.href = "{{route('news_add')}}";
            });

        });

    </script>
@endsection
