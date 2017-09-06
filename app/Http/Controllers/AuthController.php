<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
	//Requisição de login
    public function login(Request $request){
    	$credentials = $request->only('email','password');

    	try{
    		$token = \JWTAuth::attempt($credentials);
    	}catch(JWTException $ex){
    		return response()->json(['error' => 'could_not_create'],500);
    	}

    	if(!$token){
    		return response()->json(['error' => 'invalid_credentials'],401);
    	}

    	return response()->json(compact('token'));
    }

    public function logoutToken(){
    	try{
    		\JWTAuth::invalidate();
    	}catch(JWTException $ex){
    		return response()->json(['error' => 'could_not_invalidate_token'],500);
    	}
    	return response()->json([],204);
    }

    public function refreshToken(Request $request){

    	try{
    		$bearerToken = \JWTAuth::setRequest($request)->getToken();
    		$token = \JWTAuth::refresh($bearerToken);
    	}catch(JWTException $ex){
    		return response()->json(['error' => 'invalid_refresh_token'],500);
    	}

    	return response()->json(compact('token'));
    }
}
