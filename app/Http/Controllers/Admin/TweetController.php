<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Models\User;

class TweetController extends Controller
{
    
    public function add()
    {
          return view('admin.tweet.create');
    }

    public function create(Request $request)
    {

        //つぶやき文字数のバリデーション
        $request->validate([  
            "body" => "required|string|max:255"  
        ]);  

        $posts = new Tweet;
        //ログインしているユーザーのidを取得
        $posts->user_id = \Auth::id();

        $form = $request->all();
        unset($form['_token']);

        $posts->fill($form);
        $posts->save();

        return redirect('admin/tweet/create');
    }

    public function index(){
        $data = Tweet::all();
        return view('admin.tweet.create', compact('data'));
    }

    public function delete(Request $request){
        $data = Tweet::find($request->id);
        $data->delete();
        return redirect('admin/tweet/create');
    }

}
