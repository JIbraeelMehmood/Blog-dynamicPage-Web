<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Addfriend;
use DB;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
      public function __construct() 
      {
        $this->middleware('auth');
      }


      public function index(Request $request) 
      {
        $userid = $request->user()->id;
        #$name = $request->user()->name;
        //---------------------------
        //$userid = Auth::user()->id; 
        #$name = Auth::user()->name; 
        //---------------------------
        $posts= Post::where('user_id',$userid)->get();
        //$alldenyposts= Post::where('user_id',$userid)->whereNotNull('deleted_at')->get();
        //$alldenyposts= Post::where('user_id',$userid)->whereNull('deleted_at')->get();
        $alldenyposts=Post::onlyTrashed()->get(); // only get users who are trashed
        $data=json_decode($alldenyposts);

        if ($data) 
          {
            foreach( $data as $key=> $value)
            { 
              notify()->info(' Your Blog '.$value->title.' Deny ' , ' Blog Update ');
            }
          }
        //print_r($posts);
        //print_r(json_decode($posts));
        #$data=json_decode($posts);
        #print_r($data[0]->deleted_at);
        #exit();
        return view('Dashboards.User',['posts'=>$posts]);
      }
//======================================================================

      public function addFriend($id)
        {
            $data = Crypt::decrypt($id);
            $user_requested = Auth::user()->id; 
            $acceptor = $data;
            $addfriend = new Addfriend; 
            $addfriend -> user_requested =$user_requested;
            $addfriend -> acceptor =$acceptor;
            $addfriend -> save();
            return redirect(route('visiter'))->with('addfriend-status','Friend Request Send');
        }


      public function unfriend($id)
        {
            $decryptid = Crypt::decrypt($id);
            $data = DB::table('addfriends')->where('acceptor',$decryptid)->delete();
            return redirect(route('visiter'))->with('unfriend-status','Un Friend');
        }

      public function friends() 
        {
          $userID = Auth::user()->id; 
          $friends= Addfriend::where('user_requested',$userID)->get();
            if ($friends) 
            {
              $friendsName=[]; 
              foreach( $friends as $key=> $value)
              { 
                  //notify()->info(' Your Blog '.$value->title.' Deny ' , ' Blog Update ');
                  //print_r($value->acceptor);
                $friendsName= User::findOrFail($value->acceptor);
              }
            }
          //print_r($friendsName);
          //$data=json_decode($friendsName);
          //print_r($data);
          //exit();
          return view('pages.user-friends',['users'=>$friends,'friendsname'=>$friendsName]);
        }

      public function unfollowUserRequest(Request $request)
        {
          $user = User::find($request->user_id);
          //$response = Auth::user()->toggleFollow($user);
          $data = DB::table('addfriends')->where('acceptor',$user)->delete();
          return response()->json(['success'=>$response]);
        }





}
