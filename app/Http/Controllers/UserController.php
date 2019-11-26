<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function register(Request $request){
        
        /*$validatedData = $request->validate([
            'nome' => 'required|min:6|max:255',
            'email' => 'required|email|unique:users',
            'senha' => 'required|min:8|max:12'
        ]);*/
    
        $validatedData = Validator::make($request->all(), [
            'nome' => 'required|min:6|max:255',
            'email' => 'required|email|unique:users',
            'senha' => 'required|min:8|max:12'
        ]);
        
        if($validatedData->fails()){
            $errors = $validatedData->errors();

            return response()->json($errors, 400);
        }

        //$validatedData['senha'] = bcrypt($request->senha);
        $request['senha'] = bcrypt($request->senha);

        $usuario = User::create($request->all());

        $accessToken = $usuario->createToken('authToken')->accessToken;

        return response(['usuario' => $usuario, 'access_token' => $accessToken]);

    }

    public function login(Request $request){

        /*$loginData = $request->validate([
            'email' => 'email|required',
            'senha' => 'required'
        ]);*/

        $validatedData = Validator::make($request->all(), [
            'email' => 'email|required',
            'senha' => 'required'
        ]);
        
        if($validatedData->fails()){
            $errors = $validatedData->errors();

            return response()->json($errors, 400);
        }

        $credenciais = ['email' => $request->email, 'password' => $request->senha];
        
        if(!auth()->attempt($credenciais)){
            return response(['mensagem' => 'Login ou senha inválido(s)!']);
        }
       
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['usuario' => auth()->user(), 'accesss_token' => $accessToken]);

    }

}
