<?php

namespace App\Controllers;

use App\Models\User;
use App\Cores\Controller;
use App\Models\Song;
use Illuminate\Http\Request;
use JeffOchoa\ValidatorFactory;



class SongsController extends Controller
{

    public function index()
    {
        if (User::isLogged()) {

            $this->view('songs/index', []);

        } else {
            redirect('login');
        }

    }
    public function getData()
    {
        $songs = Song::where('user_id', User::getData()->id)->orderBy('id', 'desc')->get();

        return json_encode($songs);

    }


    public function addSong()
    {
        $request = Request::capture();
        $validator = new ValidatorFactory();
        $data = $request->only([
            'artist',
            'track',
            'link'
        ]);
        $rules = [
            'artist' => 'required',
            'track' => 'required',
            'link' => 'required',
        ];
        $result = $validator->make($data, $rules);
        $errors = $result->errors()->toArray();

        if (empty($errors)) {
            $params = [
                'artist' => $request->artist,
                'track' => $request->track,
                'link' => $request->link,
                'user_id' => User::getData()->id,
            ];
            Song::create($params);
//            redirect('songs');
        } else {
//            redirect('songs');
        }

    }

    public function deleteSong($song_id)
    {
        $song = Song::where('id', $song_id)->first();

        if ($this->isOwner(User::getData()->id, $song)) {
            Song::destroy($song_id);

            redirect('songs');
        } else {
            redirect('');
        }


    }

    public function editSong($song_id)
    {

        $song = Song::where('user_id', User::getData()->id)->where('id', $song_id)->first();

        if ($song) {
            $this->view('songs/edit', [
                'song' => $song,
            ]);
        } else {
            redirect('');
        }

    }

    public function updateSong($song_id)
    {

        $request = Request::capture();


        $validator = new ValidatorFactory();
        $data = $request->only([
            'artist',
            'track',
            'link'
        ]);
        $rules = [
            'artist' => 'required',
            'track' => 'required',
            'link' => 'required',
        ];
        $result = $validator->make($data, $rules);
        $errors = $result->errors()->toArray();

        if (empty($errors)) {
            $song = Song::findOrFail($song_id);
            if ($this->isOwner(User::getData()->id, $song)) {
                $song->artist = $request->artist;
                $song->track = $request->track;
                $song->link = $request->link;

                $song->update();

                redirect('songs');
            }
            else {
                echo 'Not allowed';
            }


        } else {
            redirect('songs');
        }

    }


    public function ajaxGetStats()
    {
        $amount_of_songs = Song::count();

        echo $amount_of_songs;
    }
}
