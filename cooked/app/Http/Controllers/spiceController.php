<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\spice;
use App\product;

class spiceController extends Controller
{
    public function getList() {
    	$spice = spice::all();
    	return view('admin.spice.list', ['spice'=> $spice]);
    }

    public function getEdit($id) {
        $product = product::select('id','ten_sp')->get();
    	$spice = spice::find($id);
        return view('admin.spice.edit',compact('spice', 'product'));
    }

    public function postEdit(Request $request, $id) {
        $spice = spice::find($id);
        $this->validate($request, 
            [
                'name' => 'required|unique:spice,s_ten|min:2|max:50',
                'idPD' => 'required',
            ], 
            [
                'name.required' => 'Bạn chưa nhập tên món ăn',
                'name.unique' => 'Tên món ăn đã tồn tại',
                'name.min' => 'Tên món ăn phải có tối thiểu 2 kí tự!',
                'name.max' => 'Tên món ăn phải có tối đa 50 kí tự!',

                'idPD.required' => 'Bạn chưa chọn món ăn',

            ]);

        $spice->idPD = $request->idPD;
        $spice->s_ten = $request->name;
        $spice->s_tenkd = str::slug($request->name);
        $spice->save();

        return redirect('admin/spice/edit/'.$id)->with('thongbao', 'Sửa thành công.'); 
    }

    public function getInsert() {
        $product = product::all();
    	return view('admin.spice.insert',['product'=> $product]);
    }

    public function postInsert(Request $request) {
        // dd($request->all());
    	$this->validate($request, 
    		[
                'name' => 'required|unique:spice,s_ten|min:2|max:50',
                'idPD' => 'required',
            ], 
            [
                'name.required' => 'Bạn chưa nhập tên món ăn',
                'name.unique' => 'Tên món ăn đã tồn tại',
                'name.min' => 'Tên món ăn phải có tối thiểu 2 kí tự!',
                'name.max' => 'Tên món ăn phải có tối đa 50 kí tự!',

                'idPD.required' => 'Bạn chưa chọn món ăn',

            ]);
    	$spice = new spice();
        $spice->idPD = $request->idPD;
        $spice->s_ten = $request->name;
        $spice->s_tenkd = str::slug($request->name);
        $spice->save();
        

    	return redirect('admin/spice/insert')->with('thongbao', 'Thêm thành công.');
    }

    public function getDelete($id) {
        $spice = spice::find($id);
        $spice->delete();

        return redirect('admin/spice/list')->with('thongbao', 'Xóa thành công.');
    }
}
