<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Mockery\CountValidator\Exception;

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
            $data_array      = array_merge( $request->all(), [ 'date_time' => Carbon::now()->toDateTimeString() ] );
            $data_json       = json_encode( $data_array );
            $data_json_array = '[' . $data_json . ']';
            $first_brackets  = '[';
            $search          = ']';
            $replace         = ',' . $data_json . $search;
            $content         = file_get_contents( $path );

            if ( strpos( $content, $first_brackets ) === false ) {
                file_put_contents( $path, $data_json_array );
            } else {
                file_put_contents( $path, str_replace( $search, $replace, $content ) );
            }

            return response()->json( $data_json_array );

        } catch ( Exception $e ) {
            return $e->getMessage();
        }
    }
}
