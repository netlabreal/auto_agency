@extends('site.layout')
@section('meta')
    <title>Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.</title>
    <link rel="stylesheet" href={{asset('assets/css/bootstrap-datetimepicker.min.css')}}>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
@endsection

@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)

                <li><a class="lab-nav-link" href="/{{$item['alias']}}">{{$item['title']}}</a></li>

        @endforeach
    @endif
@endsection



@section('carusel')
    <div class="owl-carousel owl-theme owl-loaded owl-drag">
        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1529px;"><div class="owl-item active" style="width: 1519px; margin-right: 10px;"><div class="container">
                        <div class="container">
                            <div class="jumbotron-classic-content" style="padding-top: 27px;">
                                <div class="wow-outer" style="color: white;">
                                    <div class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">заказ автомобиля</div>
                                </div>

                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="/">Главная</a></li>
                                    <li><i class="zmdi zmdi-chevron-right"></i></li>
                                    <li class="active">Заказ автомобиля</li>
                                </ul>

                            </div>
                        </div>
                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
@endsection





@section('content')
    <section class="zakaz" style="">
        <div class="row" style="margin-right: 0px!important;">
            <div class="col-xl-2 col-lg-2 col-md-2">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form action="" style="margin-top:45px;padding: 15px;">

                    <label style="font-family: txt2; text-transform: uppercase; font-size: 16px; font-weight: normal;">Автомобиль</label>
                    <select name="auto_id" class="form-control" id="auto" style="margin-bottom: 10px;">
                        <option selected value="0">Выберите автомобиль</option>
                        @foreach($auto as $a)
                            @if($param == $a['id'])
                                <option selected value="{{$a['id']}}">{{$a['name']}}</option>
                            @else
                                <option value="{{$a['id']}}">{{$a['name']}}</option>
                            @endif
                        @endforeach
                    </select>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="inputDate" style="font-family: txt2; text-transform: uppercase;font-weight: normal;">Период С:</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input id="datn" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="inputDate" style="font-family: txt2; text-transform: uppercase;font-weight: normal;">Период ПО:</label>
                            <div class='input-group date' id='datetimepicker2'>
                                <input id="datk" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>


                    <input type="text" id="fio" name="fio" value="" size="100" class="el" aria-required="true" aria-invalid="false" placeholder="ФИО">
                    <input type="text" id="tel" name="tel" type="tel" class="el" aria-required="true" aria-invalid="false" placeholder="ТЕЛЕФОН">
                    <input type="text" id="email" name="email" type="email" class="el" aria-required="true" aria-invalid="false" placeholder="EMAIL">
                    <textarea  id="prim" name="prim" cols="40" rows="3" class="el" aria-invalid="false" placeholder="Примечание"></textarea>

                    <input id="oformit" type="button" value="Оформить заказ" class="el-submit">

                    <div class="subscribe">
                        <input type="checkbox" id="soglasie"><label for="soglasie" style="font-size: 10px;display: inline;">Нажимая кнопку «Оформить заказ», я даю свое согласие на обработку моих
                    персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей,
                        определенных в <a id="lic"> Политике конфиденциальности</a></label>
                    </div>
                </form>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" style="margin-top: 60px; padding:25px;">
                <span>Если по каким-либо причинам вы не можете заполнить на сайте форму заказа, <a href="/storage/anketa-e-mail.doc">скачайте анкету</a>
                    (формат doc), заполните и отправьте ее по электронной почте</span>

                <div style="padding-top: 20px; cursor: pointer;">

                    <img src="{{asset('assets/img/Word.png')}}" style="width:30px">
                    <a href="/storage/dogovor.doc">Cкачать договор (для ознакомления)</a>
                </div>
                <div style="padding-top: 20px;cursor: pointer;">
                    <img src="{{asset('assets/img/Word.png')}}" style="width:30px">
                    <a href="/storage/anketa-e-mail.doc">Cкачать анкету</a>
                </div>


            </div>
            <div class="col-xl-1 col-lg-1 col-md-1">
            </div>
        </div>

    </section>

@endsection

@section('js')

<script type="text/javascript">
    var errors = [];

    // Проверка Email
    function validateEmail(email) {
        var pattern  = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return pattern .test(email);
    }
    // Ajax передача данных
    function peredat(fd){
        let res;
        res = $.ajax({
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            url: '{{route('zakaz')}}',
            type: 'post',
            processData: false,
            contentType: false,
            dataType: "json",
            data: fd,
            success:function (data) {
            }
        });
        return res;
    }

    $(document).ready(function() {
        $('#datetimepicker1').datetimepicker({ locale: 'ru'});
        $('#datetimepicker2').datetimepicker({ locale: 'ru'});

        //
        $('#lic').click(function(){
            rr = '<section class="article">\n' +
                '    <article>\n' +
                '        <h2 style="font-family: txt5;font-weight: bold;">Политика конфиденциальности</h2>\n' +
                '<ul style="list-style-type: none; padding: 12px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="margin-top: 0.49cm; margin-bottom: 0cm; font-weight: bold;font-family: txt5;font-size: 18px; padding-top: 10px; padding-bottom: 10px;" align="JUSTIFY">Общие положения</p>\n' +
                '<ul style="list-style-type: none; padding: 12px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY"><b>1.1.</b> Настоящая Политика конфиденциальности определяет общие условия сбора и&nbsp;обработки персональных данных пользователей на сайте http://business-partner-prim.ru</p>\n' +
                '</li>\n' +
                '<li style="list-style-type: none; padding: 12px 18px 0 0;">\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY"><b>1.2.</b> Оператор Сайта осуществляет обработку следующих персональных данных:</p>\n' +
                '<ul style="list-style-type: none; padding: 12px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY">полное имя;</p>\n' +
                '</li>\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY">адрес электронной почты;</p>\n' +
                '</li>\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY">номер мобильного телефона</p>\n' +
                '</li>\n' +
                '</ul>\n' +
                '</li>\n' +
                '</ul>\n' +
                '</li>\n' +
                '<li>\n' +
                '<p style="margin-bottom: 0cm;font-weight: bold;font-family: txt5;font-size: 18px; padding-top: 10px; padding-bottom: 10px;" align="JUSTIFY">Цели обработки персональных данных</p>\n' +
                '<ul style="list-style-type: none; padding: 12px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY"><b>2.1.</b> Оператор обрабатывает персональные данные пользователей с&nbsp;целью:</p>\n' +
                '<ul style="list-style-type: none; padding: 12px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY">предоставления услуг;</p>\n' +
                '</li>\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY">предоставления доступа к&nbsp;информации, содержащейся в&nbsp; информационной системе Сайта.</p>\n' +
                '</li>\n' +
                '</ul>\n' +
                '</li>\n' +
                '</ul>\n' +
                '</li>\n' +
                '<li>\n' +
                '<p style="margin-bottom: 0cm;font-weight: bold;font-family: txt5;font-size: 18px; padding-top: 10px; padding-bottom: 10px;" align="JUSTIFY">Доступ третьих лиц к&nbsp;персональным данным</p>\n' +
                '<ul style="list-style-type: none; padding: 12px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY"><b>3.1.</b> Оператор Сайта может передать персональные данные пользователя третьей стороне в&nbsp;следующих случаях:</p>\n' +
                '<ul style="list-style-type: none; padding: 12px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY">если пользователь дал согласие на&nbsp;осуществление передачи своих данных третьей стороне;</p>\n' +
                '</li>\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY">если передача необходима в&nbsp;рамках установленной законодательством&nbsp;РФ процедуры.</p>\n' +
                '</li>\n' +
                '</ul>\n' +
                '</li>\n' +
                '</ul>\n' +
                '</li>\n' +
                '<li>\n' +
                '<p style="margin-bottom: 0cm;font-weight: bold;font-family: txt5;font-size: 18px; padding-top: 10px; padding-bottom: 10px;" align="JUSTIFY">Обязанности оператора Сайта по&nbsp;защите персональных данных</p>\n' +
                '<ul style="list-style-type: none; padding: 0px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY"><b>4.1.</b> Оператор Сайта обязан принимать необходимые организационные и&nbsp;технические меры для обеспечения конфиденциальности, целостности и&nbsp;доступности персональных данных пользователей.</p>\n' +
                '</li>\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY"><b>4.2.</b> Оператор Сайта обязан своевременно производить оценку соответствия Сайта требованиям законодательства&nbsp;РФ в&nbsp;области защиты информации.</p>\n' +
                '</li>\n' +
                '</ul>\n' +
                '</li>\n' +
                '<li>\n' +

                '<p style="margin-bottom: 0cm;font-weight: bold;   font-family: txt5;font-size: 18px; padding-top: 10px; padding-bottom: 10px;" align="JUSTIFY">Обратная связь</p>\n' +
                '<ul style="list-style-type: none; padding: 0px 18px 0 0;">\n' +
                '<li>\n' +
                '<p style="font-family: txt4;margin-bottom: 0cm;" align="JUSTIFY"><b>5.1.</b> Все предложения и&nbsp;вопросы по&nbsp;использованию Сайта следует направлять в&nbsp;службу поддержки по&nbsp;адресу электронной почты mail@business-partner-prim.ru</p>\n' +
                '</li>\n' +
                '</ul>\n' +
                '</li>\n' +
                '</ul>\n' +
                '    </article>\n' +
                '    \n' +
                '\n' +
                '</section>';
            Swal.fire({html:rr, width:'60%'});
        });

        $('#oformit').click(function(){
            errors = [];
            // Проверка

            if($('#fio').val()==''){errors.push('Необходимо внести ФИО!')}
            if($('#auto').val()==0){errors.push('Необходимо внести автомобиль!')}
            if($('#datn').val()==''){errors.push('Необходимо внести дату и время начала!')}
            if($('#datk').val()==''){errors.push('Необходимо внести дату и время окончания!')}
            if($('#tel').val()==''){errors.push('Необходимо внести телефон!')}
            if(!validateEmail($('#email').val())){errors.push('Необходимо внести Email!')}
            if(!$('#soglasie').prop('checked')){errors.push('Необходимо указать, что вы согласны на обработку персональных данных!')}
            // ***************************//
            let text = $('#datn').val();
            var date1 = new Date(text.replace(/(\d+).(\d+).(\d+)/, '$3/$2/$1'));
            text = $('#datk').val();
            var date2 = new Date(text.replace(/(\d+).(\d+).(\d+)/, '$3/$2/$1'));
            let razn = date2-date1;
            if(razn<=0){errors.push('Дата конца должна быть больше даты начала!')}
            // ***************************//

            if((errors.length)>0){
                let r = '<ul>';
                for(var k = 0; k < errors.length; k++) {
                    r += '<li style="font-size: 16px; list-style: none;">'+errors[k]+'</li>';
                }
                r += '</ul>';
                Swal.fire({html:r, width:'40%'});
            }
            else{
                var fd = new FormData;
                fd.append('fio', $('#fio').val());
                fd.append('auto_id', $('#auto').val());
                fd.append('datn', $('#datn').val());
                fd.append('datk', $('#datk').val());

                fd.append('tel', $('#tel').val());
                fd.append('email', $('#email').val());
                fd.append('prim', $('#prim').val());

                Swal.fire({
                    title: 'Вы уверены, что хотите оформить автомобиль?',
                    confirmButtonText: 'Да',
                    cancelButtonText: 'Нет',
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return peredat(fd).then(response => {
                            return response;
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.value) {
                        if(result.value.status = 'ok'){
                            Swal.fire({text: result.value.rez}).then((result)=>{document.location.href = "{{route('home')}}";});
                        }
                        else{
                            Swal.fire({text: result.value.rez});
                        }
                    }
                })

            }


        });
    });
</script>
@endsection