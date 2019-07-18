@extends('site.layout')
@section('meta')
    <title>Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.</title>
@endsection

@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)
            @if($k==4)
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
                                    <div class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">О нас</div>
                                </div>

                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="/">Главная</a></li>
                                    <li><i class="zmdi zmdi-chevron-right"></i></li>
                                    <li class="active">О нас</li>
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
                    <p>Бизнес-Партнер — одна из ведущих компаний в сфере аренды и проката автомобиля в Находке. Благодаря ответственной работе мы зарекомендовали себя как надежный партнер с безупречной репутацией.
                    </p>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 rdop">
                <!--                <i class="zmdi zmdi-globe" style="vertical-align: middle; color:red; font-size: 109px;"></i>  -->
                <p>высокий уровень сервиса</p>
                <div class="divider divider-default"></div>
                <div class="opis">
                    Опыт работы высококвалифицированных сотрудников быстро и качествено поможет Вам забронировать автомобиль, а также подобрать одну из сервисных услуг.
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 rdop">
                <!--                <i class="zmdi zmdi-car"></i>-->
                <p>разнообразный модельный ряд автомобилей</p>
                <div class="divider divider-default"></div>
                <div class="opis">
                    «Business-Partner» гарантирует ежеквартальное пополнение парка автомобилей. В прокате только надежные, прошедшие регулярный технический осмотр и оснащенные охранными сигнализациями автомобили. Наш автопарк состоит из популярных моделей: Toyota, Nissan, Honda, Mitsubishi различных марок и комплектаций.
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 rdop">
                <!--                <i class="zmdi zmdi-wrench"></i>-->
                <p>помощь при ДТП и техническая поддержка</p>
                <div class="divider divider-default"></div>
                <div class="opis">
                    Когда Вы попали в ДТП на автомобиле взятом напрокат — «Business-Partner» поможет консультируя в решении проблем, связанных с оформлением ДТП и выдаст другой автомобиль вместо повреждённого, в минимальный срок. Наша техническая поддержка работает круглосуточно и устанит все технические вопросы возникающие при эксплуатации автомобиля.
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 rdop">
                <!--                <i class="zmdi zmdi-money"></i>-->
                <p>дисконтная система (система скидок)</p>
                <div class="divider divider-default"></div>
                <div class="opis">
                    «Business-Partner» дарит всем клиентам дисконтные карты с накопительной системой скидок, которая начинает действовать при следующих арендах автомобилей. Мы хотим видеть Вас нашим клиентом продолжительное время, так как ориентированы на длительное сотрудничество.
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 rdop">
                <!--                <i class="zmdi zmdi-map"></i>-->
                <p>удобное расположение и гибкий график работы</p>
                <div class="divider divider-default"></div>
                <div class="opis">
                    В центре Находки находится пункт выдачи автомобилей. Работаем мы с 9 до 18 без выходных и обеда 365 дней в году, чтобы было наиболее удобно сотрудничать с нами. Также, по Вашему желанию, мы можем доставить или забрать автомобиль в любом удобном для Вас месте.
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 rdop">
                <!--                <i class="zmdi zmdi-map"></i>-->
                <p>выгодная система тарифов</p>
                <div class="divider divider-default"></div>
                <div class="opis">
                    Мы сделали доступной услугу проката автомобилей в Находке. У нас есть тарифные планы на любой вкус. Возможность аренды авто в Находке без лимита пробега и без залога. Каждый месяц «Business-Partner» проводит скидки и акции.
                </div>
            </div>

        </div>




    </section>


    <section class="my_map">
        <div class="" style="display: flex; flex-wrap: wrap;">
            <div class="col-lg-12 col-xs-12 height-fill wow fadeIn" style="visibility: visible; animation-name: fadeIn; padding-right: 0px;padding-left: 0px;">
                <div id="map" style="min-height: 400px;">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full&skin=dark"></script>
    <script type="text/javascript" src={{asset('assets/js/map.js')}}?v=1></script>

@endsection
