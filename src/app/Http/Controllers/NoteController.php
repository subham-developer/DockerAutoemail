<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Note;
use Illuminate\Support\Facades\Validator;
use App\Helper\CommonHelper;

class NoteController extends Controller
{
    function add(Request $request){
        $validator = Validator::make(request()->all(), [
            'notes' => 'required|max:500',
        ]);

        if($validator->fails()){
            $errorMessage = $validator->errors()->all();
            return $this->jsonOutput(400, $errorMessage[0]);
        }

        $Note = new Note;
        $Note->notes = $request->notes;
        $Note->user_id = $this->getUserLoginId();
        $result = $Note->save();
        
        if($result > 0){
        	return $this->jsonOutput(200,'Note added successfully',['id' => 0, 'notes' => $request->notes, 'lastId' => $Note->id, 'adddate' => $this->getLastDate($Note->id)]);
        }
        else{
        	return $this->jsonOutput(400,'Unable to insert');
        }
    }

    function update(Request $request){
        $validator = Validator::make(request()->all(), [
            'id' => 'required|numeric',
            'notes' => 'required|max:500',
        ]);

        if($validator->fails()){
            $errorMessage = $validator->errors()->all();
            return $this->jsonOutput(400, $errorMessage[0]);
        }

        $Note = Note::find($request->id);
        $Note->notes = $request->notes;
        $result = $Note->save();

        if($result > 0){
        	return $this->jsonOutput(200,'Note updated successfully',['id' => $request->id, 'notes' => $request->notes, 'adddate' => $this->getLastDate($request->id)]);
        }
        else{
        	return $this->jsonOutput(400,'Unable to insert');
        }
    }

    function delete(Request $request){
        $validator = Validator::make(request()->all(), [
            'id' => 'required|numeric',
        ]);

        if($validator->fails()){
            $errorMessage = $validator->errors()->all();
            return $this->jsonOutput(400, $errorMessage[0]);
        }

        $Note = Note::find($request->id);
        $Note->delete = 1;
        $result = $Note->save();

        if($result > 0){
        	return $this->jsonOutput(200,'Note deleted successfully',['id' => $request->id, 'notes' => '']);
        }
        else{
        	return $this->jsonOutput(400,'Unable to delete');
        }
    }

    function jsonOutput($code = 400, $message = 'Error', $data = array()){
    	$output = new \stdclass;
    	$output->code = $code;
    	$output->message = $message;
    	if(is_array($data)){
    		$output->data = $data;
    	}
    	return json_encode($output);
    }

    function getUserLoginId(){
        $email = \Session::get('user_login');

        $data = \DB::table('users')->where('email',$email)->get();
        return $data[0]->id;
    }

    function getLastDate($id){
		$CommonHelper = new CommonHelper;

        $noteList = Note::where('delete',0)->where('user_id',$this->getUserLoginId())->where('id', $id)->get();
        return $CommonHelper->convertDateFomate($noteList[0]->updated_at);
    }
}
