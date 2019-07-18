@extends('site.layout')

@section('meta')
    <title>Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.</title>
@endsection

@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)
            @if($k==1)
                <li class=""><a class="lab-nav-link active" href="./{{$item['alias']}}">{{$item['title']}}</a></li>
            @else
                <li><a class="lab-nav-link" href="./{{$item['alias']}}">{{$item['title']}}</a></li>
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
                                    <li class="active">наши предложения</li>
                                </ul>
                            </div>
                        </div>
                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
@endsection



@section('content')
    <section class="content" style="min-height: 400px;">

        <div class="menu-avto" style="padding-top: 55px;">
            <ul class="vehicles" id="tabs">
                    <li class="firstItem " id="t0"><a data-toggle="tab1" href="/autopark">Все автомобили </a></li>
                    <li class="" id="t1"><a data-toggle="tab1" href="/autopark?class=1">Малый класс</a></li>
                    <li class="" id="t2"><a data-toggle="tab1" href="/autopark?class=2">Средний класс</a></li>
                    <li class="" id="t3"><a data-toggle="tab1" href="/autopark?class=3">Универсальные</a></li>
                    <li class="lastItem" id="t4"><a data-toggle="tab1" href="/autopark?class=4">4 wd</a></li>
                    <li class="lastItem" id="t5"><a data-toggle="tab1" href="/autopark?class=5">микроавтобусы</a></li>
            </ul>
        </div>


        <div class="row-20">
            <div class="container">
                @if (@isset($auto))
                    @foreach($auto as $k=>$object)
                        <div class="col-md-6 col-lg-4" style="padding-bottom: 30px;text-align: center; padding-top: 30px;">
                            <a href="/auto/{{$object['id']}}"> <article class="post-modern" style=" ">

                                    <div class="pre-img"><img src="{{$object['preview']}}" alt="" class="img-responsiv" style="width: 310px; height: 233px;    object-fit: cover;text-align: center;"></div>
{{--                                    <div class="pre-img"><img src="/storage/prview/{{$object['id']}}/{{$object['preview']}}" alt="" class="img-responsiv" style="width: 310px;text-align: center;"></div>--}}

                                    <div class="post-modern-title" style="padding-top: 20px;">
                                        <p style="font-size: 18px">{{$object['name']}}</p>
                                    </div>

                                    <ul class="post-modern-meta">
                                        <li>Мощность двигателя: <span>{{$object['mosh']}} лс</span></li>
                                        <li>Коробка передач: <span>
                                        @if ($object['korobka'] == 1)
                                                    автомат
                                                @elseif ($object['korobka'] == 2)
                                                    коробка
                                                @else
                                                    вариатор
                                                @endif
                                                {{--                                            --}}
                                                {{--                                        {{$object['korobka']}}--}}
                                    </span></li>

                                        @if($object
                                        ['v']==1)
                                            <li>Объем двигателя: <span>{{$object['v']}} литр</span></li>
                                        @else
                                            <li>Объем двигателя: <span>{{$object['v']}} литра</span></li>
                                        @endif
                                        <li>Тип руля: <span>
                                        @if ($object['type_rule'] == 1)
                                                    правый
                                                @else
                                                    левый
                                                @endif
                                    </span></li>
                                        <li>Цена: <span style="color: red"> {{$object[$setka]}} р.</span></li>
                                    </ul>
                                </article></a>
                            <div style="text-align: center; padding-top: 0px;"><button type="button" class="btn button-predl" id="oformit_button" style="width:75%;" onclick="location.href='/zakaz?auto={{$object['id']}}'">оформить</button></div>


                        </div>
                    @endforeach
                @endif

            </div>
        </div>


    </section>

@endsection


@section('js')
    <script type="text/javascript">
        $(window).load(function(){
            $('li').load(function() {
                alert('aaa');
            });
        });
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
            var s1 = location.search.substring(1, location.search.length).split('&');
            if(s1!=''){
                s2 = s1[0].split('=')[1];
                $('li').removeClass('active');
                $('#t'+s2).addClass('active');
            }
            else{
                 $('li').removeClass('active');
                 $('#t0').addClass('active');
            }

            $("#carousel-example-generic").owlCarousel({items:1,  margin:10, navigation:true, pagination:true, autoplay:true, rewind:true, autoplayTimeout:10000});
            $(".owl-theme").owlCarousel({items:1,  margin:10, navigation:true, pagination:true, autoplay:true, rewind:true, autoplayTimeout:10000});
            $(".owl-carousel").owlCarousel({items:1,  margin:10, navigation:true, pagination:true, autoplay:true, rewind:true, autoplayTimeout:10000});


        });


    </script>
@endsection

