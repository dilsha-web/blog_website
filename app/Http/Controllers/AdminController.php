<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post(){
        return view('admin.post');
    }

    public function post_create(Request $request){

      $user =   Auth()->user(); /*** get logged in user */
        $user_id = $user->id; /*** get logged in user id */
        $name = $user->name; /*** get logged in user name */
        $usertype = $user->usertype; /*** get logged in user usertype */
      
    $validatedData = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $post = new Post();
    $post->title = $validatedData['title'];
    $post->description =$validatedData['description'];

    /*upload image*/
    $image = $validatedData['image'];

    if($image){
        $imageName = time().'.'.$image->getClientOriginalExtension(); //renaming image name with current timestamp
        $image->move('postimages', $imageName); //uploading image to public/postimages folder
        $post->image = $imageName;
    }
    $post->name = $name;
    $post->user_id = $user_id;
    $post->post_status = 'active';
    $post->usertype = $usertype;

    $post->save();
    return redirect()->back()->with('meesage','Post added successfully');
        
    }

    public function post_show(){
        $post = Post::all();
       return view('admin.post_show',compact('post'));
    }

    public function post_delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('meesage','Post deleted successfully');
    }

    public function post_edit($id){

        $post = Post::find($id);
        return view('admin.post_update',compact('post')); 
    }

    public function post_update(Request $request,$id){
        
        
        // $validatedData = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $post  = Post::find($id);

        $post->title = $request->title;
        $post->description = $request->description;

        // /*upload image*/
        $image = $request->image;

        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension(); //renaming image name with current timestamp
            $image->move('postimages', $imageName); //uploading image to public/postimages folder
            $post->image = $imageName;
        }
        $post->save();
        return redirect()->back()->with('meesage','Post updated successfully');
    }

    public function post_details($id){
        $post = Post::find($id);
        return view('admin.post_details',compact('post'));
    }
}