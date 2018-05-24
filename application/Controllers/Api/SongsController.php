<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.5.18.
 * Time: 13.53
 */
namespace App\Controllers\Api;

use App\Models\User;
use App\Cores\Controller;
use App\Models\Song;
use Illuminate\Http\Request;
use JeffOchoa\ValidatorFactory;

/**
 * Class APISongsController for API
 * @package App\Controllers\Api
 * @access public
 */

class SongsController extends Controller
{


    /**
     * Get json data for all songs
     *
     * @return string Return json data for all songs
     * @access public
     */

    public function getData()
    {
        $songs = Song::where('user_id', User::getData()->id)->orderBy('id', 'desc')->get();

        return json_encode($songs);

    }

    /**
     * Add song to the collection
     */

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

            $response = new \stdClass();

            $song = new Song();

            $song->artist = $request->artist;
            $song->track = $request->track;
            $song->link = $request->link;
            $song->user_id = User::getData()->id;

            $song->save();


            $response->song = $song;

//            $params = [
//                'artist' => $request->artist,
//                'track' => $request->track,
//                'link' => $request->link,
//                'user_id' => User::getData()->id,
//            ];
//            Song::create($request->all());

            return json_encode($song);

        }

    }

    /**
     * If user is owner of song it will be deleted
     *
     * @param $song_id int
     * @return string json data
     *
     */

    public function deleteSong($song_id)
    {
        $song = Song::where('id', $song_id)->first();

        if ($this->isOwner(User::getData()->id, $song)) {
            Song::destroy($song_id);
            return $this->json($song_id);
        }
    }


    /**
     * Parse $song_id to the blade view, and use it in ajax call
     *
     * @param int $song_id Get each song id
     */

    public function editSongIndex($song_id)
    {
        $song = Song::where('user_id', User::getData()->id)->where('id', $song_id)->first();

        if ($this->isOwner(User::getData()->id, $song))
        {
            $this->view('songs/edit', [
                'song' => $song_id,
            ]);
        }

    }

    /**
     * Return song json data by song id
     *
     * @param $song_id int Each song data
     * @return string Return json values
     */

    public function getEachSongData($song_id)
    {
        $song = Song::where('user_id', User::getData()->id)->where('id', $song_id)->first();

        return $this->json($song);
    }


    /**
     * Updating song through API
     *
     * @param $song_id int Update song by id in API
     * @return string json data
     */

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

            $song->artist = $request->artist;
            $song->track = $request->track;
            $song->link = $request->link;

            $song->update();

            $response = new \stdClass();

            $response->artist = $request->artist;
            $response->track = $request->track;
            $response->artist = $request->link;

            return $this->json($response);
        }
    }

    public function ajaxGetStats()
    {
        $amount_of_songs = Song::count();
        echo $amount_of_songs;
    }
}