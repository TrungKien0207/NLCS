<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\product;
use App\category;

class productController extends Controller
{
    public function getList() {
    	$product = product::all();
    	return view('admin.product.list', ['product'=>$product]);
    }

    public function getEdit($id) {
        $category = category::select('id','c_ten')->get();
    	$product = product::find($id);
        return view('admin.product.edit',compact('product', 'category'));
    }

    public function postEdit(Request $request, $id) {
        $product = product::find($id);
        $this->validate($request, 
            [
                'name' => 'required|unique:product,ten_sp|min:2|max:50',
                'idCategory' => 'required',
                'content' => 'required|unique:product,content',
                'img' => 'required|unique:product,anh_sp',
            ], 
            [
                'name.required' => 'Bạn chưa nhập tên món ăn',
                'name.unique' => 'Tên món ăn đã tồn tại',
                'name.min' => 'Tên món ăn phải có tối thiểu 2 kí tự!',
                'name.max' => 'Tên món ăn phải có tối đa 50 kí tự!',

                'idCategory.required' => 'Bạn chưa chọn loại món ăn',

                'content.required' => 'Bạn chưa nhập nội dung.',
                'content.unique' => 'Nội dung món ăn đã tồn tại',

                'img.required' => 'Bạn chưa chọn hình ảnh',
                'img.unique' => 'Hình ảnh đã tồn tại',

            ]);

        $product->idCategory = $request->idCategory;
        $product->ten_sp = $request->name;
        $product->anh_sp = $request->img;
        $product->content = $request->content;
        $product->tenkd = str::slug($request->name);
        $product->save();

        return redirect('admin/product/edit/'.$id)->with('thongbao', 'Sửa thành công.'); 
    }

    public function getInsert() {
        $category = category::select('id','c_ten')->get();
    	return view('admin.product.insert',compact('category'));
    }

    public function postInsert(Request $request) {
    	$this->validate($request, 
    		[
                'name' => 'required|unique:product,ten_sp|min:2|max:50',
                'idCategory' => 'required',
                'content' => 'required|unique:product,content',
                'img' => 'required|unique:product,anh_sp',
            ], 
            [
                'name.required' => 'Bạn chưa nhập tên món ăn',
                'name.unique' => 'Tên món ăn đã tồn tại',
                'name.min' => 'Tên món ăn phải có tối thiểu 2 kí tự!',
                'name.max' => 'Tên món ăn phải có tối đa 50 kí tự!',

                'idCategory.required' => 'Bạn chưa chọn loại món ăn',

                'content.required' => 'Bạn chưa nhập nội dung.',
                'content.unique' => 'Nội dung món ăn đã tồn tại',

                'img.required' => 'Bạn chưa chọn hình ảnh',
                'img.unique' => 'Hình ảnh đã tồn tại',

            ]);

    	$product = new product;
        $product->idCategory = $request->idCategory;
    	$product->ten_sp = $request->name;
        $product->anh_sp = $request->img;
        $product->content = $request->content;
    	$product->tenkd = str::slug($request->name);
    	$product->save();

    	return redirect('admin/product/insert')->with('thongbao', 'Thêm thành công.');
    }

    public function getDelete($id) {
        $product = product::find($id);
        $product->delete();

        return redirect('admin/product/list')->with('thongbao', 'Xóa thành công.');
    }
}
