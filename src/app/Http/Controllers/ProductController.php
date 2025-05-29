<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(6);
        $keyword = null;
        $sort = null;
        return view('products',compact('products','keyword','sort'));
    }
    public function search(Request $request){
        $keyword = $request->input('name');
        $sort = $request->input('sort');
        $query = Product::query();
        if (!empty($keyword)){
            $query->where('name','like','%'.$keyword.'%');
        }
        if ($sort === 'high'){
            $query->orderBy('price','desc');
        }elseif ($sort === 'low'){
            $query->orderBy('price','asc');
        }
        $products = $query->paginate(6)->appends($request->all());
        return view('products',compact('products','keyword','sort'));
    }
    public function show($id){
        $product = Product::with('seasons')->findOrFail($id);
        return view('detail',compact('product'));
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success','商品を削除しました。');
    }
}
