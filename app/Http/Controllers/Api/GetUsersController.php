<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Libraries\ApiCall;
use App\Models\User;

class GetUsersController extends Controller
{
    public function __construct()
    {
        $this->api_call_obj = new ApiCall();
    }

    public function get_users(Request $request) {

    	$user_id = $request->input('user_id');
    	$search_text = $request->input('search_text');


    	$get_users = User::where('id', '<>', $user_id)->where('first_name', 'like', '%' . $search_text . '%')->orWhere('last_name', 'like', '%' . $search_text . '%')->orWhere('username', 'like', '%' . $search_text . '%')->orWhere('id', 'like', '%' . $search_text . '%')->orWhere('email', 'like', '%' . $search_text . '%')->get(['id as uid', 'first_name','last_name','username','email']);
    	//print_r($get_users); exit;
    	$users = array();
    	foreach($get_users as $key=>$u) {
    		//print_r($u);
    		if($u->uid!=$user_id) {

    			$users[] = array('user_id' => $u->uid, 'first_name' => $u->first_name, 'last_name' => $u->last_name, 'username' => $u->username, 'email' => $u->email);

    		}
    		

    	}


		
        $resp['data'] = $users;

        return response()->json($users, 200);
    	


    }
}
