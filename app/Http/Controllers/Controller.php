<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function home(Request $request){
        $search=$request->input("search");

        if($search==null){
            $images=Image::all();
            return view("Home",compact("images"));
        }else{


            $images=DB::table('images')
                ->select('*')
                ->where('name', '=',$search)->get();
            return view("Home",compact("images"));
        }

    }
    public function myImages(Request $request){
        $search=$request->input("search");
        $id = Auth::id();
        if($search==null){

            $images=DB::table('images')
                ->select('*')
                ->where('userId', '=',$id)->get();
            return view("MyImages",compact("images"));
        }else{
            $images=DB::table('images')
                ->select('*')
                ->where('userId', '=',$id)
                ->where('name', '=',$search)
                ->get();
            return view("MyImages",compact("images"));
        }

    }

    public function getAdd(){

        $this->middleware('auth');
            return view("AddImage");

    }
    public function postAdd(Request $request){
           // dd($request->all());
            if ($request->hasFile('Image')) {
                $file = $request->Image;
                $new_file = time() . $file->getClientOriginalName();
                $file->move('storage/images', $new_file);
            }

            // Get the currently authenticated user's ID...
            $id = Auth::id();

            Image::create(["name" => $request->name
                , "image" => 'storage/images/' . $new_file,
                "userId" => $id]);


        return redirect()->route('getmyImages');

    }

    public function getUpdate(Request $request){
        $img=Image::find($request->input('id'));

        return view("UpdateImage",compact("img"));
    }
    public function postUpdate(Request $request){
        $img=Image::find($request->input('id'));
        if ($request->hasFile('Image')) {
            $file = $request->Image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/images', $new_file);
            $img->image='storage/images/'. $new_file;
        }

        $img->name=$request->name;
        $img->userId=$request->userId;

        $img->update();
        return redirect()->route('getmyImages');
    }

    public function getDelete($id){
        $image=Image::find($id);
        $image->destroy($id);

        return redirect()->route('getmyImages');
    }


}
