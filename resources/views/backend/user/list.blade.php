@extends('backend.master')
@section('title', 'Danh sách thành viên')
@section('top', 'Danh sách thành viên')
@section('main')
    <table class="list_table">
        <tr class="list_heading">
            <td class="id_col">STT</td>
            <td>Username</td>
            <td>Level</td>
            <td class="action_col">Quản lý?</td>
        </tr>
        <?php $stt=0; ?>
        @foreach($user as $us)
        <?php $stt+=1; ?>
        <tr class="list_data">
            <td class="aligncenter">{!! $stt !!}</td>
            <td class="list_td aligncenter">{!! $us['username'] !!}</td>
            <td class="list_td aligncenter"><span style="color: <?php if ($us['id'] == 1 && $us['level'] == 1) {echo "yellow";} else if ($us['level'] == 1) {echo "red";} else {echo "blue";} ?>; font-weight: bold;">
                @if($us['id'] == 1 && $us['level'] == 1)
                    Super Admin
                @elseif($us['level'] == 1)
                        Admin
                @else
                    Member
                @endif
            </span></td>
            <td class="list_td aligncenter">
                <a href="{!! route('admin.user.getEdit', $us['id']) !!}"><img src="{!! url('public/backend/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!! route('admin.user.getDelete', $us['id']) !!}"><img src="{!! url('public/backend/templates/images/delete.png') !!}" /></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection