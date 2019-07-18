@extends('site.layout')
@section('meta')
    <title>Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.</title>
@endsection

@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)
            @if($k==5)
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
                                    <div class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">Прайс</div>
                                </div>

                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="/">Главная</a></li>
                                    <li><i class="zmdi zmdi-chevron-right"></i></li>
                                    <li class="active">Прайс</li>
                                </ul>




                            </div>
                        </div>
                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
@endsection


@section('content')

    <section class="price">
        <!-- ABOUT US -->
        <div class="container">
            <div class="box-form-title">
                <div class="box-form-decor-wrap">

                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr >
                            <th style="text-align: center;">Класс авто</th>
                            <th style="text-align: center;">Автомобиль</th>
                            <th style="text-align: center;">от 1 до 3 дн.</th>
                            <th style="text-align: center;">от 4 до 7 дн.</th>
                            <th style="text-align: center;">> 7 дн.</th>
                            <th style="text-align: center;">> 14 дн.</th>
                            <th style="text-align: center;">Залог</th>
                            <th style="text-align: center;">Без  ограничения по пробегу</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($all)
                            @foreach ($all as $a)
                                    @foreach ($a['autos'] as $auto)
                                        <tr>
                                            <td>{{$a['name']}}</td>
                                            <td>{{$auto['name']}}</td>
                                            <td style="text-align: center;">{{$auto['setka1']}} р/сутки</td>
                                            <td style="text-align: center;">{{$auto['setka2']}} р/сутки</td>
                                            <td style="text-align: center;">{{$auto['setka3']}} р/сутки</td>
                                            <td style="text-align: center;">Договорная</td>
                                            <td style="text-align: center;">{{$auto['zalog']}} р/сутки</td>
                                            <td style="text-align: center;">{{$auto['without']}} р/сутки</td>
                                        </tr>
                                    @endforeach


                            @endforeach

                        @endif

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <p style="font-weight: bold;">Дополнительные услуги</p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            @foreach($dop as $d)
                                <tr>
                                    <td>{{$d['name']}}</td>
                                    @if ($d['cena']!=0)
                                        <td>{{$d['cena']}} руб</td>
                                    @else
                                        <td>бесплатно</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <p style="margin-bottom: 40px; font-size: 12px;">* Заказ услуги подача/возврат автомобиля по адресу в нерабочее время заказывается минимум за 24 часа.</p>


        </div>
    </section>


@endsection
