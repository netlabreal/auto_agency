@extends('site.layout')
@section('meta')
    <title>Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.</title>
@endsection

@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)
            @if($k==3)
                <li class=""><a class="lab-nav-link active" href="/{{$item['alias']}}">{{$item['title']}}</a></li>
            @else
                <li><a class="lab-nav-link" href="/{{$item['alias']}}">{{$item['title']}}</a></li>
            @endif
        @endforeach
    @endif
@endsection



@section('carusel')
    <div class="owl-carousel owl-theme owl-loaded owl-drag">
        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1529px;"><div class="owl-item active" style="width: 1519px; margin-right: 10px;"><div class="container">
                        <div class="container">
                            <div class="jumbotron-classic-content" style="padding-top: 27px;">
                                <div class="wow-outer" style="color: white;">
                                    <div class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">услуги</div>
                                </div>

                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="/">Главная</a></li>
                                    <li><i class="zmdi zmdi-chevron-right"></i></li>
                                    <li class="active">Услуги компании</li>
                                </ul>




                            </div>
                        </div>
                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
@endsection


@section('content')
    <section class="about_us">
        <!-- ABOUT US -->
        <div class="container">
            <div class="box-form-title">
                <div class="box-form-decor-wrap">

                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 rdopp">
                <div>
                    <p>
                        Компания «Бизнес-Партнер» предлагает обширный спектр услуг:
                    </p>
                </div>
            </div>



            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 usl_r">
                <span class="r_span" id="prokat">ПРОКАТ автомобиля</span>
                <p class="thumbnail-ruby-t">

                    <img class="thumbnail-ruby" src="{{asset('assets/img/arend-real.jpg')}}" alt="" width="300" height="300" style="float: left; margin: 0 17px 17px 0;">
                    Краткосрочная аренда подразумевает под собой прокат автомобиля без водителя на срок от 1 суток до 3 месяцев. Данная услуга обычно используется в случае:
                </p>
                <ul style="list-style: none">
                    <li>Планового технического обслуживания или ремонта собственного автомобиля;</li>
                    <li>Частых и разноплановых поездок (служебная командировка, отдых и т.д.);</li>
                    <li>Потребности в специализированном автомобиле с необходимыми характеристиками;</li>
                    <li>Предварительного тестирования выбранной модели перед покупкой;</li>
                </ul>
                <p>
                    Краткосрочная аренда выгодна, поскольку позволяет экономить средства на почасовой оплате такси и перевозчиков. Преимущества аренды в «Business-Partner» заключаются в гибкой тарифной системе и разумных ценах:
                </p>
                <ul>
                    <li>Тарифы снижаются уже&nbsp;после трех суток аренды;</li>
                    <li>Цены включают в&nbsp;себя все&nbsp;налоги и&nbsp;страховку;</li>
                    <li>Не берется доплата за&nbsp;дополнительное оборудование;</li>
                    <li>Все используемые при&nbsp;оказании услуг автомобили находятся в&nbsp;прекрасном техническом состоянии;</li>
                </ul>
                <p>Процесс оформления аренды занимает не более 20 минут, после чего Вам будет предоставлен автомобиль выбранной Вами модели.</p>

                <p>Долгосрочная аренда — это прокат автомобиля на срок от 3-х месяцев. Данная услуга становится все более востребованной клиентами, поскольку имеет целый ряд преимуществ. Заключив договор долгосрочной аренды Вы можете:</p>

                <ul>
                    <li>использовать несколько машин в&nbsp;рамках одного контракта;</li>
                    <li>арендовать различные модели автомобилей в&nbsp;зависимости от&nbsp;конкретных задач;</li>
                    <li>экономить свои средства благодаря специальному тарифному плану;</li>
                    <li>забыть о&nbsp;проблемах, связанных с&nbsp;плановым техническим обслуживанием и&nbsp;ремонтом;</li>
                </ul>
                <p>Долгосрочная аренда автомобиля выгодна не&nbsp;только частным лицам, но&nbsp;и&nbsp;организациям. Это&nbsp;идеальное решение для&nbsp;компаний, которые не&nbsp;хотят содержать собственный парк, состоящий из&nbsp;большого количества разных моделей. Долгосрочная аренда обычно используется юридическими лицами, когда необходимо:</p>
                <ul>
                    <li>быстро увеличить собственный парк без&nbsp;существенных затрат;</li>
                    <li>предоставить сотрудникам практичный<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">«</span>корпоративный автомобиль» для&nbsp;служебных поездок;</li>
                    <li>заменить находящиеся на&nbsp;ремонте и&nbsp;надолго вышедшие из&nbsp;строя машины;</li>
                </ul>
                <p><span style="margin-left: -0.3em">«Business</span>-Partner» предлагает своим клиентам услуги долгосрочной аренды на&nbsp;максимально выгодных условиях. Заключая договор с&nbsp;нашей компанией, Вы&nbsp;пользуетесь:</p>
                <ul>
                    <li>специальными тарифными планами;</li>
                    <li>полным комплексом услуг по&nbsp;аренде и&nbsp;обслуживанию автомобиля;</li>
                    <span style="margin-right: 0.3em"> </span> <li><span style="margin-left: -0.3em">«</span>экспресс-оформлением» пакета документов;</li>
                    <li>отсутствием долгосрочных обязательств перед прокатной компанией;</li>
                    <li>индивидуальным подходом в&nbsp;принятии решений;</li>
                </ul>
                <p>Если Вам&nbsp;необходим автомобиль на&nbsp;длительный срок&nbsp;— нет&nbsp;необходимости его&nbsp;покупать. Вам&nbsp;не&nbsp;придется больше задумываться о&nbsp;страховании, ремонте и&nbsp;регулярном обслуживании автомобиля, за&nbsp;Вас&nbsp;это&nbsp;сделают специалисты<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">«Business</span>-Partner».</p>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 usl_r">
                <span class="r_span" id="transfer">трансфер</span>
                <p class="thumbnail-ruby-t">

                    <img class="thumbnail-ruby" src="{{asset('assets/img/transfer-real.jpg')}}" alt="" width="300" height="300" style="float: left; margin: 0 17px 17px 0;">
                    Для гостей и жителей нашего города Мы готовы решить транспортные проблемы, связанные со встречей и доставкой Вас из аэропорта или
                    железнодорожного вокзала в гостиницу и обратно. Наши менеджеры свяжутся с Вами за день до окончания вашего времени пребывания в
                    Находке и согласуют удобное для Вас время и место прибытия автомобиля. Тем самым Вы застрахуете себя от ненужных хлопот по поиску
                    и заказу такси, которое может опоздать или не приехать вовсе.
                </p>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 usl_r usl_dop" >
                <span class="r_span" id="arenda">АРЕНДА ДОПОЛНИТЕЛЬНОГО ОБОРУДОВАНИЯ</span>
                <p class="thumbnail-ruby-t">

                    <img class="thumbnail-ruby" src="{{asset('assets/img/dop-real.jpg')}}" alt="" width="300" height="300" style="float: left; margin: 0 17px 17px 0;">
                    Также в нашей компании вы можете взять в аренду GPS навигатор с подробной картой города Находка и Приморского края, радиостанции, холодильник, детские кресла, сотовые телефоны, портативные DVD плееры
                </p><br><br>
            </div>


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 usl_r">
                <span class="r_span" id="outsorsing">ТРАНСПОРТНЫЙ АУТСОРСИНГ</span>
                <p class="thumbnail-ruby-t">

                    <img class="thumbnail-ruby" src="{{asset('assets/img/out-real.jpg')}}" alt="" width="300" height="300" style="float: left; margin: 0 17px 17px 0;">
                <p>Корпоративным клиентам предлагаем программу формирования автомобильного парка компании&nbsp;— долгосрочная аренда автомобилей<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">(</span>транспортный аутсорсинг) на&nbsp;срок до&nbsp;3 лет. Мы&nbsp;разработаем для&nbsp;Вас&nbsp;наиболее эффективную схему аренды автопарка, включая пакет необходимых дополнительных услуг в&nbsp;зависимости от&nbsp;сферы деятельности заказчика и&nbsp;его&nbsp;специфических запросов, и&nbsp;предложим наиболее приемлемую для&nbsp;заказчика систему оплаты.</p>
                </p>
                <p>После заключения договора оперативного лизинга автомобили немедленно поступают в&nbsp;распоряжение клиента и&nbsp;находятся в&nbsp;непрерывной эксплуатации в&nbsp;течение всего периода аренды. По&nbsp;окончании срока действия договора автомобили возвращаются в&nbsp;нашу компанию&nbsp;— Вам&nbsp;не&nbsp;нужно заниматься их&nbsp;дальнейшей продажей. Договором транспортного аутсорсинга может быть предусмотрено приоритетное право клиента на&nbsp;выкуп автомобилей. По&nbsp;желанию клиента договор транспортного аутсорсинга может быть пролонгирован, в&nbsp;таком случае автомобили будут заменены новыми.</p>
                <p>Все автомобили застрахованы, а&nbsp;вопросы взаимодействия со&nbsp;страховой компанией урегулируют наши сотрудники.</p>
                <p>Мы берем на&nbsp;себя обязательства по&nbsp;полному техническому обслуживанию автомобилей. На&nbsp;время ТО&nbsp;Вам&nbsp;предоставляется другой автомобиль аналогичного класса.</p>
                <p>Автомобильный парк Вашей компании в&nbsp;период аренды может быть расширен без&nbsp;существенных дополнительных затрат и&nbsp;без&nbsp;крупных авансовых платежей в&nbsp;удобные Вам&nbsp;сроки.</p>
                <p>Кроме очевидных преимуществ, таких как&nbsp;отсутствие крупных инвестиций на&nbsp;покупку и&nbsp;дальнейших затрат на&nbsp;обслуживание, имеются и&nbsp;дополнительные:</p>
                <ul>
                    <li>Аренда не&nbsp;учитывается на&nbsp;балансе основных средств&nbsp;— налог на&nbsp;имущество не&nbsp;возрастает;</li>
                    <li>Аренда автомобилей позволяет относить расходы на&nbsp;себестоимость, что&nbsp;уменьшает налогооблагаемую базу по&nbsp;прибыли.</li>
                    <li>Прочитать статью:<span style="margin-right: 0.3em"> </span> <a href="http://www.rb.ru/article/transportnyy-autsorsing-v-rossii/5805887.html"><span style="margin-left: -0.3em">«</span>Транспортный аутсорсинг в&nbsp;России»</a></li>
                </ul>
            </div>


        </div>

    </section>
@endsection
