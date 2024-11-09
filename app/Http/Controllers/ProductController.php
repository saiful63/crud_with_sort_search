<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function allProduct(Request $request){
        $search =  $request->input('search');
        $sort = $request->input('sort');
        if($search){
            $products = Product::where('description','like',$search)
                                 ->orWhere('product_id', 'like', $search)
                                 ->paginate('3');
        }elseif($sort){
            $order = 'asc';
            $field='name';
            if($sort =='Sort Name A-Z'){
                $order='asc';
                $field = 'name';
            }
            elseif($sort=='Sort Name Z-A'){
                $order = 'desc';
                $field = 'name';
            }
            elseif($sort == 'Sort Price Low-High'){
                $order = 'asc';
                $field = 'price';
            }
            elseif($sort == 'Sort Price High-Low'){
                $order='desc';
                $field = 'price';
            }


            $products = Product::orderBy($field,$order)->paginate('3');
        }
        else{
            $products=Product::paginate('3');
        }

        return view('pages.index',['products'=>$products]);
    }

    function productForm(){
        return view('pages.create');
    }

    function storeProduct(Request $request){

        $request->validate([
            'product_id'=>'required|unique:products,product_id',
            'name'=>'required',
            'price'=>'required'
        ]);
       Product::insert([
        'product_id'=>$request->input('product_id'),
        'name'=>$request->input('name'),
        'description' => $request->input('description'),
        'stock' => $request->input('stock'),
        'price' => $request->input('price'),
        'image' => $request->file('image')->getClientOriginalName()
       ]);

       $fileName = $request->file('image')->getClientOriginalName();
       $destination = public_path('image');
       $request->file('image')->move($destination,$fileName);


       Toastr::success('Product inserted');
       return redirect('products/create');
    }

    function showProduct($id){
        $product = Product::find($id);
        return view('pages.show', ['product' => $product]);
    }
    function editProduct($id){
        $product = Product::find($id);
        return view('pages.edit',['product'=>$product]);
    }

    function updateProduct(Request $request,$id)
    {
        //return $request->input('prev_image');
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'price' => 'required'
        ]);
        $product = Product::find($id);

        $product->update([
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),

        ]);

        if($request->file('image')){
            $product->update([
                'image' => $request->file('image')->getClientOriginalName()

            ]);


            if ($request->file('image')->getClientOriginalName() != $request->input('prev_image')) {
                unlink(public_path('image/' . $request->input('prev_image')));

                $fileName = $request->file('image')->getClientOriginalName();
                $destination = public_path('image/');
                $request->file('image')->move($destination, $fileName);
            }else{
                $fileName = $request->file('image')->getClientOriginalName();
                $destination = public_path('image');
                $request->file('image')->move($destination, $fileName);
            }
        }






        Toastr::success('Product updated');
        return redirect('products');
    }

    function deleteProduct($id){
       Product::destroy($id);
       Toastr::success('Product deleted');
       return redirect('products');
    }
}
