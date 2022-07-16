<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Pref;
use App\Models\Play;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller {

    public function enter() {
        $session_id = session('user_id');
        $user = User::where('id', $session_id)->first();
        if (!isset($user)){
            return view('login');
        }else{
            return view("search")->with("user", $user);
        }
    }

    public function searchSong($text) {
        if(!Session::get('user_id')){
            return redirect('login');
        }
        
        $client_id = env('SPOTIFY_CLIENT_ID'); 
        $client_secret = env('SPOTIFY_CLIENT_SECRET'); 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt($ch, CURLOPT_POST, 1);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        $head = array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $head); 
        $token = json_decode(curl_exec($ch), true);

        $query = urlencode($text);
        $url = 'https://api.spotify.com/v1/search?type=track&q='.$query;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
        $res=curl_exec($ch);
        $songs = json_decode($res);
        return $songs;
    }

    //PLAYLIST
    public function addSongPlay() {
        if(!Session::get('user_id')){
            return redirect('login');
        }

        if(Play::where('id_play', request('id'))->where('user', request('user'))->exists()){
            return 0;
        }

        $song = new Play();
        $request = request();
        $song->user = $request['user'];
        $song->id_play = $request['id']; 
        $song->track_img = $request['img_track'];
        $song->track_title = $request['title_track'];
        $song->track_author = $request['author_track'];
        $song->track_link = $request['link_track'];
        $song->save();
        
        return $song;
    }

    public function removeSongPlay($song_id) {
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $song = Play::where('id_canzone', $song_id);
        $song->delete();

        $username = User::where('id', session('user_id'))->first();
        $songs = Play::where('user', $username['username'])->count();
        if($songs == 0){
            return 0;
        }else{
            return $songs;
        }
    }

    public function showPlay() {
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $username = User::where('id', session('user_id'))->first();
        $songs = Play::where('user', $username['username'])->get();
        return $songs;
    }
    

    //PREFERITI
    public function addSongPref() {
        if(!Session::get('user_id')){
            return redirect('login');
        }

        if(Pref::where('id_pref', request('id'))->where('user', request('user'))->exists()){
            return 0;
        }

        $song = new Pref();
        $request = request();
        $song->user = $request['user'];
        $song->id_pref = $request['id']; 
        $song->track_img = $request['img_track'];
        $song->track_title = $request['title_track'];
        $song->track_author = $request['author_track'];
        $song->track_link = $request['link_track'];
        $song->save();

        return $song;
    }

    public function removeSongPref($song_id) {
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $song = Pref::where('id_canzone', $song_id);
        $song->delete();

        $username = User::where('id', session('user_id'))->first();
        $songs = Pref::where('user', $username['username'])->count();
        if($songs == 0){
            return 0;
        }else{
            return $songs;
        }
    }    

    public function showPref() {
        if(!Session::get('user_id')){
            return redirect('login');
        }

        $username = User::where('id', session('user_id'))->first();
        $songs = Pref::where('user', $username['username'])->get();
        return $songs;
    }
}

?>
