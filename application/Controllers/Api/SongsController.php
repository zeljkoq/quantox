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
use App\Requests\StoreSongRequest\StoreSongRequest;
use App\Transformers\AdminTransformer;
use App\Transformers\UserTransformer;
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
     * @param int $user_id
     * @return string
     */
    public function getData($user_id)
    {

        if (User::isLogged()) {
            if (User::isAdmin()) {
                $user = User::find(User::getData()->id);
                $user = $user->songs()->first();

                $songs = Song::where('user_id', $user->user_id)->orderBy('id', 'desc')->get();

                return $this->response->collection($songs, new AdminTransformer());
            }
            $user = User::find(User::getData()->id);
            $user = $user->songs()->first();

            $songs = Song::where('user_id', $user->user_id)->orderBy('id', 'desc')->get();

            return $this->response->collection($songs, new UserTransformer());

        }
        $songs = Song::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return $this->response->collection($songs, new UserTransformer());


    }

    /**
     * Add song to the collection
     * @return string json
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
            'track'  => 'required',
            'link'   => 'required',
        ];
        $result = $validator->make($data, $rules);
        $errors = $result->errors()->toArray();

        if (empty($errors)) {
            $song = new Song();

            $song->artist = $request->artist;
            $song->track = $request->track;
            $song->link = $request->link;
            $song->user_id = User::getData()->id;

            $song->save();

            return $this->response->item($song, new UserTransformer(), 'Song has been added successfully.');

        }
    }

    /**
     * If user is owner of song it will be deleted
     *
     * @param int $song_id Return song data by song id
     * @return string Return json data
     *
     */

    public function deleteSong($song_id)
    {
        $song = Song::where('id', $song_id)->first();

        if ($this->isOwner(User::getData()->id, $song)) {
            Song::destroy($song_id);

            return $this->json([
                'song'    => $song_id,
                'message' => "Song has been deleted.",
            ]);
        }
    }


    /**
     * Return song json data by song id
     *
     * @param int $song_id Each song data
     * @return string Return json values
     */

    public function getEachSongData($song_id)
    {
        $song = Song::where('user_id', User::getData()->id)->where('id', $song_id)->first();

        return $this->response->item($song, new UserTransformer());
    }


    /**
     * Updating song through API
     *
     * @param int $song_id Update song by id in API
     * @return string Return json data
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
            'track'  => 'required',
            'link'   => 'required',
        ];
        $result = $validator->make($data, $rules);
        $errors = $result->errors()->toArray();

        if (empty($errors)) {
            $song = Song::findOrFail($song_id);

            $song->artist = $request->artist;
            $song->track = $request->track;
            $song->link = $request->link;

            $song->update();
            return $this->response->item($song, new AdminTransformer(), 'Song has been updated');
        }
    }

    /**
     *
     */
    public function ajaxGetStats()
    {
        $amount_of_songs = Song::count();
        echo $amount_of_songs;
    }
}
