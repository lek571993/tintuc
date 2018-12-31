@extends('frontend.master')
@section('title', 'Trang chủ')
@section('content')
    @if(count($cate_ele)>0)
        @foreach($new as $item)
            @foreach($item as $ele)
                @if($ele->status == 1)
                    <div class="news">
                        <h1>{!! $ele->title !!}</h1>
                        <img src="{!! url('resources/views/upload/'.$ele->image) !!}" class="thumbs" alt="ảnh"/>
                        <p>{!! $ele->intro !!}</p>
                        <div class="clearfix"></div>
                        <a href="{!! route('user.getDetail', $ele->id) !!}" class="readmore">Đọc thêm</a>
                        <div class="clearfix"></div>
                    </div>
                @endif
            @endforeach
        @endforeach
    @else
        @foreach($new as $item)
            @if($item->status == 1)
                <div class="news">
                    <h1>{!! $item->title !!}</h1>
                    <img src="{!! url('resources/views/upload/'.$item->image) !!}" class="thumbs" alt="ảnh"/>
                    <p>{!! $item->intro !!}</p>
                    <div class="clearfix"></div>
                    <a href="{!! route('user.getDetail', $item->id) !!}" class="readmore">Đọc thêm</a>
                    <div class="clearfix"></div>
                </div>
            @endif
        @endforeach
    @endif
@endsection