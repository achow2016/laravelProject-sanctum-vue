<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//models
use App\Models\Post;
use App\Models\Reply;

use DateTime;

class ChatController extends Controller {

	public function getPosts() 
	{
		$posts = Post::all();
		return response(['posts' => $posts], 200);
	}
	
	public function getReplies(Request $request) 
	{
		$targetPostId = $request->input('postId');
		$replies = Reply::where('target_post_id', $targetPostId)->get();
		return response(['replies' => $replies], 200);
	}
	
	public function confirmPost() 
	{
		$posts = Post::all();
		//return view('rpgGameTextboard', ['posts' => $posts, 'message' => 'Post made.']);
	}

	public function makePostReply(Request $request)
	{
		$targetPostId = $request->input('postId');
		$replyText = $request->input('replyText');
		$name = $request->user()->name;
		$date = new DateTime("now");

		$reply = new Reply();
		$reply->setAttribute('target_post_id', $targetPostId);
		$reply->setAttribute('name', $name);
		$reply->setAttribute('postText', $replyText);
		$reply->setAttribute('date', $date);
		
		$post = Post::where('post_id', $targetPostId)->first();
		$post->replies()->save($reply);
		$post->save();	
		//return redirect('/rpgGame/textBoard/confirmPost'); 
	}
	
	public function makePost(Request $request)
	{
		$name = $request->user()->name;
		$postText = $request->input('postText');
		$date = new DateTime("now");

		$post = new Post();
		$post->setAttribute('name', $name);
		$post->setAttribute('postText', $postText);
		$post->setAttribute('date', $date);

		$post->save();	
		//return redirect('/rpgGame/textBoard/confirmPost'); 
	}
}
?>