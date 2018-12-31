<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Http\Requests\NewsRequest;
use App\News;
use Auth, File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getList() {
        $news = News::select('id', 'title', 'author', 'cate_id', 'created_at')->get()->toArray();
        return view('backend.news.list', compact('news'));
    }

    public function getAdd() {
        $data = Category::select('id', 'name', 'parent_id')->get()->toArray();
        return view('backend.news.add', compact('data'));
    }
    public function postAdd(NewsRequest $request) {
        $new = new News();
        $new->title = $request->txtTitle;
        $new->author = $request->txtAuthor;
        $new->intro = $request->txtIntro;
        $new->full = $request->txtFull;
        $new->status = $request->rdoPublic;
        $new->cate_id = $request->sltCate;
        $new->user_id = Auth::user()->id;
        $file_name = $request->file('newsImg')->getClientOriginalName();
        $new->image = $file_name;
        $request->file('newsImg')->move('resources/views/upload/', $file_name);
        $new->save();

        return redirect()->route('admin.news.getAdd')->with(['flash'=>'Thêm thành công']);
    }

    public function getDelete($id) {
        $new_del = News::find($id);
        $file_img = 'resources/views/upload/'.$new_del['image'];
        if (File::exists($file_img)) {
            File::delete($file_img);
        }
        $new_del->delete($id);

        return redirect()->route('admin.news.getList')->with(['flash'=>'Xóa thành công']);
    }

    public function getEdit($id) {
        $data = Category::select('id', 'name', 'parent_id')->get()->toArray();
        $new = News::find($id);
        return view('backend.news.edit', compact('new','data'));
    }
    public function postEdit($id, Request $request) {
        $this->validate($request, [
            'txtTitle' => 'required',
            'txtAuthor' => 'required',
            'txtIntro' => 'required',
            'txtFull' => 'required',
        ], [
            'txtTitle.required' => 'Bạn phải nhập vào chủ đề',
            'txtAuthor.required' => 'Bạn phải nhập vào tác giả',
            'txtIntro.required' => 'Bạn chưa nhập vào trích dẫn',
            'txtFull.required' => 'Vui lòng nhập vào nội dung đầy đủ',
        ]);

        $new = News::find($id);
        $new->title = $request->txtTitle;
        $new->author = $request->txtAuthor;
        $new->intro = $request->txtIntro;
        $new->full = $request->txtFull;
        $new->status = $request->rdoPublic;
        $new->cate_id = $request->sltCate;
        $new->user_id = Auth::user()->id;

        $img_current = 'resources/views/upload/'.$new['image'];
        if (!empty($request->file('newsImg'))) {
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
            $file_img = $request->file('newsImg')->getClientOriginalName();
            $new->image = $file_img;
            $request->file('newsImg')->move('resources/views/upload/', $file_img);
        }
        $new->save();

        return redirect()->route('admin.news.getList')->with(['flash'=>'Cập nhật thành công']);
    }

}
