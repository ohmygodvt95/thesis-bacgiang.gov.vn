@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('components/jcarousel/skins/tango/skin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('content')
    <div class="row" id="content">
        <div class="col-sm-7 image-slider" id="image-slider">
            <a href="#">
                <img src="http://www.bacgiang.gov.vn//upload/news/8742_IMG_0259.jpg"
                     alt="Img" class="img-responsive center-block">
                <div></div>
            </a>
        </div>
        <div class="col-sm-5">
            <!-- TAB NAVIGATION -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#tab1" role="tab" data-toggle="tab">{{ $newsInProvince->title }}</a></li>
                <li><a href="#tab2" role="tab" data-toggle="tab">{{ $newsInCountry->title }}</a></li>
                <li><a href="#tab3" role="tab" data-toggle="tab">{{ $newsInInternational->title }}</a></li>
            </ul>
            <!-- TAB CONTENT -->
            <div class="tab-content">
                <div class="active tab-pane fade in" id="tab1">
                    <ul id="news-province">
                        @foreach($newsInProvince->getPosts(5) as $item)
                            <li data-title="{{ $item->title }}"
                                data-url="{{ url('/posts/'.$item->id) }}"
                                data-img="{{ $item->thumb }}">
                                <a href="/posts/{{ $item->id }}" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <ul>
                        @foreach($newsInCountry->getPosts(5) as $item)
                            <li>
                                <a href="/posts/{{ $item->id }}" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade" id="tab3">
                    <ul>
                        @foreach($newsInInternational->getPosts(5) as $item)
                            <li>
                                <a href="/posts/{{ $item->id }}" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="slider">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5>Tin tức - Sự kiện</h5>
                    <ul id="mycarousel" class="jcarousel-skin-tango">
                        @foreach($newsAndEvents->getPosts(10) as $item)
                            <li>
                                <a href="{{ url('/posts/'.$item->id) }}"
                                   title="{{ $item->title }}">
                                    <img src="{{ $item->thumb }}"
                                         width="125"
                                         height="90" align="left" style=""
                                         alt="{{ $item->title }}"/>
                                    <div class="text-center">{{ str_limit($item->title, 40) }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('more')
    <div class="row" id="hotline">
        <div class="col-sm-12">
            <img src="{{ asset('images/hotline.gif') }}" alt="hotline" class="img-responsive">
        </div>
        <div class="col-sm-12">
            <ul class="more">
                <li>
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/24982_khunggiadat.jpg"
                            alt="Title" class="img-responsive"></a>
                </li>
                <li>
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/2667_khunggiadat.jpg"
                            alt="Title" class="img-responsive"></a>
                </li>
                <li>
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/24810_Chinh%20sach%20giam%20ngheo%201.jpg"
                            alt="Title" class="img-responsive"></a>
                </li>
                <li>
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/8024_huongdan.jpg"
                            alt="Title" class="img-responsive"></a>
                </li>
                <li>
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/ltd.jpg"
                            alt="Title" class="img-responsive"></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row" id="more">
        <div class="col-sm-9">
            <div class="col-sm-8 no-padding">
                <!-- TAB NAVIGATION -->
                <ul class="nav nav-tabs nav-notice" role="tablist">
                    <li class="active">
                        <a href="#tab_1" role="tab" data-toggle="tab">
                            {{ $infoManagementTexts->title }}
                        </a>
                    </li>
                    <li>
                        <a href="#tab_2" role="tab" data-toggle="tab">
                            {{ $infoManagementFiles->title }}
                        </a>
                    </li>
                </ul>
                <!-- TAB CONTENT -->
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="tab_1">
                        <div class="row">
                            @if(count($item = $infoManagementTexts->getPosts(1)->first()))
                                <div class="col-sm-3">
                                    <img src="{{ $item->thumb }}" alt="img"
                                         class="img-responsive center-block">
                                </div>
                                <div class="col-sm-9">
                                    <div class="heading">
                                        <a href="{{ url('/posts/'.$item->id) }}" title="{{ $item->title }}">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                    <p>{{ $item->description }}
                                        <a href="{{ url('/posts/'.$item->id) }}"
                                           class="read-more pull-right">Xem tiếp</a></p>
                                </div>
                            @endif
                        </div>
                        <ul>
                            @foreach($infoManagementTexts->getPosts(4, 1) as $item)
                                <li>
                                    <a href="{{ url('/posts/'.$item->id) }}" title="{{ $item->title }}">
                                        {{ $item->title }}
                                    </a>
                                    <small>({{ substr($item->created_at, 0, 10) }})</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="tab_2">
                        <div class="row">
                            @if(count($item = $infoManagementFiles->getPosts(1)->first()) > 0)
                                <div class="col-sm-12">
                                    <div class="heading">
                                        <a href="{{ url('/posts/'.$item->id) }}" title="{{ $item->title }}">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                    <p>{{ $item->description }}
                                        <a href="{{ url('/posts/'.$item->id) }}"
                                           class="read-more pull-right">Xem tiếp</a></p>
                                </div>
                            @endif
                        </div>
                        <ul>
                            @foreach($infoManagementFiles->getPosts(7, 1) as $item)
                                <li>
                                    <a href="{{ url('/posts/'.$item->id) }}" title="{{ $item->title }}">
                                        {{ $item->title }}
                                    </a>
                                    <small>({{ substr($item->created_at, 0, 10) }})</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 no-padding">
                <!-- TAB NAVIGATION -->
                <ul class="nav nav-tabs nav-docs" role="tablist">
                    @foreach($docs->subCategories as $item)
                        <li @if($item->id == $docs->subCategories[0]->id)
                            class="active"
                            @endif>
                            <a href="#tab__{{ $item->id }}" role="tab" data-toggle="tab">
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- TAB CONTENT -->
                <div class="tab-content">
                    @foreach($docs->subCategories as $item)
                        <div class="@if($item->id == $docs->subCategories[0]->id)
                                active
                        @endif tab-pane fade in" id="tab__{{ $item->id }}">
                            <ul class="ul-docs">
                                @foreach($item->getFiles(4) as $file)
                                    <li>
                                        <a href="{{ url('/files/'.$file->id) }}" title="{{ $file->title }}">
                                            {{ str_limit($file->title, 80) }}
                                        </a>
                                        <small>({{ substr($file->created_at, 0, 10) }})</small>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{ url('/categories/'.$item->id) }}" class="read-more pull-right">Xem tất cả</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12 banner no-padding">
                <div class="col-sm-6 no-padding">
                    <a href="#">
                        <img src="{{ asset('images/banner1.gif') }}" alt="Banner"
                            class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-6 no-padding">
                    <a href="#">
                        <img src="{{ asset('images/banner2.jpg') }}" alt="Banner"
                            class="img-responsive">
                    </a>
                </div>
            </div>
            <div class="col-sm-12 links no-padding">
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/9595_Tra-loi-y-kien.jpg" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/8486_congbao.png" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/25629_Cong-bo.jpg" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/28239_congbaochinhphu.png" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/19916_khoahoc.png" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/15447_ngcocong.png" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/14373_thongke.png" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/22853_muasamcong.png" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/6552_csdl.png" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/9595_Tra-loi-y-kien.jpg" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/22461_quyhoach.png" alt="Img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#">
                        <img src="http://www.bacgiang.gov.vn//upload/services/9144_qppl.png" alt="Img">
                    </a>
                </div>
            </div>
            <div class="col-sm-12 banner no-padding">
                <div class="col-sm-6 no-padding">
                    <a href="#">
                        <img src="{{ asset('images/banner3.jpg') }}" alt="Banner"
                             class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-6 no-padding">
                    <a href="#">
                        <img src="{{ asset('images/banner4.jpg') }}" alt="Banner"
                             class="img-responsive" height="95">
                    </a>
                </div>
            </div>
            <div class="col-sm-12 no-padding help">
                <div class="panel panel-primary">
                	  <div class="panel-heading">
                			<h3 class="panel-title">{{ $help->title }}</h3>
                	  </div>
                	  <div class="panel-body">
                          @foreach($help->subCategories as $item)
                              <div class="col-sm-4">
                                  <a href="{{ url('/categories/'.$item->id) }}" title="{{ $item->title }}">
                                      {{ $item->title }}
                                  </a>
                              </div>
                          @endforeach
                      </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-11">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h5 class="panel-title">VĂN BẢN VÀ HỒ SƠ ĐIỆN TỬ</h5>
                        </div>
                        <div class="panel-body">
                            <h6 class="text-center">Đến tháng 2/2017 Tỉnh Bắc Giang đã trao đổi</h6>
                            <h2 class="text-center text-danger">343,630</h2>
                            <div class="text-center">
                                <small>văn bản qua mạng giữa 31 đơn vị</small>
                                <br>
                                <small><i>(Tự động cập nhật lúc 00:00 ngày 28/2/2017) </i></small>
                            </div>
                            <hr>
                            <h6 class="text-center">Đến tháng 02/2017 Tỉnh Bắc Giang</h6>
                            <h2 class="text-center text-danger">96%</h2>
                            <div class="text-center">
                                <small>hồ sơ đúng hạn <br>
                                    Đã tiếp nhận: 34337 <br>
                                    Đã giải quyết: 27068 </small>
                                <br>
                                <small><i>(Tự động cập nhật lúc 00:00 ngày 28/2/2017) </i></small>
                            </div>
                        </div>
                    </div>

                    <a href="/ves-portal/c-2408/Chuong-trinh-cong-tac.html" title="3">
                        <img src="http://www.bacgiang.gov.vn//upload/advert/3560_11000_Tra%20loi%20Duong%20day%20nong.jpg" alt="3" style="margin-bottom:3px;"
                             align="left">
                    </a>
                    <a href="/diem-bao/" title="7">
                        <img src="http://www.bacgiang.gov.vn//upload/advert/6807_Ban%20tin%20VP%202.jpg" alt="7"
                             style="margin-bottom:3px;" align="left">
                    </a>
                    <a href="/ves-portal/c-2477/Van-ban-moi.html" title="Văn bản mới - chính sách mới">
                        <img src="http://www.bacgiang.gov.vn//upload/advert/20415_Van%20ban%20php%20luat.jpg" alt="Văn bản mới - chính sách mới"
                             style="margin-bottom:3px;" align="left">
                    </a>
                    <a href="http://www.bacgiang.gov.vn/ves-portal/29236/DUONG-DAY-NONG.html" title="C Đường dây nóng">
                        <img src="http://www.bacgiang.gov.vn//upload/advert/23601_CONGBAO.jpg" alt="C Đường dây nóng"
                             style="margin-bottom:3px;" align="left">
                    </a>
                    <a href="http://www.bacgiang.gov.vn/email/" title="Danh ba dien tu" style="margin-bottom: 20px">
                        <img src="http://www.bacgiang.gov.vn//upload/advert/23707_HQ-copy.jpg" alt="Danh ba dien tu"
                             style="margin-bottom:3px;" align="left">
                    </a>
                    <br>
                    <div class="panel panel-primary" style="margin-top: 20px">
                        <div class="panel-heading">
                            <h5 class="panel-title">{{ $talent->title }}</h5>
                        </div>
                        <div class="panel-body">
                            <ul>
                                @foreach($talent->subCategories as $item)
                                    <li>
                                        <a href="{{ url('/categories/'.$item->id) }}" title="{{ $item->title }}">
                                            {{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="{{ asset('components/jcarousel/lib/jquery.jcarousel.min.js') }}"></script>
    <script type="text/javascript">

        function hrefUrl(url) {
            location.href = url;
        }

        function mycarousel_initCallback(carousel) {
            carousel.buttonNext.bind('click', function () {
                carousel.startAuto(0);
            });
            carousel.buttonPrev.bind('click', function () {
                carousel.startAuto(0);
            });
            carousel.clip.hover(function () {
                carousel.stopAuto();
            }, function () {
                carousel.startAuto();
            });
        }

        jQuery(document).ready(function () {
            jQuery('#mycarousel').jcarousel({
                auto: 2,
                wrap: 'last',
                initCallback: mycarousel_initCallback
            });

            var slider = $('#news-province li');
            var i = 0;
            setInterval(function () {
                var title = $(slider[i]).attr('data-title');
                var url = $(slider[i]).attr('data-url');
                var img = $(slider[i]).attr('data-img');
                i = i++ == slider.length ? 0 : i;

                $('#image-slider a').attr('href', url);
                $('#image-slider div').text(title);
                $('#image-slider img').attr('src', img);
            }, 3000);
        });
    </script>
    <script>
        $('.nav-item').mouseenter(function () {
            $('.sub-navigation').html($('.hidden', this).html());
        });
    </script>
@endsection
