<?php

namespace App\Http\Controllers\backend;

use App\Cate;
use App\Category;
use App\Http\Requests\CateRequest;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class CateController extends Controller
{
    public function getList() {
        $cate = Category::select('id', 'name', 'slug', 'parent_id')->get()->toArray();
        return view('backend.cate.list', compact('cate'));
    }

    public function getAdd() {
        $data = Category::select('id', 'name', 'parent_id')->get()->toArray();
        return view('backend.cate.add', compact('data'));
    }
    public function postAdd(CateRequest $request) {
        $cate = new Category();
        $cate->name = $request->txtCateName;
        $cate->slug = str_slug($request->txtCateName, '-');
        $cate->parent_id = $request->sltCate;
        $cate->save();

        return redirect()->route('admin.cate.getAdd')->with(['flash'=>'Thêm thành công']);
    }

    public function getDelete($id) {
        $parent = Category::where('parent_id', $id)->count();
        if ($parent == 0) {
            $new_del = News::where('cate_id', $id)->get()->toArray();
//            echo "<pre>";
//            print_r($new_del);
//            echo "</pre>";
//            die();
            foreach ($new_del as $item) {
                $id_item = $item['id'];
                $new = News::find($id_item);
                $file_img = 'resources/views/upload/'.$item['image'];
                if (File::exists($file_img)) {
                    File::delete($file_img);
                }
                $new->delete($id_item);
            }

            $ele = Category::find($id);
            $ele->delete($id);
            return redirect()->route('admin.cate.getList')->with(['flash'=>'Xóa thành công']);
        } else {

            echo "<script>
            alert('Bạn không được phép xóa');
            window.location = '".route('admin.cate.getList')."';
            </script>";
        }

    }

    public function getEdit($id) {
        $data = Category::select('id', 'name', 'parent_id')->get()->toArray();
        $cate = Category::find($id);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
//        die();
        return view('backend.cate.edit', compact('data', 'cate'));
    }
    public function postEdit($id, Request $request) {
        $cate_edt = Category::find($id);
        $cate_edt->name = $request->txtCateName;
        $cate_edt->slug = str_slug($request->txtCateName);
        $cate_edt->parent_id = $request->sltCate;
        $cate_edt->save();

        return redirect()->route('admin.cate.getList')->with(['flash'=>'Cập nhật thành công']);
    }
}
