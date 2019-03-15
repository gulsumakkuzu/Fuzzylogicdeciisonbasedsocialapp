<?php

namespace App\Http\Controllers;

use App\User;
use App\Friend;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function feed()
    {
        $user = Auth::user();
        $array_users = array();
        array_push($array_users,$user->id);

        foreach (Friend::where('user_id',$user->id)->get() as $friend) 
        {
            array_push($array_users,$friend->friend_id);
        }
        
        $posts = DB::table('posts')->OrderBy('id','desc')->whereIn('user_id',$array_users)->get();
        $data = ['user' => Auth::user(), 'posts' => $posts];
        return view('feed',$data);
    }

    public function search(Request $request)
    {
        if(!$request->has('q') || !$request->filled('q'))
            return response()->json(['message' => 'Error']); 
        $query = explode(" ", $request->input('q'));
        if(count($query)==1)
            $data = User::where('first_name','like',$query[0].'%')->get(['first_name','last_name','id']);
        else if(count($query)==2) {
            $data = User::where('first_name','like',$query[0].'%')->where('last_name','like',@$query[1].'%')->get(['first_name','last_name','id']);
        }
        else if(count($query)==3) 
        {
            $data = User::where('first_name','like',$query[0].'%')->where('last_name','like',@$query[1]." ".@$query[2].'%')->get(['first_name','last_name','id','profile_picture']);
        }
        return response()->json(['data' => $data]); 
    }

    public function searchView(Request $request)
    {
        if(!$request->has('q') || !$request->filled('q'))
           abort(404);
        
        $query = explode(" ", $request->input('q'));
        if(count($query)==1)
        {
            $data = User::where('first_name','like',$query[0].'%')->paginate(10);
        }
        else if(count($query)==2) 
        {
            $data = User::where('first_name','like',$query[0].'%')->where('last_name','like',@$query[1].'%')->paginate(10);
        }
        else if(count($query)==3) 
        {
            $data = User::where('first_name','like',$query[0].'%')->where('last_name','like',@$query[1]." ".@$query[2].'%')->paginate(10);
        }
        $userId = Auth::user()->id;
        $notification = new Notification;
        $notification->where('user_id',$userId);
        $friend = new Friend;
        $friend->where('user_id',$userId);
        $data = ['user' => Auth::user(),'data' => $data, 'friend' => $friend, 'notification' => $notification];
        return view('searchView',$data);
    }
}
