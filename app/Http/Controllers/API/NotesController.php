<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ApiResponse;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Notes;

class NotesController extends Controller
{
    use ApiResponse;
    public function add_notes(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'device_id' => 'required',
            'title' => 'required|string|max:25',
            'description' => 'required|string|max:255',
                //array('properties' => 'required|min:1'),
            'properties' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = Notes::create([
            'device_id' => $request->device_id,
            'title' => $request->title,
            'description' => $request->description,
            'properties' => $request->properties
         ]);

        return $this->success(
            'Notes Added successfully!',
            $data
        );
    }

    public function get_notes($id)
    {
        $data = Notes::select("*")
        ->where("device_id", "=", $id)->paginate(10);
        $data['total_record']= count($data);
        return $this->success(
            'Data Fatch successfully!',
            $data
        );
    }
}
