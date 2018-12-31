<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\UserRequest;
use App\User;
use Auth, DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getIndex() {
        $users = DB::table('users')->count();
        $cates = DB::table('categories')->count();
        $news = DB::table('news')->count();
        return view('backend.main.index', compact('users','cates','news'));
    }

    public function getList() {
        $user = User::select('id', 'name', 'username', 'level')->get()->toArray();
        return view('backend.user.list', compact('user'));
    }

    public function getAdd() {
        return view('backend.user.add');
    }
    public function postAdd(UserRequest $request) {
        $user = new User();
        $user->name = $request->txtName;
        $user->username = $request->txtUser;
        $user->password = bcrypt($request->txtPass);
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->_token;
        $user->save();

        return redirect()->route('admin.user.getAdd')->with(['flash'=>'Thêm thành công']);
    }

    public function getDelete($id) {
        $user = User::find($id);
        $id_log = Auth::user()->id;
        if ($id_log != 1 && ($id == 1 || $user['level'] == 1)) {
            echo "<script>
                alert('Không được phép xóa');
                window.location = '".route('admin.user.getList')."';
            </script>";
        } else {
            $user->delete($id);
            return redirect()->route('admin.user.getList')->with(['flash'=>'Xóa thành công']);
        }
    }

    public function getEdit($id) {
        $user = User::find($id);
        $id_log = Auth::user()->id;

        if ($id_log != 1 && ($id == 1 || ($id != Auth::user()->id && $user['level'] == 1))) {
            echo "<script>
                alert('Không được phép sửa');
                window.location = '".route('admin.user.getList')."';
            </script>";
        }
        return view('backend.user.edit', compact('user'));
    }
    public function postEdit($id, Request $request) {
        $this->validate($request,[
            'txtUser' => 'required',
            'txtPass' => 'required',
            'txtRepass' => 'required|same:txtPass'
        ], [
            'txtUser.required' => 'Bạn phải nhập vào Username',
            'txtPass.required' => 'Bạn phải nhập vào Password',
            'txtRepass.required' => 'Bạn phải nhập lại Password',
            'txtRepass.same' => 'Password nhập lại chưa khớp',
        ]);
        $user = User::find($id);
        $user->name = $request->txtName;
        $user->username = $request->txtUser;
        $user->password = bcrypt($request->txtPass);
        if (Auth::user()->id == 1) {
            $user->level = $request->rdoLevel;
        } else if(Auth::user()->id != 1 && $user['level'] == 1) {
            $user->level = 1;
        } else {
            $user->level = 2;
        }
        $user->save();
        return redirect()->route('admin.user.getList')->with(['flash'=>'Cập nhật thành công']);
    }
}
