<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

    $category=Category::get(); 
    return view('admin.product', compact('category'));

    }

    public function store(Request $request)
    {
        $product=new Product();
        $product->categories_id=$request->category;
        $product->product=$request->product;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->image = base64_encode(file_get_contents($request->file('file')->path()));
        $product->save();
        
        $stock=new Stock();
        $stock->products_id=$product->id;
        $stock->stock=$request->stock;
        $stock->available_stock=$request->stock;
        $stock->save();
           
        return redirect()->intended('product-list');
    }

    public function show()
    {
        $product = Product::with('categoryData')->get();
        return view('admin.product_list', compact('product'));
    }

    public function edit($id)
    {
        $category=Category::get();
        $edit=Product::find($id);
        return view('admin.product_edit', compact(['edit', 'category']));
    }

    public function update(Request $request)
    {
        $update=Product::find($request->id);
        $update->categories_id=$request->category;
        $update->product=$request->product;
        $update->description=$request->description;
        $update->price=$request->price;
        $update->stock=$request->stock;

        if($request->hasFile('file')){
            $update->image = base64_encode(file_get_contents($request->file('file')->path()));
        }
        $update->update();
        return redirect()->intended('product-list');

    }
    public function delete($id)
    {
        $delete=Product::find($id);
        $delete->delete();
        return redirect()->intended('product-list');
    }
    public function home(){
        $category= Category::get();
        $product = Product::get();
        return view('front.home', compact(['product', 'category']));
    }

    public function productView(){
         return view('admin.productData');
    }

    public function getProduct(Request $request)
    { 
        if ($request->ajax()) {
            $data = Product::with('categoryData', 'productData')->get();
            // return $data;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<td><a href="product-edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="product-delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a></td>';
                    return $actionBtn;
                })
                ->addColumn('image', function($key){
                    $actionBtn  = '<td><img src="data:image/png/jpg/jpeg;base64,'.$key->image.'" alt=""  width="60px" height="60px"/></td>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
    }
    // public function all(){

    // $data=DB::table('products')->join('categories', 'categories.id', '=', 'products.categories_id')->join('stocks', 'products.id', '=', 'stocks.products_id')->get();
    // $data = Product::with('categoryData', 'productData')->get();
    // dd($data);
    // }
}
