<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\timeCook;
use App\product;

class timeCookController extends Controller
{
    public function getList() {
    	$timeCook = timeCook::all();
    	return view('admin.timeCook.list', ['timeCook'=> $timeCook]);
    }

    public function getEdit($id) {
        $product = product::select('id','ten_sp')->get();
    	$timeCook = timeCook::find($id);
        return view('admin.timeCook.edit',compact('timeCook', 'product'));
    }

    public function postEdit(Request $request, $id) {
        $timeCook = timeCook::find($id);
        $this->validate($request, 
            [
                'name' => 'required|unique:timeCook,t_ten|max:50',
                'idProD' => 'required',
            ], 
            [
                'name.required' => 'Bạn chưa nhập tên món ăn',
                'name.unique' => 'Tên món ăn đã tồn tại',
                'name.max' => 'Tên món ăn phải có tối đa 50 kí tự!',

                'idProD.required' => 'Bạn chưa chọn món ăn',

            ]);

        $timeCook->idProD = $request->idProD;
        $timeCook->t_ten = $request->name;
        $timeCook->t_tenkd = str::slug($request->name);
        $timeCook->save();

        return redirect('admin/timeCook/edit/'.$id)->with('thongbao', 'Sửa thành công.'); 
    }

    public function getInsert() {
        $product = product::all();
    	return view('admin.timeCook.insert',['product'=> $product]);
    }

    public function postInsert(Request $request) {
        // dd($request->all());
    	$this->validate($request, 
    		[
                'name' => 'required|unique:timeCook,t_ten|max:50',
                'idProD' => 'required',
            ], 
            [
                'name.required' => 'Bạn chưa nhập tên món ăn',
                'name.unique' => 'Tên món ăn đã tồn tại',
                'name.max' => 'Tên món ăn phải có tối đa 50 kí tự!',

                'idProD.required' => 'Bạn chưa chọn món ăn',

            ]);
    	$timeCook = new timeCook();
        $timeCook->idProD = $request->idProD;
        $timeCook->t_ten = $request->name;
        $timeCook->t_tenkd = str::slug($request->name);
        $timeCook->save();
        

    	return redirect('admin/timeCook/insert')->with('thongbao', 'Thêm thành công.');
    }

    public function getDelete($id) {
        $timeCook = timeCook::find($id);
        $timeCook->delete();

        return redirect('admin/timeCook/list')->with('thongbao', 'Xóa thành công.');
    }
}
