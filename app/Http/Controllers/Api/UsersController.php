<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Libraries\ApiCall;
use App\Models\User;
use App\Models\UserKeys;
use Ramsey\Uuid\Uuid;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->api_call_obj = new ApiCall();
    }

    public function register(Request $request)
    {
        //print_r($request->all()); exit;
        try {
            $uuid4 = Uuid::uuid4();
        } catch (UnsatisfiedDependencyException $e) {
            $response['message'] = $e->getMessage();

            return response()->json($response, 400);
        }
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|email|unique:users',
            'first_name' => 'bail|required|string|min:1|max:50',
            'last_name' => 'bail|required|string|min:1|max:50',
            'password' => 'bail|required|min:8',
        ]);

        $response = array();

        if ($validator->fails()) {
            $errors = $validator->errors();
            // print_r($errors);
            //exit;
            $response['success'] = 0;
            if ($errors->has('email')) {
                foreach ($errors->get('email') as $message) {
                    if ($message == 'The email has already been taken.') {
                        $response['message'] = __('messages.user.email_taken');
                    }
                }
            } else {
                $response['message'] = __('messages.user.mandatory_fields_not_found');
            }

            return response()->json($response, 400);
        }

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $mobile_no = '';
        if ($request->input('mobile_no')) {
            $mobile_no = $request->input('mobile_no');
        }

        $username = random_string(12);
        $get_username = User::where('username', $username)->first();
        if (!empty($get_username)) {
            $username = random_string(12);
        }
        $password = $request->input('password');
        $email = $request->input('email');
        DB::beginTransaction();

        $data = array('id' => $uuid4, 'first_name' => $first_name, 'last_name' => $last_name, 'mobile' => $mobile_no,  'password' => $password, 'email' => $email, 'username' => $username);
        //DB::table('users')->insert($data);
        $user = User::create($data);

        if (!$user) {
            DB::rollBack();
            $resp['success'] = 0;
            $resp['message'] = __('messages.user.failed_to_create_account');

            return response()->json($resp, 400);
        } else {
            $api_url = env('API_KYLIN_CREATE_ACCOUNT');
            $params = '?'.$username;
            $response = $this->api_call_obj->call_api($api_url, 'get', $params);
            // print_r($response);
            // dd($response);
            if ($response['statuscode'] != 201) {
                DB::rollBack();
                $resp['success'] = 0;
                $resp['message'] = $response['msg'];
                
                return response()->json($resp, 400);
            } else {
                /******** Save active keys ***********/

                $type = 'active';
                $active_private_key = $response["content"]["keys"]["active_key"]["private"];
                $active_public_key = $response["content"]["keys"]["active_key"]["public"];
                $active_key_data = array('user_id' => $uuid4, 'public' => $active_public_key, 'private' => $active_private_key, 'type' => $type);

                UserKeys::create($active_key_data);

                
                //print_r($response);

                /******** Save active keys ***********/
                /******** Save owner keys ***********/
                $type = 'owner';
                $owner_private_key = $response["content"]["keys"]["owner_key"]["private"];
                $owner_public_key = $response["content"]["keys"]["owner_key"]["public"];
                $owner_key_data = array('user_id' => $uuid4, 'public' => $owner_public_key, 'private' => $owner_private_key, 'type' => $type);

                UserKeys::create($owner_key_data);
                /******** Save owner keys ***********/

                $api_url = env('IMPORT_KEYS');
                $params = $active_private_key;
                $response = $this->api_call_obj->call_api($api_url, 'get', $params);
                
                DB::commit();
                $resp['success'] = 1;
                $resp['message'] = __('messages.user.account_created');
                return response()->json($resp, 201);
            }
        }
    }

    public function list_accounts(Request $request) {
        // DB::enableQueryLog();
        $user_list =  User::with('getKeys')->orderBy('created_at', 'desc')->get();


        // dd(DB::getQueryLog());
        $resp['success'] = 1;
        $resp['data'] = $user_list;
        // dd($resp);
        return response()->json($resp, 200);
    }
}
