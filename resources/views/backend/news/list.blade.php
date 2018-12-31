@extends('backend.master')
@section('title', 'Danh sách tin tức')
@section('top', 'Danh sách tin tức')
@section('main')
    <table class="list_table">
        <tr class="list_heading">
            <td class="id_col">STT</td>
            <td>Tiêu Đề</td>
            <td>Tác Giả</td>
            <td>Danh mục</td>
            <td>Thời Gian</td>
            <td class="action_col">Quản lý?</td>
        </tr>

        @foreach($news as $new)
        <tr class="list_data">
            <td class="aligncenter">1</td>
            <td class="list_td aligncenter">{!! $new['title'] !!}</td>
            <td class="list_td aligncenter">{!! $new['author'] !!}</td>
            <td class="list_td aligncenter">
                <?php
                    $cate = DB::table('categories')->where('id', $new['cate_id'])->first();
                ?>
                {!! $cate->name; !!}
            </td>
            <td class="list_td aligncenter">
                {!! \Carbon\Carbon::createFromTimestamp(strtotime($new['created_at']))->diffForHumans() !!}
            </td>
            <td class="list_td aligncenter">
                <a href="{!! route('admin.news.getEdit', $new['id']) !!}"><img src="{!! url('public/backend/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!! route('admin.news.getDelete', $new['id']) !!}"><img src="{!! url('public/backend/templates/images/delete.png') !!}" /></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection