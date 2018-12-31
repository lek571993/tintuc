@extends('backend.master')
@section('title', 'Sửa tin tức')
@section('top', 'Sửa tin tức')
@section('main')
		<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
			@csrf
			<fieldset>
				<legend>Thông Tin Bản Tin</legend>
				<span class="form_label">Tên danh mục:</span>
				<span class="form_item">
					<select name="sltCate" class="select">
						<?php menuMulti($data, 0, "--", $new['cate_id']); ?>
					</select>
				</span><br />
				<span class="form_label">Tiêu đề tin:</span>
				<span class="form_item">
					<input type="text" name="txtTitle" class="textbox" value="{!! old('txtTitle', isset($new) ? $new['title'] : null) !!}"/>
				</span><br />
				<span class="form_label">Tác gỉả:</span>
				<span class="form_item">
					<input type="text" name="txtAuthor" class="textbox" value="{!! old('txtAuthor', isset($new) ? $new['author'] : null) !!}"/>
				</span><br />
				<span class="form_label">Trích dẫn:</span>
				<span class="form_item">
					<textarea name="txtIntro" rows="5" class="textbox">{!! old('txtIntro', isset($new) ? $new['intro'] : null) !!}</textarea>
				</span><br />
				<span class="form_label">Nội dung tin:</span>
				<span class="form_item">
					<textarea name="txtFull" rows="8" class="textbox">{!! old('txtFull', isset($new) ? $new['full'] : null) !!}</textarea>
				</span><br />
				<span class="form_label">Hình hiện tại:</span>
				<span class="form_item">
					<img src="{!! url('resources/views/upload/'.$new['image']) !!}" width="100px" />
				</span><br />
				<span class="form_label">Hình đại diện:</span>
				<span class="form_item">
					<input type="file" name="newsImg" class="textbox" />
				</span><br />
				<span class="form_label">Công bố tin:</span>
				<span class="form_item">
					<input type="radio" name="rdoPublic" value="1" checked="checked" /> Có
					<input type="radio" name="rdoPublic" value="0" /> Không
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnNewsEdit" value="Sửa tin" class="button" />
				</span>
			</fieldset>
		</form>
@endsection