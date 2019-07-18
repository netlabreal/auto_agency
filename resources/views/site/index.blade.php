@extends('site.layout')

@section('meta')
<title>Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.</title>
@endsection
@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)
            @if($k==0)
                <li class=""><a class="lab-nav-link active" href="./{{$item['alias']}}">{{$item['title']}}</a></li>
            @else
                <li><a class="lab-nav-link" href="./{{$item['alias']}}">{{$item['title']}}</a></li>
            @endif
        @endforeach
    @endif
@endsection

@section('carusel')
    <div class="owl-carousel owl-theme">

        <div class="container">
            <div class="jumbotron-classic-content" style="padding-top: 47px; text-align: center;">
                <h2 class="text-uppercase text-white font-weight-bold wow-outer">
                    <span class="wow slideInDown" style="font-family: txt1; font-size: 36px;">аренда автомобиля - это просто и доступно.</span><br>
                </h2>

            </div>
        </div>


    </div>
@endsection


@section('content')

    <section content>
        <!-- ZAKAZ -->
        <div class="container" style="transition: all 0.9s; padding-bottom: 30px;">


            <form method="get" action="{{route('autopark')}}">
                <div class="form-wrap form-wrap-select">
                    <div class="row row-20 justify-content-md-center" style="box-shadow: 0 0 16px 0 rgba(0,0,0,.06);">

                        <div class="box-form-title">
                            <div class="box-form-decor-wrap">
                                <h2 class="rh">подобрать автомобиль</h2>
                            </div>
                        </div>

                        <div class="box-form">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <label style="color: black;font-family: txt2; text-transform: uppercase; font-size: 16px; font-weight: normal;">Класс автомобиля</label>
                                <select class="form-control form-input for-text-search" id="type" name="class">
                                    <option value="0">любой</option>
                                    <option value="1">малый класс</option>
                                    <option value="2">средний класс</option>
                                    <option value="2">универсальные</option>
                                    <option value="2">4wd</option>
                                    <option value="2">микроавтобусы</option>
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" style="padding-top: 0px;" id="kol">
                                <label style="color: black;font-family: txt2; text-transform: uppercase; font-size: 16px; font-weight: normal;">Количество суток</label>
                                <input value="1" type="number" min="1" max="14" id="kol_sutok" placeholder="Кол-во суток" class="form-control form-input for-text-search" name="kol_sutok">
                            </div>

                             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" style="text-align: center;" id="s_cena">
                                 <input id="ex2" type="text" class="span2" value="" data-slider-min="0" data-slider-max="5000" data-slider-step="500" data-slider-value="[0,5000]" name="cena"/>
                                 <div id="znach"></div>
                             </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" style="text-align: center;padding-top: 22px;">
                                <button type="submit" id="find_obj" class="btn button-sredn">подобрать</button>
                            </div>
                        </div>



                    </div>



                </div>

            </form>
        </div>

    </section>


    <section class="uslugy" style="background-color: white;">
        <!-- USLUGY -->
        <div class="container">
            <div class="box-form-title" style="    padding-top: 30px;">
                <div class="box-form-decor-wrap">
                    <h2 class="rh">наши услуги</h2>
                </div>
            </div>
            <div class="row row-2" style="    padding-top: 70px; padding-bottom: 70px;">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="text-align: center; overflow-x: hidden; overflow-y: hidden;" >
                    <a class="thumbnail-ruby" href="/uslugy#prokat">
                        <img class="thumbnail-ruby-image" src="{{asset('assets/img/arend-real.jpg')}}" alt="" width="300" height="300">
                        <div class="thumbnail-ruby-caption">
                            <p class="thumbnail-ruby-title">
                                <span data-letters-l="Logistic" data-letters-r="services">ПРОКАТ автомобиля</span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="text-align: center; overflow: hidden;">
                    <a class="thumbnail-ruby" href="/uslugy#transfer">
                        <img class="thumbnail-ruby-image" src="{{asset('assets/img/transfer-real.jpg')}}" alt="" width="300" height="300">
                        <div class="thumbnail-ruby-caption">
                            <p class="thumbnail-ruby-title">
                                <span data-letters-l="Logistic" data-letters-r="services">ТРАНСФЕР</span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="text-align: center; overflow: hidden;">
                    <a class="thumbnail-ruby" href="/uslugy#arenda">
                        <img class="thumbnail-ruby-image" src="{{asset('assets/img/dop-real.jpg')}}" alt="" width="300" height="300">
                        <div class="thumbnail-ruby-caption">
                            <p class="thumbnail-ruby-title">
                                <span data-letters-l="Logistic" data-letters-r="services">АРЕНДА ДОПОЛНИТЕЛЬНОГО ОБОРУДОВАНИЯ</span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="text-align: center; overflow: hidden;">
                    <a class="thumbnail-ruby" href="/uslugy#outsorsing">
                        <img class="thumbnail-ruby-image" src="{{asset('assets/img/out-real.jpg')}}" alt="" width="300" height="300">
                        <div class="thumbnail-ruby-caption">
                            <p class="thumbnail-ruby-title">
                                <span data-letters-l="Logistic" data-letters-r="services">ТРАНСПОРТНЫЙ АУТСОРСИНГ</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <section class="otzivi">
            <div class="container">


                <div class="box-form-title">
                    <div class="box-form-decor-wrap">
                        <h2 class="rh1">отзывы</h2>
                    </div>
                </div>

                <!-- ++++++++++++++++++++++++++++++++++ -->
                <div class="owl-carousel owl-theme" style="">

                    <div class="container">
                        <div class="classic-content" style="padding-top: 17px;padding-bottom: 57px; color: black">
                            <div class="sl-item">
                                <p>Приезжали в Находку на летний отдых из Хабаровска. Решили не ехать на своем авто, приехали на поезде.
                                    Еще до приезда обратились в Бизнес-Партнер, по интернету и телефону подобрадли автомобиль и сразу по приезду взяли в аренду.
                                    Очень довольны! Сервис на уровне, вот прям выручили и сделали отдых более чем комфортным. В следующий раз только к вам!</p>
                                <span class="s-text">
                                <strong>Василий </strong>
                            </span>

                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="classic-content" style="padding-top: 17px;padding-bottom: 57px; color: black">
                            <div class="sl-item">
                                <p>Арендовал авто на встречу в аэропорту партнера по бизнесу. Свою машину как раз продал и ждал авто с салона.
                                    Ребята очень выручили, подобрали авто на уровне, салон чистый, техсостояние не подвело. Был приятно удивлен сервисом. </p>
                                <span class="s-text">
                                <strong>Александр </strong>
                            </span>

                            </div>
                        </div>
                    </div>


                    <div class="container">
                        <div class="classic-content" style="padding-top: 17px;padding-bottom: 57px; color: black">
                            <div class="sl-item">
                                <p> В нашей семье трое детей. Пока своя машина была в ремонте, взяли в аренду авто в Бизнес-Партнере.
                                    Раньше в подобных ситуациях разорялись на такси (детские секции, сады, школы, др), тем более, что живем за городом (Золотари). Жалеем, что не знали вас раньше! </p>
                                <span class="s-text">
                                <strong>Семья Корниловых </strong>
                            </span>

                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="classic-content" style="padding-top: 17px;padding-bottom: 57px; color: black">
                            <div class="sl-item">
                                <p> Арендовали несколько авто на свадьбу - для себя и для гостей. Супер! Мы остались очень довольны, спасибо! </p>
                                <span class="s-text">
                                <strong>Ольга</strong>
                            </span>

                            </div>
                        </div>
                    </div>
                    <!-- ++++++++++++++++++++++++++++++++++ -->


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
    <!--++++++++++++++++++++++++++++++++++++++++++-->
    <script type="text/javascript">
        var thousandSeparator = function(str) {
            pp = (str + '').split(' ₽');
            var t = 0; t = pp.length;

            var parts = (pp[0] + '').split('.');
                main = parts[0];
                len = main.length;
                output = '';
                i = len - 1;

            while(i >= 0) {
                output = main.charAt(i) + output;
                if ((len - i) % 3 === 0 && i > 0) {
                    if(isNaN(parseInt(main.charAt(i)))==false) {
                        output = ' ' + output;
                    }
                }
                --i;

            }

            if (parts.length > 1) {
                output += '.' + parts[1];
            }
            if (t>1){output = output+' ₽';}
            return output;
        };




        $(document).ready(function() {
            $('#ex2').slider({
                formatter: function (value) {
                    if(Array.isArray(value)){
                        $("#znach").html("Стоимость от: "+thousandSeparator(value[0])+" р. до: "+thousandSeparator(value[1])+' р.');
                    }
                    return 'Стоимость: ' + thousandSeparator(value[0])+' р. - '+thousandSeparator(value[1]) + ' р.';
                }
            });

            $(".owl-carousel").owlCarousel({items:1,  margin:10, navigation:true, pagination:true, autoplay:true, rewind:true, autoplayTimeout:10000});

        });


    </script>
    <!--++++++++++++++++++++++++++++++++++++++++++-->
@endsection

{{--{{Route::currentRouteName()}}--}}