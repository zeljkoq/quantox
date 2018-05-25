<?php

namespace App\Controllers;

use App\Models\User;
use App\Cores\Controller;
use App\Models\Song;
//use Illuminate\Http\Request;
//use JeffOchoa\ValidatorFactory;

/**
 * Class SongsController
 * @package App\Controllers
 * @access public
 */
class SongsController extends Controller
{

    /**
     * Render main index view for all songs
     */

    public function index()
    {
        if (User::isLogged()) {
            $this->view('songs/index', [
                'user_id' => User::getData()->id,
            ]);

        } else {
            redirect('login');
        }
    }

    /**
     * Parse $song_id to the blade view, and use it in ajax call
     *
     * @param int $song_id Get each song id
     */

    public function editSongIndex($song_id)
    {

        $song = Song::where('user_id', User::getData()->id)->first();

        if ($song->user->id) {
            $this->view('songs/edit', [
                'song' => $song_id,
            ]);
        } else {
            redirect('');
        }
    }

    /**
     * Add song to the collection
     */

//    public function addSong()
//    {
//        $request = Request::capture();
//        $validator = new ValidatorFactory();
//        $data = $request->only([
//            'artist',
//            'track',
//            'link'
//        ]);
//        $rules = [
//            'artist' => 'required',
//            'track' => 'required',
//            'link' => 'required',
//        ];
//        $result = $validator->make($data, $rules);
//        $errors = $result->errors()->toArray();
//
//        if (empty($errors)) {
//            $params = [
//                'artist' => $request->artist,
//                'track' => $request->track,
//                'link' => $request->link,
//                'user_id' => User::getData()->id,
//            ];
//            Song::create($params);
//            return json_encode($params);
//        } else {
//
//        }
//
//    }

    /**
     * If user is owner of song it will be deleted
     *
     * @param $song_id int
     *
     */

//    public function deleteSong($song_id)
//    {
//        $song = Song::where('id', $song_id)->first();
//
//        if ($this->isOwner(User::getData()->id, $song)) {
//            Song::destroy($song_id);
//
//            redirect('songs');
//            setMessage('success', 'Song has been deleted');
//        } else {
//            redirect('');
//        }
//
//
//    }


    /**
     * Updating song through PHP form
     *
     * @param $song_id int Update song by id
     */


}
