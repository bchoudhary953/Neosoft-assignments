<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\cms;
use App\Models\Product;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index(){
        return view('Backend.CMS.addCmsPage');
    }
    public function store(Request $request){
        if($request->isMethod('post')){
            $data = request()->validate([
                'title' => 'required',
                'description' => 'required',
                'url' => 'required | unique:cms',
            ]);
            $data = $request->all();
            $cms = new cms;
            $cms->title = $data['title'];
            $cms->description = $data['description'];
            $cms->url = $data['url'];
            $cms->save();
            return redirect('/admin/view-cms-pages')->with(compact('cms'));
        }
        
    }
    public function viewCmsPages(Request $request){
        $cms = cms::get();
        return view('Backend.CMS.viewCmsPages')->with(compact('cms'));
    }
    public function deleteCmsPage(Request $request, $id){
        cms::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','CMS Page Deleted');
    }
    public function editCmsPage(Request $request, $id){
        if ($request->isMethod('post')){
            $data = $request->all();
            cms::where('id',$id)->update([
                'title'=>$data['title'],
                'url'=>$data['url'],
                'description'=>$data['description'],
            ]);
            return redirect('/admin/view-cms-pages')->with('status','CMS page has been edited successful');
        }
        $cms = cms::where('id',$id)->first();
        return view('Backend.CMS.editCmsPage')->with(compact('cms'));
    }
    public function updateStatus(Request $request, $id=null){
        $data = $request->all();
        // echo "<pre>";print_r($data);die();
        cms::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function cmsPage(Request $request,$url){
        $cmsPageCount = cms::where(['url'=>$url,'status'=>1])->count();
        if ($cmsPageCount>0){
            $cmsPage = cms::where('url',$url)->first();
        }else{
            return redirect('/404');
        }
     //   $cmsPage = cms::where('url',$url)->first();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product::get();
        //dd($cmsPage);
        return view('pages.cms_page')->with(compact('cmsPage','categories','products'));
    }
}
