@extends('frontend.master')
@section('title', 'Trang chủ')
@section('content')
    @foreach($cate as $item_parent)
        <?php
            $cate_ele = DB::table('news')->where('cate_id', $item_parent->id)->get()->toArray();
        ?>
        @foreach($cate_ele as $item_ele)
        <div class="news">
            <h1>{!! $item_ele->title !!}</h1>
            <img src="{!! url('resources/views/upload/'.$item_ele->image) !!}" class="thumbs" />
            <p>{!! $item_ele->intro !!}</p>
            <a href="{!! route('user.getDetail', $item_ele->id) !!}" class="readmore">Đọc thêm</a>
            <div class="clearfix"></div>
        </div>
        @endforeach
    @endforeach
@endsection