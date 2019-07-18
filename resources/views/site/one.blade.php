@extends('site.layout')
@section('meta')
    <title>Прокат и аренда автомобилей в г.Находка. {{$auto['name']}}</title>
    <meta property="og:title" content="{{$auto['name']}}">
    <meta property="og:description" content="{{$auto['name']}}">
    <meta property="og:image" content="">
    <meta property="og:type" content="website">
@endsection

@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)
            @if($k==1)
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
                                    <div class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">автопарк</div>
                                </div>

                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="/">Главная</a></li>
                                    <li><i class="zmdi zmdi-chevron-right"></i></li>
                                    <li class="active">{{$auto['name']}}</li>
                                </ul>




                            </div>
                        </div>
                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
@endsection



@section('content')

    <div class="row-20">
        <div class="container">

            <div class="l-caption">{{$auto['name']}}</div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="detail_view" style="text-align: center;">


                    <div id="testCarousel" class="carousel slide" data-ride="carousel" style="display: inline-block; width: 100%">
                        @if($files)
                            <!-- Индикаторы карусели -->
                            <ol class="carousel-indicators">

                                @foreach($files as $k=>$f)
                                    @if($k==0)
                                        <li data-target="#testCarousel" data-slide-to="{{$k}}" class="active"></li>
                                    @else
                                        <li data-target="#testCarousel" data-slide-to="{{$k}}" class=""></li>
                                    @endif

                                @endforeach

                            </ol>

                                <!-- Слайды карусели -->
                                <div class="carousel-inner">
                                    <!-- Слайд 1 -->

                                    @foreach($files as $k=>$f)
                                        @if($k==0)
                                            <div class="item active">
                                                <img src="{{$f}}" alt="{{$k}}">
                                            </div>
                                        @else
                                            <div class="item ">
                                                <img src="{{$f}}" alt="{{$k}}">
                                            </div>
                                        @endif

                                    @endforeach


                                </div>

                                <!-- Кнопка, переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
                                <a class="left carousel-control" href="#testCarousel" role="button" data-slide="prev">

                                    <span class=""> <i class="zmdi zmdi-chevron-left" style="font-size: 50px; color: white; padding-left: 12px;    padding-top: 220%;"></i></span>
                                </a>
                                <!-- Кнопка, переход на следующий слайд с помощью атрибута data-slide="next" -->
                                <a class="right carousel-control" href="#testCarousel" role="button" data-slide="next">
                                    <span class=""> <i class="zmdi zmdi-chevron-right" style="font-size: 50px; color: white; padding-left: 12px;    padding-top: 220%;"></i></span>

                                </a>

                        @endif


                    </div>

                    <div class="opisanie">

                        <h3 align="justify" style="text-align:center;">{{$auto['name']}}</h3>
                        <p align="justify" style="font-size: 18px;">{{$auto['opisanie']}}</p>
                    </div>


                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <ul class="post-modern-meta-auto" style="text-align: center;font-size: 18px; padding-left: 40px;">
                    <li style="padding-top: 5px; font-family: txt1">
                        <button style="width: 100%" type="button" class="btn button-black" id="zakaz_button">Заказать авто</button>

                    </li><br>
                    <li>Мощность двигателя: <span>{{$auto['mosh']}} лс</span></li>
                    <li>Коробка передач: <span>автоматическая</span></li>
                    @if($auto['v']==1)
                        <li>Объем двигателя: <span>{{$auto['v']}} литр</span></li>
                    @else
                        <li>Объем двигателя: <span>{{$auto['v']}} литра</span></li>
                    @endif
                    <li>Тип руля: <span>правый</span></li><br>

                    @if($auto['complect']!='')
                        <li>Комплектция: <span>
                                {{$auto['complect']}}
                            </span></li>

                        <li>
                    @endif

                        <br>
                        <div class="table-responsive" id="price_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">Наименование</th>
                                    <th style="text-align: center;">Стоимость</th>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>от 1 до 3 дн., руб/сутки</td>
                                    <td style="color: red">{{$auto['setka1']}}</td>

                                </tr>

                                <tr>
                                    <td>от 4 до 7 дн., руб/сутки</td>
                                    <td style="color: red">{{$auto['setka2']}}</td>
                                </tr>
                                <tr>
                                    <td>7 дн., руб/сутки</td>
                                    <td style="color: red">{{$auto['setka3']}} </td>
                                </tr>
                                <tr>
                                    <td>Залог</td>
                                    <td style="color: red">{{$auto['zalog']}} </td>
                                </tr>
                                <tr>
                                    <td> Без ограничения по пробегу, р/сут.</td>
                                    <td style="color: red">{{$auto['without']}} </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </li>

                </ul>



            </div>


        </div>
    </div>

@endsection


@section('js')
    <script type="text/javascript">

        $(window).scroll(function() {
            if ($(this).scrollTop() > 60) {
                $('.navbar').addClass('navbar-fixed-top');
                $(".navbar").css("box-shadow", "0 5px 10px 0px rgba(20, 20, 28, 0.3)");
                $('#toTop').fadeIn();

            }
            if ($(this).scrollTop() < 60) {
                $('.navbar').removeClass('navbar-fixed-top')
                $(".navbar").css("box-shadow", "");

                $('#toTop').fadeOut();
            }
        });


        $(document).ready(function() {

            $("#carousel-example-generic").owlCarousel({items:1,  margin:10, navigation:true, pagination:true, autoplay:true, rewind:true, autoplayTimeout:10000});
            $(".owl-theme").owlCarousel({items:1,  margin:10, navigation:true, pagination:true, autoplay:true, rewind:true, autoplayTimeout:10000});
            $(".owl-carousel").owlCarousel({items:1,  margin:10, navigation:true, pagination:true, autoplay:true, rewind:true, autoplayTimeout:10000});


            $('#zakaz_button').click(function(){
                document.location.href = "/zakaz?auto={{$auto['id']}}";
            });
        });


    </script>
@endsection