@extends('backend.master')
@section('title', 'Trang chủ')
@section('top', 'Trang chủ')
@section('main')
	<table class="function_table" style="margin: 0px auto;">
		<tr>
			<td class="function_item user_add"><a href="{!! route('admin.user.getAdd') !!}">Thêm user</a></td>
			<td class="function_item user_list"><a href="{!! route('admin.user.getList') !!}">Quản lý user</a></td>
			<td rowspan="3" class="statistics_panel">
				<h3>Thống kê:</h3>
				<ul>
					<li>Tổng số user: {!! $users !!}</li>
					<li>Tổng số danh mục: {!! $cates !!}</li>
					<li>Tổng số tin: {!! $news !!}</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td class="function_item cate_add"><a href="{!! route('admin.cate.getAdd') !!}">Thêm danh mục</a></td>
			<td class="function_item cate_list"><a href="{!! route('admin.cate.getList') !!}">Quản lý danh mục</a></td>
		</tr>
		<tr>
			<td class="function_item news_add"><a href="{!! route('admin.news.getAdd') !!}">Thêm tin</a></td>
			<td class="function_item news_list"><a href="{!! route('admin.news.getList') !!}">Quản lý tin</a></td>
		</tr>
	</table>
@endsection