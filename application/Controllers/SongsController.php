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
     * If user is logged in return index page with songs,
     * else redirect to login
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

}
