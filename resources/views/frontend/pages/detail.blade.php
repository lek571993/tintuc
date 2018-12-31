@extends('frontend.master')
@section('title', 'Thể loại')
@section('content')
    <div class="news">
        <h1>{!! $new->title !!}</h1>
        <img src="{!! url('resources/views/upload/'.$new->image) !!}" class="thumbs" />
        <p>
            <i><b>Danh mục</b>: <a href="">Tin tức</a><br />
            <b>Nguồn</b>: VnExpress<br />
            <b>Viết bởi</b>: {!! $new->author !!}<br />
            <b>Ngày viết</b>: {!! date('d/m/Y') !!}</i>
        </p>
        <p style="clear: both;">
            <b>{!! $new->intro !!}</b>
        </p>
        <p>
            <div class="fck_detail width_common">
                <p>{!! $new->full !!}</p>
                <p class="Normal" style="text-align:right;"><strong>{!! $new->author !!}</strong></p>
            </div>
    </div>
@endsection