<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
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
    public function update(Request $request,$id){
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'seasons' => 'required|array',
            'seasons.*' => 'string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images','public');
            $product->image = basename($imagePath);
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        $seasonIds = Season::whereIn('name',$request->seasons)->pluck('id')->toArray();
        $product->seasons()->sync($seasonIds);
        return redirect()->route('product.index')->with('success','商品情報を更新しました。');
    }
}
