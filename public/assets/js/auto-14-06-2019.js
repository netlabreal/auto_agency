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
    bootstraptable;
    classes;


    constructor(element) {
        this.autos = window.all_auto;
        this.classes = window.all_classes;
        this.bootstraptable = this.createAutoTable(document.querySelector('table[data-role="autoTable"]'));
        this.bootstraptable.bootstrapTable('load', this.autos);

        if(element){
            for (const button of document.querySelectorAll('[data-role="addAutoButton"]')) {
                button.addEventListener('click', this.handleAddAutoClick.bind(this));
            }
        }

    }


    createAutoTable(table)
    {
        const $table = $(table);

        // Создаёт подвал таблицы
        // $table.append(`
        //     <tfoot>
        //         <tr>
        //             <td colspan="4" align="right">Итого:</td>
        //             <td align="right" data-value="nominalSum"></td>
        //             <td align="right" data-value="realSum"></td>
        //             <td colspan="3"></td>
        //         </tr>
        //         <tr>
        //             <td colspan="4" align="right">Осталось оплатить:</td>
        //             <td align="right" data-value="sumToPay"></td>
        //             <td colspan="4"></td>
        //         </tr>
        //     </tfoot>
        //             `);
        $table.bootstrapTable({
            sortName: 'id',
            columns: [
                {title: 'Номер', field: 'id', sortable: true,},
                {title:'Фото', field:'', formatter:((value, row, index) => {
                    // let m_image = '/storage/images/'+row['id']+'/' +row['preview'];
                    // var img = new Image(); img.src = m_image;
                    // img.onerror = function(){alert('1'); m_image = "/storage/images/no-image.png"};

                    return '<img style="width:70px;" src ="'+row['preview']+'">'})},
                {title: 'Наименование', field: 'name',sortable: true,},
                {title: 'Описание', field: 'opisanie',},
                {
                    title: '',
                    field: 'external_id',
                    align: 'right',
                    formatter: (value, row, index) => {
                        return '<button class="btn btn-sm btn-info" data-action="edit" style="margin-right: 10px;">Редактировать</button>'+
                            '<button class="btn btn-sm btn-danger" data-action="del">Удалить</button>';

                    },
                    events: {
                        'click [data-action="edit"]': (event, value, row) => {
                            event.preventDefault();
                            this.editAuto(row);
                            //alert('edit');
                            //this.cancelPayment(row.id);
                        }
                    }
                }
            ]
        });

        // Убирает лишние рамки
        $table.css('borderBottom', 'none');
        $table.find('thead > tr:first-child > th').css('borderTop', 'none');
        $table.closest('.fixed-table-container').css('border', 'none');

        return $table;
    }


    editAuto(auto) {
        if (!auto) {
            console.log('Error!');
            return;
        }

        let html_classes = '';
        this.classes.forEach(function(entry){
            if(entry.id == auto['class_auto_id']){
                html_classes += '<option selected value="'+entry['id']+'">'+entry['name']+'</option>';
            }
            else{
                html_classes += '<option value="'+entry['id']+'">'+entry['name']+'</option>';
            }

        });

        // for (const [id, name] of this.classes) {
        //     html_classes += `<option value="${textToHTML(key)}">${textToHTML(name)}</option>`;
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
                                    <textarea rows="3" name="opisanie" id="opisanie" class="form-control" >`+auto['opisanie']+`</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group"><label for="exampleFile" class="lab">Загрузите фото авто</label>
                                    <input name="files[]" id="all_files" type="file" class="form-control-file" multiple="true">
                                </div>

                        </div>`+

                    `</form></div>`;

        // let result = swal.fire({
            Swal.fire({
                title: '' + auto['name'],
                html: html,
                confirmButtonText: 'Сохранить',
                showCancelButton: true,
                cancelButtonText: 'Отмена',
                width: '70%',
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
                    //return response.payment;
                    console.log(response.responseJSON);

                    //return response;
                }


            }).then((result) => {
                let ff =1;
                if(result.value){
                    console.log(result);

                }
            });
        };

        // this.autos = this.autos.map(real => {
        //     if (real.id === auto['id']) {
        //         return result.value;
        //     } else {
        //         return real;
        //     }
        // });
        //this.updatePaymentsTable();
        //if(result){this.updateAuto();}



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
//k.createAutoTable(document.querySelector('table[data-role="autoTable"]'));
console.log(k.autos);


