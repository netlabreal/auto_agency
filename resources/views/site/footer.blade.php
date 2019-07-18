<section class="footer">
    <div class="container">

        <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 dop">
            <p class="f_main" style=" ">BUSINESS-PARTNER</p>
            <p class="f_nomain">прокат автомобилей в г. Находка</p>
        </div>
        <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 dop">
            <h4 class="font-weight-bold text-uppercase text-white">О НАС</h4>

            <ul style="margin-left: 25px;">
                <li><i class="zmdi zmdi-pin" style="padding-right: 5px;"></i>г. Находка ул. Проспект мира д.71</li>
                <li><i class="zmdi zmdi-phone" style="padding-right: 5px;"></i>(4236) 79-80-80</li>
                <li><i class="zmdi zmdi-email" style="padding-right: 5px;"></i>
                    <a href="mailto:manager.sobstvennik@gmail.com" id="email">mail@business-partner-prim.ru</a>
                </li>
            </ul>
        </div>

        <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 dop">
            <h4 class="font-weight-bold text-uppercase text-white">НОВОСТИ</h4>

            @foreach($news as $n)
                    <div class="news-minimal">
                        <div class="news-minimal-text"><a href="/news/{{$n->id}}">{{$n->name}}</a></div>
                        <div class="news-minimal-link">{{$n->created_at->format('d-m-Y')}}</div>
                    </div>
            @endforeach

        </div>


    </div>

    <div class="container">
        <hr>
    </div>

    <div class="footer-advanced-aside">
        <div class="container">
            <span style="float: left">©&nbsp;</span>
            <span style="float: left; padding-right: 3px;" class="copyright-year">{{ date('Y') }} </span><span>&nbsp;</span>

            <span style="float: left"> Все права защищены.</span><span>&nbsp;</span>
            <span style="float: right"><a href="http://designedbylab.ru">Разработано designedbylab.ru</a></span>
        </div>
    </div>
</section>