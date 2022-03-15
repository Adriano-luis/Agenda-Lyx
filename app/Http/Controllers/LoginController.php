<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'E-mail e/ou senha inválidos';
        }
        if($request->get('erro') == 2){
            $erro = 'Necessário autenticação';
        }
        return view('login',['erro'=>$erro]);
    }



    public function authenticate(Request $request){
        $regras = [
            'email' => 'email',
            'password' => 'required'
        ];
        $retorno =[
            'required' => 'Você esqueceu de me preencher! (Campo :attribute)',
            'email.email' => 'Digite um email válido!'
        ];
        $request->validate($regras,$retorno);

        $credentials = $request->only('email', 'password');
        $remember = $request->only('remember');

        if(Auth::attempt($credentials,$remember)){
            return redirect()->intended('in/contacts');
        }
        return  redirect()->route('login',['erro' => 1]);

    }



    public function sair(){
        auth::logout();
        return redirect()->route('login');
    }
}
