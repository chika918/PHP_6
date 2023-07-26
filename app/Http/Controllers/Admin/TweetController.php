<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    
    public function add()
    {
          return view('admin.tweet.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Tweet::$rules);

        $posts = new Tweet;
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
}
