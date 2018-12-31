<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MainController extends Controller
{
    public function getIndex() {
        $cate = DB::table('categories')->where('parent_id', '<>', 0)->get()->toArray();
//        echo "pre";
//        print_r($cate);
//        echo "</pre>";
//        die();
        return view('frontend.pages.index', compact('cate_parent','cate'));
    }

    public function getDetail($id) {
        $new = DB::table('news')->where('id', $id)->first();
//        echo "pre";
//        print_r($new);
//        echo "</pre>";
//        die();
        return view('frontend.pages.detail', compact('new'));
    }

    public function getCateNew($id) {
        $cate_ele = DB::table('categories')->where('parent_id', $id)->get()->toArray();

        $new = array();
        if (count($cate_ele) > 0) {
            foreach ($cate_ele as $item_ele) {
                $new[] = DB::table('news')->where('cate_id', $item_ele->id)->get()->toArray();
            }
        } else {
                $new = DB::table('news')->where('cate_id', $id)->get()->toArray();
        }
//        echo "pre";
//        print_r($new);
//        echo "</pre>";
//        die();
//        dd($new);

        return view('frontend.pages.cate_new', compact('new','cate_ele'));
    }
}
