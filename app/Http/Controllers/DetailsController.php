<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ZipFile as ZipFile;
use App\Detail as Detail;

class DetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function save(Request $request){

        // check username, check password
        if($request->input('username') != env('APP_USERNAME') || $request->input('password') != env('APP_PASSWORD')){
            return ['message' => 'username and password mismatch', 'status' => 'failure'];
        }

        if(empty($request->input('file'))){
            return ['message' => 'file details should be present', 'status' => 'failure'];
        }

        $files = ZipFile::decyptFileNames($request->input('file'));

        $detail = new Detail();

        $detail->username = $request->input('username');
        $detail->password = $request->input('password');
        $detail->file = serialize($files);

        $detail->save();

        return ['message' => 'successfully saved the file', 'status' => 'success'];

    }
}
