@extends('backend.master')
@section('title', 'Danh mục các tin tức')
@section('top', 'Danh mục các tin tức')
@section('main')
    <table class="list_table">
        <tr class="list_heading">
            <td class="id_col">STT</td>
            <td>Tên Danh Mục</td>
            <td>Loại Danh Mục</td>
            <td class="action_col">Quản lý</td>
        </tr>
        <?php $stt=0 ?>
        @foreach($cate as $item)
        <?php $stt+=1;  ?>
        <tr class="list_data">
            <td class="aligncenter">{!! $stt !!}</td>
            <td class="list_td alignleft">{!! $item['name'] !!}</td>
            <td>
                <?php
                    $cate_parent = \App\Category::where('id', $item['parent_id'])->first();
                ?>
                @if(!empty($cate_parent))
                    {!! $cate_parent['name'] !!}
                @else
                    NULL
                @endif
            </td>
            <td class="list_td aligncenter">
                <a href="{!! route('admin.cate.getEdit', $item['id']) !!}"><img src="{!! url('public/backend/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
                <a href="{!! route('admin.cate.getDelete', $item['id']) !!}"><img src="{!! url('public/backend/templates/images/delete.png')!!}" /></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection