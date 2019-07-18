<div class="container" style="transition: all 0.9s; padding-bottom: 30px;">
    <form action="{{route('send_email')}}" method="POST">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">

                <label>Name</label><i class="zmdi zmdi-view-toc "></i>
                <input class="input-text" type="text" name="name">

            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <label>Email</label><i class="zmdi zmdi-view-toc "></i>
                <input class="input-text" type="email" name="email">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <input type="submit">
            </div>
            {{csrf_field()}}
        </div>

    </form>
</div>