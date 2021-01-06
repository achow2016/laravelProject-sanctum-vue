<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//models
use App\Models\Post;

use DateTime;

class ChatController extends Controller {

	public function getPosts() 
	{
		$posts = Post::all();
		return response(['posts' => $posts], 200);
	}
	
	public function confirmPost() 
	{
		$posts = Post::all();
		//return view('rpgGameTextboard', ['posts' => $posts, 'message' => 'Post made.']);
	}

	public function add(Request $request)
	{
		$handle = $request->input('handle');
		$postText = $request->input('post');
		$date = new DateTime("now");

		$post = new Post();
		$post->setAttribute('name', $handle);
		$post->setAttribute('postText', $postText);
		$post->setAttribute('date', $date);

		$post->save();	
		//return redirect('/rpgGame/textBoard/confirmPost'); 
	}
}
?>