<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class PostController extends Controller {

    public function createPost(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        //CREO POST
        $request = request();
        $newPost = new Post;
        $newPost->user = session('user_id');
        $newPost->content = $request['text'];
        $newPost->save();

        if($newPost){
            return redirect('home');
        }
    }

    public function getPost(){
        $elem = Post::get(); 
        $posts = [];
        $i = 0;
        foreach($elem as $post){
            $posts[$i]['content'] = $post['content'];
            $posts[$i]['nlikes'] = $post['nlikes'];
            $posts[$i]['id'] = $post['id'];
            $posts[$i]['foto'] = $post->user()->first()->foto;
            $posts[$i]['username'] = $post->user()->first()->username;
            $i++;
        }

        $username = User::where('id', session('user_id'))->first();

        for($i = 0; $i < count($posts); $i++){
            $row = Like::where("username", $username['username'])
                        ->where("post_id", $posts[$i]['id'])->exists();
            if($row){
                $posts[$i]['ok'] = true;
            } else {
                $posts[$i]['ok'] = false;
            }
        }
        return $posts;
    }

    public function deletePost($id_post){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $post = Post::where("id", $id_post);
        $post->delete();
    }

    public function addLike($id_post, $username){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $newLike = new Like();
        $newLike->username = $username;
        $newLike->post_id = $id_post;
        $newLike->save();
    }

    public function removeLike($id_post, $username){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $removelike = Like::where("username", $username)
                            ->where("post_id", $id_post);
        $removelike->delete();
    }
}

?>