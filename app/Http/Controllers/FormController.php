<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

class FormController extends Controller
{
    /**
     * Show page with form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm( ){
        return view('index');
    }

    /**
     * Save data to file in JSON format
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function saveForm( Request $request ) {
        try {
            $path = public_path( 'product.json' );
            if ( !File::exists( $path ) ) {
                return response()->json( [ 'error' => 'Fail to wrote data. File doesn\'t exist' ] );
            }
            $data_array = array_merge( $request->all(), [ 'date_time' => Carbon::now()->toDateTimeString() ] );
            $data_json  = json_encode( $data_array );

            Storage::append( 'product.json', $data_json );

            return response()->json( $data_json );
        } catch ( Exception $e ) {
            return $e->getMessage();
        }
    }
}
