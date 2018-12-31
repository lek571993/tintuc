<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Tin tức" />
    <link rel="stylesheet" href="{!! url('public/frontend/templates/css/style.css') !!}" />
    <title>@yield('title')</title>
</head>
<body>
    <div id="layout">
        <div id="top">
            Banner
        </div>
        <div id="topmenu">
            <ul>
                <li><a href="{!! route('user.getIndex') !!}">Trang Chủ</a></li>
                @foreach($cate_parent as $item_parent)
                <li><a href="{!! route('user.getCateNew', $item_parent->id) !!}">{!! $item_parent->name !!}</a>
                    <?php
                        $cate_ele = DB::table('categories')->where('parent_id', $item_parent->id)->get()->toArray();
                    ?>
                    @if(count($cate_ele) > 0)
                        <ul>
                            @foreach($cate_ele as $item_ele)
                            <li><a href="{!! route('user.getCateNew', $item_ele->id) !!}">{!! $item_ele->name !!}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        <div id="content">
            <div id="left">
                <div id="leftmenu">
                    <h1>
                        Menu Chính
                    </h1>
                    <ul>
                        <li><a href="{!! route('user.getIndex') !!}">Trang Chủ</a></li>
                        @foreach($cate_parent as $item_parent)
                            <li><a href="{!! route('user.getCateNew', $item_parent->id) !!}">{!! $item_parent->name !!}</a>
                                <?php
                                $cate_ele = DB::table('categories')->where('parent_id', $item_parent->id)->get()->toArray();
                                ?>
                                @if(count($cate_ele) > 0)
                                    <ul>
                                        @foreach($cate_ele as $item_ele)
                                            <li><a href="{!! route('user.getCateNew', $item_ele->id) !!}">{!! $item_ele->name !!}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="main">
			    @yield('content')
			</div>
            <div class="clearfix"></div>
        </div>
        <div id="bottom">
            Trang tin tức trực tuyến
        </div>
    </div>
</body>
</html>