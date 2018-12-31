<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Area :: @yield('title')</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Quản trị trang tin" />
    <link rel="stylesheet" href="{!! url('public/backend/templates/css/style.css') !!}" />
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>

</head>

<body>
<div id="layout">
    <div id="top">
        Admin Area :: @yield('top')
    </div>
    <div id="menu">
        <table width="100%">
            <tr>
                <td>
                    <a href="{!! route('admin.index') !!}">Trang chính</a> | <a href="{!! route('admin.user.getList') !!}">Quản lý user</a> | <a href="{!! route('admin.cate.getList') !!}">Quản lý danh mục</a> | <a href="{!! route('admin.news.getList') !!}">Quản lý tin</a>
                </td>
                <td align="right">
                    Xin chào {!! Auth::user()->username !!} | <a href="{!! route('admin.getLogout') !!}">Logout</a>
                </td>
            </tr>
        </table>
    </div>
    <div id="main">
        @include('backend.block.error')
        @include('backend.block.flash')
        @yield('main')
    </div>
    <div id="bottom">
        Quản Lý Website Tin Tức
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="{!! url('public/backend/templates/myscript/myscript.js') !!}"></script>
</body>
</html>