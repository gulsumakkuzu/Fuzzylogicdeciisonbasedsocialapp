<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use App\Notification;
use Illuminate\Support\Str;
use Image;
use Validator;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $loggedUser = Auth::user();
        if($loggedUser->id==$id)
        {
            $friendCount = Friend::where('user_id',$id)->count();
            $my_posts = Post::where('user_id', $loggedUser->id)->get();
            $data = ['user' => $loggedUser,'friendCount' => $friendCount,'posts' => $my_posts];
            return view('profile',$data);
        }
        else if(count(User::find($id))>0)
        {
            $checkFriend = Friend::where('user_id',$loggedUser->id)->where('friend_id',$id)->count();
            $checknotification = Notification::where('user_id',$loggedUser->id)->where('thing_id',$id)->count();
            $friendCount = Friend::where('user_id',$id)->count();
            $data = ['friend' => User::find($id),'user' => $loggedUser,'friendCount' => $friendCount, 'checkFriend' => $checkFriend, 'checkNotification' => $checknotification];
            return view('friend_profile',$data);
        }
        else
        {
            abort(404);
        }
    }

    public function update_profile_photo(Request $request)
    {
            $rules = array(
              'profil' => 'required|mimes:jpeg,jpg,png'
            );
            
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return response()->json(["status" => "error"]);
            }
            
        $user = Auth::user();
        $user_model = User::find($user->id);
        $img = Image::make($request->profil);
        $file_name = $user->id.Str::random(20);
        $img->resize(150,null, function ($constraint) {
            $constraint->aspectRatio();
        });     
        $img->save('assets/images/profile_pictures/150x150/'.$file_name.'.'. $request->file('profil')->extension(), 30);
        $img = Image::make($request->profil);
        $img->resize(950,null, function ($constraint) {
            $constraint->aspectRatio();
        }); 
        $img->save('assets/images/profile_pictures/original/'.$file_name.'.'. $request->file('profil')->extension(), 50);
        $user_model->profile_picture = $file_name.'.'.$request->file('profil')->extension();
        $user_model->save();
        return response()->json(["status" => "success"]);
    }
}
