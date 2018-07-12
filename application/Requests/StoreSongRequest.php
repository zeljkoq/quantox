<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4.6.18.
 * Time: 15.42
 */

namespace App\Requests\StoreSongRequest;

use App\Cores\FormRequest\FormRequest;
use Illuminate\Http\Request;

class StoreSongRequest
{
    use FormRequest;

    public function validate()
    {

        $request = Request::capture();
        $this->validator(
            [
                'artist' => $request->artist,
                'track'  => $request->track,
                'link'   => $request->link,
            ],
            [

                'artist' => 'required',
                'track'  => 'required',
                'link'   => 'required',

            ]);

        var_dump($request);
    }
}