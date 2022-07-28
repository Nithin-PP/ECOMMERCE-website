<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category');
    }
    public function store(Request $request)
    {
        $category=new Category();
        $category->category=$request->category;
        $category->description=$request->description;
        $category->save();
        return redirect('category-list');
    }

    public function show(Category $category)
    {
        $category=Category::get();
        return view('admin.category_list', compact('category'));
    }

    public function edit($id)
    {
        $edit=Category::find($id);
        return view('admin.category_edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $ids=$request->id;
        $update=Category::find($ids);
        $update->category=$request->category;
        $update->description=$request->description;
        $update->update();
        return redirect()->intended('category-list');
    }

    public function delete($id)
    {
        $delete=Category::find($id);
        $delete->delete();
        return redirect()->back();
    }


    
    public function categoryView (){

        return view('admin.categoryData');
    }

    public function getCategory(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<td><a href="category-edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="category-delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a></td>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


}
