@extends('backend.master')
@section('title', 'Sửa thành viên')
@section('top', 'Sửa thành viên')
@section('main')
	<form action="" method="POST" style="width: 650px;">
		@csrf
		<fieldset>
			<legend>Thông Tin User</legend>
			<span class="form_label">Name:</span>
			<span class="form_item">
				<input type="text" name="txtName" class="textbox" value="{!! old('txtName', isset($user) ? $user['name'] : null) !!}"/>
			</span><br />
			<span class="form_label">Username:</span>
			<span class="form_item">
				<input type="text" name="txtUser" class="textbox" value="{!! old('txtUser', isset($user) ? $user['username'] : null) !!}"/>
			</span><br />
			<span class="form_label">Password:</span>
			<span class="form_item">
				<input type="password" name="txtPass" class="textbox" value="{!! old('txtPass', isset($user) ? $user['password'] : null) !!}"/>
			</span><br />
			<span class="form_label">Confirm password:</span>
			<span class="form_item">
				<input type="password" name="txtRepass" class="textbox" value="{!! old('txtRepass', isset($user) ? $user['password'] : null) !!}"/>
			</span><br />
			<span class="form_label">Level:</span>
			<span class="form_item">
				@if(Auth::user()->id == 1)
				<input type="radio" name="rdoLevel" value="1" <?php if ($user['level'] == 1) {echo "checked";} ?>/> Admin
				<input type="radio" name="rdoLevel" value="2" <?php if ($user['level'] == 2) {echo "checked";} ?> /> Member
				@else
					NULL
				@endif
			</span><br />
			<span class="form_label"></span>
			<span class="form_item">
				<input type="submit" name="btnUserEdit" value="Sửa User" class="button" />
			</span>
		</fieldset>
	</form>
@endsection