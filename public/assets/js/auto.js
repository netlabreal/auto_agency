// Инициализация
document.addEventListener('DOMContentLoaded', () => {
    const objectsBlockElement = document.getElementById('ObjectBlock');
    //objectsBlockElement.html('');
    //alert('qq');
    //alert( 'DOM готов'+objectsBlockElement );
});

// класс, отвечающий за работу с автомобилями
class AutoBlock
{
    // Список всех автомобилей
    autos;
    // Таблица автомобилей
    bootstraptable;
    // Список всех классов автомобилей
    classes;
    // Список всех классов автомобилей
    images;
    // Конструктор
    constructor(element) {
        this.autos = window.all_auto;
        this.images = window.all_files;
        this.classes = window.all_classes;
        this.bootstraptable = this.createAutoTable(document.querySelector('table[data-role="autoTable"]'));
        this.bootstraptable.bootstrapTable('load', this.autos);

        if(element){
            for (const button of document.querySelectorAll('[data-role="addAutoButton"]')) {
                button.addEventListener('click', this.handleAddAutoClick.bind(this));
            }
        }

    }


    // Создание таблицы автомобилей //
    createAutoTable(table)
    {
        const $table = $(table);

        $table.bootstrapTable({
            sortName: 'id',
            columns: [
                {title: 'Номер', field: 'id', sortable: true,},
                {title:'Фото', field:'', formatter:((value, row, index) => {
                        let yk = '';
                        if (row['preview'] == '') {
                            yk = '<img style="width:70px;" src ="/storage/images/no-image.png">';
                        } else {
                            yk = '<img style="width:70px;" src ="/storage/prview/' + row['id'] + '/' + row['preview'] + '">';
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
                        return '<button class="btn btn-sm btn-info" data-action="edit" data-context="edit" style="margin-right: 10px;margin-top:5px;">Редактировать</button>'+
                            '<button class="btn btn-sm btn-danger" data-action="edit" data-context="del" >Удалить</button>';

                    },
                    events: {
                         'click [data-action="edit"]': (event, value, row) => {
                            event.preventDefault();
                            if(event.target.dataset["context"]=="edit"){


                                this.editAuto(row);
                            }
                            else{this.deleteAuto(row);}

                        },
                    },



                }
            ]
        });

        // Убирает лишние рамки
        $table.css('borderBottom', 'none');
        $table.find('thead > tr:first-child > th').css('borderTop', 'none');
        $table.closest('.fixed-table-container').css('border', 'none');

        return $table;
    }



    // Изменение записи авто //
    editAuto(auto) {
        if (!auto) {
            console.log('Error!');
            return;
        }


        let html_all_images = '';
            this.images[auto['id']].forEach(function(entry){
                html_all_images += '<img style="width:140px; margin-bottom: 15px;margin-right: 10px;" src="'+entry+'">';
            });

        // Собираем селект класса авто
        let html_classes = '';
        this.classes.forEach(function(entry){
            if(entry.id == auto['class_auto_id']){
                html_classes += '<option selected value="'+entry['id']+'">'+entry['name']+'</option>';
            }
            else{
                html_classes += '<option value="'+entry['id']+'">'+entry['name']+'</option>';
            }

        });
        let html_korobka = '';
        let korobka = ['автомат', 'коробка', 'вариатор'];
        korobka.forEach(function(item, i, arr) {
            //alert( i + ": " + item + " (массив:" + arr + ")" );
            if(auto['korobka'] == i+1){
                html_korobka += '<option selected value="'+(i+1)+'">'+item+'</option>';
            }else{
                html_korobka += '<option value="'+(i+1)+'">'+item+'</option>';
            }
        });
        let html_preview = '';
        if(!auto['preview']==''){
            html_preview = `<img id="preview_img_real" style="width:140px; padding-bottom: 15px;" src="/storage/prview/`+auto['id']+`/`+auto['preview']+`">`};



        // let html_files = '';
        // if(this.images){
        //     html_files += '<div style="margin-bottom: 10px;"><button class="btn btn-sm btn-danger" data-action="edit" data-context="del" >Удалить все файлы</button></div>';
        //     this.images.foreach(function(entry){
        //         html_files += '<img style="width:140px; height: 90px;margin-bottom: 15px;" src="'+entry+'">';
        //     });
        // }

        let html = `
                    <form class="" method="POST" enctype="multipart/form-data" id="rrform" style="margin-top:15px;font-size: 14px;">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="lab">Наименование</label>
                                    <input name="name" value="`+auto['name']+`" id="autoName" placeholder="Наименование авто" type="text" class="form-control">
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="exampleSelect" class="lab">Класс автомобиля</label>
                                <select name="class_auto_id" id="autoClass" class="form-control">`+
                                    html_classes+
                                `</select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="exampleSelect" class="lab">Коробка передач</label>
                                <select name="korobka" id="korobka" class="form-control">`+
                                    html_korobka+
                                `</select>
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
                                <input name="mosh" value="`+auto['mosh']+`" id="mosh" placeholder="Мощность двигателя" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="lab">Объем двигателя (литра)</label>
                                    <input name="v" step="0.1" value="`+auto['v']+`" id="v" placeholder="Объем двигателя" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="lab">Стоимость (руб)</label>
                                    <input name="cena" value="`+auto['cena']+`" id="cena" placeholder="Стоимость" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="position-relative form-group"><label for="exampleText" class="lab">Описание</label>
                                    <textarea rows="5" name="opisanie" id="opisanie" class="form-control" >`+auto['opisanie']+`</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Картинка превью</h5>
                                            <div style="    text-align: left;">`+
                                                html_preview+
                                                `<input name="file_preview" id="file_preview" type="file" class="form-control-file">
                                            </div>                               
                                     </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Картинки галлереи</h5>
                                            <div style="    text-align: left;">`+html_all_images+
<!--                                            <div style="margin-bottom: 10px;"><button class="btn btn-sm btn-danger" data-action="edit" data-context="del" >Удалить все файлы</button></div>-->
<!--                                                <img style="width:140px; height: 90px;margin-bottom: 15px;" src="\`+auto['preview']+\`"> -->
<!--                                                <img style="width:140px; height: 90px;margin-bottom: 15px;" src="\`+auto['preview']+\`"> -->
<!--                                                <img style="width:140px; height: 90px;margin-bottom: 15px;" src="\`+auto['preview']+\`"> -->
<!--                                                <img style="width:140px; height: 90px;margin-bottom: 15px;" src="\`+auto['preview']+\`"> -->
                                               ` <input name="all_files[]" id="all_files" type="file" class="form-control-file" multiple="true">
                                            </div>                               
                                     </div>
                                </div>

                            </div>`+
                            

                    `</form></div>`;

        var load_files = function(dat, x){
            var $input = dat;
            var fd = new FormData;
            var files_array = [];

            fd.append('id', auto['id']);
            // fd.append('all_files', $input['files']);
            for(var i=0;i<$input['files'].length;i++){
                fd.append("file_"+i,$input['files'][i]);
            }

            // for (var i = 0; i < $input['files'].length; i++) {
            // // $input['files'].forEach(function(entry) {
            //     files_array.push($input['files'][i]);
            // };
            // if(files_array.length>0){
            //     fd.append('files', files_array);
            // }



            return $.ajax({
                headers: {
                    'X-CSRF-TOKEN': x
                },
                url: '/private/auto/uploadFiles',
                type: 'post',
                context: this,
                processData: false,
                contentType: false,
                dataType: "json",
                enctype: 'multipart/form-data',
                data: fd,
                success: function (data) {
                    //$('#preview_img_real').attr('src', data['rez'].sitef);
                    var pp = 0;
                }
            });

        };

        var load_file =function(dat, x){
            var $input = dat;
            var fd = new FormData;

            fd.append('file_preview', $input['files'][0]);
            fd.append('id', auto['id']);

             return $.ajax({
                headers: {
                    'X-CSRF-TOKEN': x
                },
                url: '/private/auto/uploadPreview',
                type: 'post',
                context: this,
                processData: false,
                contentType: false,
                dataType: "json",
                enctype: 'multipart/form-data',
                data: fd,
                success: function (data) {
                    $('#preview_img_real').attr('src', data['rez'].sitef);
                    var pp = 0;
                }
            });
        }
        // let result = swal.fire({
            Swal.fire({

                title: '' + auto['name'],
                html: html,
                confirmButtonText: 'Сохранить',
                showCancelButton: true,
                cancelButtonText: 'Отмена',
                width: '70%',
                onBeforeOpen: () => {
                    const x = document.querySelector('meta[name="csrf-token"]').content;

                    const content = Swal.getContent();
                    const $ = content.querySelector.bind(content);
                    const preview = $('#file_preview');
                    const files = $('#all_files');
                    //Swal.showLoading();
                    preview.addEventListener('change', () => {
                        load_file($('#file_preview'), x);
                    });
                    files.addEventListener('change', ()=>{
                        load_files($('#all_files'), x);
                    });

                },
                preConfirm: () => {
                    let name = $('#autoName').val();
                    let mosh = $('#mosh').val();
                    let v = $('#v').val();
                    let cena = $('#cena').val();
                    let opisanie = $('#opisanie').val();
                    let error = '';
                    if(!name){
                        error += '<li>Наименование не должно быть пустым!</li>';
                    }
                    if(!mosh || isNaN(mosh)){
                        error += '<li>Мощность двигателя не должна быть пустым!</li>';
                    }
                    if(!v || isNaN(v)){
                        error += '<li>Объем двигателя не должен быть пустым!</li>';
                    }
                    if(!cena || isNaN(cena)){
                        error += '<li>Цена не должна быть пустым!</li>';
                    }
                    if(!opisanie){
                        error += '<li>Описание не должно быть пустым!</li>';
                    }

                    if(error!=''){
                        Swal.showValidationMessage('<ul>'+error+'</ul>');
                    }
                    let response;




                    try {
                        response = $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url:'/private/auto/edit/'+auto['id'],
                            type:'post',
                            context: this,
                            processData: false,
                            contentType: false,
                            dataType: "json",
                            enctype: 'multipart/form-data',
                            data: new FormData($('#rrform')[0]),
                            success: function (data) {
                                if(data['status'] == 'ok'){
                                    // Обновление глобального массива авто
                                    this.autos = this.autos.map(real => {
                                        if (real.id === auto['id']) {
                                            return data['auto'];
                                        } else {
                                            return real;
                                        }
                                        // *********************************** //
                                    });
                                    this.updateAuto();
                                    let y =Swal.fire(
                                        ''+data['rez']
                                    )

                                }
                            }
                        });
                    } catch (xhr) {
                        swal.showValidationMessage((xhr));
                    }


                }

            }).then((result) => {
                if (result.value) {
                    let yu = 1;
                }
            });
        };

    // Удаление записи авто
    deleteAuto(auto)
    {
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
                let response;
                try{
                    response = $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        context: this,
                        url: '/private/auto/delete',
                        data: {'id': auto['id']},
                        success: function (data) {
                            if(data['status']=='ok'){
                                 this.autos.map(real=>{
                                    if(real['id'] == auto['id']){
                                       let index = this.autos.indexOf(real);
                                        this.autos.splice(index, 1);
                                    }
                                    //else{return real;}
                                });
                                this.updateAuto();

                                // gg = $("tr").find("[rid='" + data['id'] + "']");
                                // gg.parent().remove();
                                // Swal.fire(
                                //     ''+data['rez']
                                // );

                            }
                        }
                    });

                } catch (xhr) {
                    swal.showValidationMessage((xhr));
                }

            }
        }).then((result) => {
            if (result.value) {

            }
        });

    }
    // Обновление таблицы автомобилей //
    updateAuto()
    {
        this.bootstraptable.bootstrapTable('load', this.autos);
    }

    handleAddAutoClick(event)
    {
        event.preventDefault();
        alert("YES");
    }

}
// ------------------------------------------


k = new AutoBlock($('table_data'));
//console.log(k.autos);


