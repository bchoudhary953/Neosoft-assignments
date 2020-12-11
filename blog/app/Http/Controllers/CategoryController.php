<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $levels = Category::where(['parent_id'=>0])->get();
        return view('Backend.category.addCategory')->with(compact('levels'));
    }
    public function store(Request $request){
        if($request->isMethod('post')) {
            $data = request()->validate([
                'category_name'=>'required',
                'url'=>'required',
                'description'=>'required',
                'parent_id'=>'required',
                
            ]);

            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->url = $data['url'];
            $category->description = $data['description'];
            $category->parent_id = $data['parent_id'];
            $category->save();
            return redirect('/admin/view-categories')->with('status','Category added successfully');
        }
        
    }
    public function viewCategories(){
        $categories = Category::get();
        return view('Backend.category.categories')->with(compact('categories'));
    }
    public function deleteCategory($id){
        Category::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','Category Deleted');
    }
    public function editCategory(Request $request, $id){
        if ($request->isMethod('post')){
            $data = $request->all();
            Category::where('id',$id)->update([
                'name'=>$data['category_name'],
                'parent_id'=>$data['parent_id'],
                'url'=>$data['url'],
                'description'=>$data['description'],
            ]);
            return redirect('/admin/view-categories')->with('status','Category has been edited successful');
        }
        $category = Category::where(['id'=>$id])->first();
        $levels= Category::where(['parent_id'=>0])->get();
        return view('Backend.category.editCategory')->with(compact('levels','category'));
    }
    public function updateStatus(Request $request, $id=null){
        $data = $request->all();
        // echo "<pre>";print_r($data);die();
        Category::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
}
