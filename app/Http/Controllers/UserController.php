<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function new(){
        return view('new-user');
    }

    public function save(Request $request){
        $rules = [
            'name'  => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
        $feedback =[
            'required' => 'Você esqueceu de preencher!',
            'email.email' => 'Digite um email válido!'
        ];

        $request->validate($rules,$feedback);

        
        $name = $request->get('name');
        $email = $request->get('email');
        $password = Hash::make($request->get('password'));


        $user = new User();
        $usuario = $user->where('email',$email)->get()->first();
        if($usuario){
            return view('new-user',['cadastrado'=>'Usuário já cadastrado']);

        }else{
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();
            return redirect()->route('login');
        }
    }

    public function edit(){
        return view('profile'); 
    }

    public function update(Request $request){
        $rules = [
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:14|max:18',
            'image' => 'file|mimes:png,jpg,jpeg'
        ];
        $feedback = [
            'required' => 'Você esqueceu de preencher!',
            'email.email' => 'Digite um email válido!',
            'image.mimes' => 'O arquivo precisa ser do tipo: png, jpg ou jpeg'
        ];
        
        $dinamicsRules = array();
        
        foreach($rules as $input => $rule){
            if(array_key_exists($input, $request->All())){
                $dinamicsRules[$input] = $rule;
            }
        }
        
        $request->validate($dinamicsRules,$feedback);

        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');

        if($request->file('image')){
            Storage::disk('public')->delete(auth()->user()->image);

            $image = $request->file('image');
            $image_urn = $image->store('images/profiles', 'public');

            User::where('id',auth()->user()->id)->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'image' => $image_urn
            ]);

            return redirect()->route('user.edit');
        }
        
        User::where('id',auth()->user()->id)->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ]);

        return redirect()->route('user.edit');
    }
}
