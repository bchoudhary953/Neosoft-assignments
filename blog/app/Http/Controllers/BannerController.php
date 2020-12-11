<?php

namespace App\Http\Controllers;


use App\Models\Banner;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class BannerController extends Controller
{
    public function banners(){
        $banner = Banner::get();
        return view('Backend.banner.banners')->with(compact('banner'));
    }
    public function index(){
        return view('Backend.banner.addBanners');

    }
    public  function store(Request $request){
        if($request->isMethod('post')){
           $data = request()->validate([
                'banner_name'=>'required',
                'text_style' => 'required',
                'content' => 'required',
                'sort_order' => 'required',
                'link' => 'required',
                'image' => 'required|image|mimes:png,jpg|max:2048',
            ]);

            $data =$request->all();
            $banner = new Banner;
            $banner->name = $data['banner_name'];
            $banner->text_style = $data['text_style'];
            $banner->content = $data['content'];
            $banner->sort_order = $data['sort_order'];
            $banner->link = $data['link'];
           // $banner->image= $data['image'];
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = rand(111,99999).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/banner/');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $banner->image = $name;
            }
            $banner->save();
            return redirect('/banners')->with('status','Banners has been updated successfully!!');
        }
    }
    public function deleteBanners($id){
        Banner::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','Banner Deleted');
    }
    public function editBanners(Request $request, $id){
        if ($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = rand(111, 99999) . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/upload/banner/');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
            }
            else if(!empty($data['current_image'])){
                $fileName= $data['current_image'];
            }
            else{
                $fileName="";
            }
            Banner::where('id',$id)->update([
                'name'=>$data['banner_name'],
                'text_style'=>$data['text_style'],
                'content'=>$data['content'],
                'sort_order'=>$data['sort_order'],
                'link'=>$data['link'],
                'image'=>$fileName,
                ]);
            return redirect('/banners')->with('status','Banner has been edited successful');
        }

        $banner = Banner::where(['id'=>$id])->first();
        return view('Backend.banner.editBanners')->with(compact('banner'));
    }
    public function updateStatus(Request $request, $id=null){
        $data = $request->all();
      // echo "<pre>";print_r($data);die();
        Banner::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
}
