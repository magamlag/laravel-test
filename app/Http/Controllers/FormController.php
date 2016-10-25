<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
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
    public function saveForm(Request $request){

        if(!Storage::exists('product_json')){
            return Response::json(['error'=> 'Fail to wrote data. File doesn\'t exist']);
        }

        $data = $request->all();
        Storage::disk('local')->put('product_json.txt', $data);

        return response()->json_encode($data);
    }
}
