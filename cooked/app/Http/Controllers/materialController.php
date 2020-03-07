<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\material;
use App\product;

class materialController extends Controller
{
    public function getList() {
    	$material = material::all();
    	return view('admin.material.list', ['material'=>$material]);
    }

    public function getEdit($id) {
        $product = product::select('id','ten_sp')->get();
    	$material = material::find($id);
        return view('admin.material.edit',compact('material', 'product'));
    }

    public function postEdit(Request $request, $id) {
        $material = material::find($id);
        $this->validate($request, 
            [
                'name' => 'required|unique:material,r_ten|min:2|max:50',
                'idProduct' => 'required',
            ], 
            [
                'name.required' => 'Bạn chưa nhập tên món ăn',
                'name.unique' => 'Tên món ăn đã tồn tại',
                'name.min' => 'Tên món ăn phải có tối thiểu 2 kí tự!',
                'name.max' => 'Tên món ăn phải có tối đa 50 kí tự!',

                'idProduct.required' => 'Bạn chưa chọn món ăn',

            ]);

        $material->idProduct = $request->idProduct;
        $material->r_ten = $request->name;
        $material->r_tenkd = str::slug($request->name);
        $material->save();

        return redirect('admin/material/edit/'.$id)->with('thongbao', 'Sửa thành công.'); 
    }

    public function getInsert() {
        $product = product::all();
    	return view('admin.material.insert',['product'=>$product]);
    }

    public function postInsert(Request $request) {
        // dd($request->all());
    	$this->validate($request, 
    		[
                'name' => 'required|unique:material,r_ten|min:2|max:50',
                'idProduct' => 'required',
            ], 
            [
                'name.required' => 'Bạn chưa nhập tên món ăn',
                'name.unique' => 'Tên món ăn đã tồn tại',
                'name.min' => 'Tên món ăn phải có tối thiểu 2 kí tự!',
                'name.max' => 'Tên món ăn phải có tối đa 50 kí tự!',

                'idProduct.required' => 'Bạn chưa chọn loại món ăn',

            ]);
    	$material = new material();
        $material->idProduct = $request->idProduct;
        $material->r_ten = $request->name;
        $material->r_tenkd = str::slug($request->name);
        $material->save();
        

    	return redirect('admin/material/insert')->with('thongbao', 'Thêm thành công.');
    }

    public function getDelete($id) {
        $material = material::find($id);
        $material->delete();

        return redirect('admin/material/list')->with('thongbao', 'Xóa thành công.');
    }
}
