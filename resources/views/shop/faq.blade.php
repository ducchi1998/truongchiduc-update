@extends('shop.layouts.main')

@section('content')
    <style>
        .panel-group .panel{
            background-color: #fff;
            border:none;
            box-shadow:none;
            border-radius: 10px;
            margin-bottom:11px;
        }
        .panel .panel-heading{
            padding: 0;
            border: none;
        }

        .panel-default>.panel-heading {
            background-color: #fff;
        }

        .panel-heading a{
            display: block;
            border:none;
            padding:15px 35px 15px;
            font-size: 14px;
            background-color: #373d54;
            font-weight:400;
            position: relative;
            color:#FFF;
            box-shadow:none;
            transition:all 0.1s ease 0s;
            border-radius: 25px;
        }
        .panel-heading a:after, .panel-heading a.collapsed:after{
            content: "\f068";
            font-family: fontawesome;
            text-align: center;
            position: absolute;
            right: 6px;
            top: 5px;
            color:#fff;
            background-color:#373d54;
            border: 5px solid #fff;
            font-size: 14px;
            width: 40px;
            height:40px;
            line-height: 30px;
            border-radius: 50%;
            transition:all 0.3s ease 0s;

        }
        .panel-heading:hover a:after,
        .panel-heading:hover a.collapsed:after{
            transform:rotate(360deg);
        }
        .panel-heading a.collapsed:after{
            content: "\f067";
        }

        #accordion .panel-body{
            background-color:#Fff;
            color:rgb(0, 0, 0);
            line-height: 25px;
            padding: 15px 25px 5px 35px ;
            border-top:none;
            font-size:14px;
            position: relative;
        }

        .updateAsked {
            padding: 5px 35px;
        }

        @media only screen and (max-width:720px) {
            .panel-heading a:after, .panel-heading a.collapsed:after {
                /*top: 14px;*/
                /*width: 35px;*/
                /*height: 35px;*/
                /*line-height: 25px;*/
                opacity: 0;
            }

            .panel-heading a {
                border-radius: 45px;
            }
        }
    </style>
    <main>
        <section class="container">
            <ul class="b-crumbs">
                <li>
                    <a href="/">
                        Trang Ch???
                    </a>
                </li>
                <li>
                    <span>F.A.Q</span>
                </li>
            </ul>
            <h1 class="main-ttl"><span>M???t s??? c??u h???i th?????ng g???p</span></h1>

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="first" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        C??u h???i 1: T???i sao m???t h??ng c???a Shop Mobile l???i r??? h??n so v???i c??c ?????i l?? kh??c ?
                                        <span> </span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>
                                        <strong>Tr??? L???i: </strong>
                                        Do ch??ng t??i l???y l???i nhu???n th???p v?? s??? c???p nh???t gi?? li??n t???c theo gi??? v???i ph????ng ch??m gi?? lu??n ph???i t???t nh???t tr??n th??? tr?????ng.
                                        Ch??ng t??i lu??n mong mu???n kh??ch h??ng c?? ???????c nh???ng s???n ph???m ch???t l?????ng t???t nh???t v???i gi?? r??? nh???t.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        C??u h???i 2: Th???i gian Shop Mobile duy???t ????n h??ng v?? giao h??ng s??? m???t bao l??u?
                                        <span> </span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>
                                        <strong>Tr??? l???i: </strong>
                                        C??c ????n h??ng s??? ???????c duy???t sau 30 ph??t k??? t??? l??c kh??ch ?????t h??ng trong c??c ng??y trong tu???n. Tr?????ng h???p kh??ch h??ng mu???n thay ?????i ho???c h???y ????n h??ng c?? th??? li??n h??? qua hotline.
                                        Th???i gian giao h??ng bao l??u s??? t??y theo khu v???c c???a kh??ch h??ng. N???u ????n h??ng trong t???nh m???t 1-2 ng??y , c??n ????n h??ng ngo??i t???nh s??? m???t 3-5 ng??y.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        C??u h???i 3: N???u tr?????ng h???p s???n ph???m kh??ch h??ng ?????t mua g???p v???n ????? s??? gi???i quy???t nh?? th??? n??o?
                                        <span> </span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <p>
                                        <strong>Tr??? l???i: </strong>
                                        Ch??ng t??i sau khi nh???n ???????c ph???n h???i c???a kh??ch h??ng v??? v???n ????? h??ng h??a b??? g???p v???n ????? s??? th??ng b??o v???i kh??ch h??ng th???i gian l??m vi???c.
                                        Sau ???? kh??ch h??ng ??em s???n ph???m ?????n v?? ch??ng t??i s??? ?????i cho kh??ch h??ng s???n ph???m m???i, c??n c??c l???i nh??? trung t??m b???o h??nh s??? gi???i quy???t.
                                        Tr?????ng h???p kh??ch h??ng kh??ng th??? ??em t???i do ??? n??i xa, kh??ch h??ng c?? th??? ????ng k?? ?????i b???ng ph????ng th???c giao h??ng tuy nhi??n s??? ph???i ch???u 5% ph??
                                        giao v?? ?????i s???n ph???m.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        C??u h???i 4: Tr?????ng h???p kh??ch h??ng kh??ng nh???n ???????c email sau khi ?????t h??ng ?
                                        <span> </span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <p>
                                        <strong>Tr??? l???i: </strong>
                                        Kh??ch h??ng h??y li??n h??? qua hotline ho???c nh???n tin qua boxchat c???a Mobile Shop. Ch??ng t??i s??? nh???n th??ng tin c???a qu?? kh??ch v??
                                        g???i l???i th??ng tin ????n h??ng c???a b???n qua email m?? b???n ???? ????ng k?? bao g???m th??ng tin ng?????i v?? s???n ph???m c???a kh??ch h??ng s???m nh???t c??
                                        th???.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="updateAsked">
                <p>C??n c???p nh???t th??m .......</p>
                <br>
                <p>Ch??ng t??i xin ch??n th??nh c???m ??n t???t c??? c??c kh??ch h??ng ????, ??ang v?? s??? ???ng h??? ch??ng t??i.</p>
            </div>
            <br>

        </section>
    </main>
@endsection
