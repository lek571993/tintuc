@extends('backend.master')
@section('title', 'Sửa loại tin tức')
@section('top', 'Sửa loại tin tức')
@section('main')
	<form action="" method="POST" style="width: 650px;">
		@csrf
		<fieldset>
			<legend>Thông Tin Danh Mục</legend>
			<span class="form_label">Danh mục cha:</span>
			<span class="form_item">
				<select name="sltCate" class="select">
					<option value="0">--- Chọn chủ đề ---</option>
					<?php menuMulti($data, 0, "--", $cate['parent_id']); ?>
				</select>
			</span><br />
			<span class="form_label">Tên danh mục:</span>
			<span class="form_item">
				<input type="text" name="txtCateName" class="textbox" required value="{!! old('txtCateName', isset($cate) ? $cate['name'] : null) !!}"/>
			</span><br />
			<span class="form_label"></span>
			<span class="form_item">
				<input type="submit" name="btnCateEdit" value="Sửa danh mục" class="button" />
			</span>
		</fieldset>
	</form>
@endsection