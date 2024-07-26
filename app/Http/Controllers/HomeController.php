<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Console\View\Components\Alert;


class HomeController extends Controller
{
    public function index(){
            if(Auth::id()){
                $usertype = Auth()->user()->usertype; 

                $post = Post::where('post_status','active')->get();
                if($usertype == 'user'){
                    return view('home.homepage',compact('post'));
                }else if($usertype == 'admin'){
                    return view('admin.admin');
                }
                else{
                    return redirect()->back();
                }

            }
    }

    public function homepage(){
        $post = Post::where('post_status','=','active')->get();
        return view('home.homepage',compact('post'));
    }

    public function user_post_create(){
        return view('home.user.post_create');
    }

    public function user_post_store(Request $request){

        $user = Auth()->user(); // get logged in user
        $name = $user->name;
        $user_id = $user->id;
        $usertype = $user->usertype;

       
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);



        $image = $validateData['image'];

        if($image){
        $imageName =  time().'.'.$image->getClientOriginalExtension(); //renaming image name with current timestamp
        $image->move('postimages', $imageName); //uploading image to public/postimages folder

        }
       
        
        $post = new Post();
        $post->title = $validateData['title'];
        $post->description = $validateData['description'];
        $post->image = $imageName;
        $post->name = $name;
        $post->user_id = $user_id;
        $post->post_status = 'pending';
        $post->usertype = $usertype;
        $post->save();
        
       
        return redirect()->back()->with('meesage','Post created successfully');
    }

    public function user_post_show(){
        $user = Auth()->user(); // get logged in user
        $post = Post::where('user_id',$user->id)->get();
        return view('home.user.post_show',compact('post'));
    }

    public function user_post_edit($id){
        $post = Post::find($id);
        return view('home.user.post_update',compact('post'));
    }

    public function user_post_delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

   
   
}