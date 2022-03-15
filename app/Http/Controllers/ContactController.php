<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $contacts = $user->contacts()->paginate(10);

        return view('index',['contacts'=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact-edit',['edit'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'name' => 'required|min:3',
            'email' => 'required',
            'phone' => 'required|min:14|max:18',
            'address' => 'required',
            'complement' => 'required',
            'city' => 'required',
            'state' => 'required'
        ];
        $feedback = [
            'required' => 'Você esqueceu de me preencher!',
            'email.email' => 'Digite um email válido!',
            'phone.min' => 'Pequeno demais para um telefone!',
            'phone.max' => 'Grande demais para um telefone!',
        ];
        $request->validate($regras,$feedback);

        $user = auth()->user();
        $contacts = $user->contacts()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'complement' => $request->get('complement'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
        ]);

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = auth()->user();
        $contact = $user->contacts()->whereId($id)->first();

        return view('contact-show',['contact'=>$contact]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = auth()->user();
        $contact = $user->contacts()->whereId($id)->first();

        return view('contact-edit',['contact'=>$contact,'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $regras = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'complement' => 'required',
            'city' => 'required',
            'state' => 'required'
        ];
        $feedback = [
            'required' => 'Você esqueceu de me preencher! (Campo :attribute)'
        ];

        if($id === null){
            return 'O conteúdo não foi encontrado';
        }

        if($request->method() === 'PATCH'){
            $regrasDinamicas = array();

            foreach ($regras as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas,$feedback);

        }else{
            $request->validate($regras,$feedback);
        }
        
        $user = auth()->user();
        $contact = $user->contacts()->whereId($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'complement' => $request->complement,
            'city' => $request->city,
            'state' => $request->state
        ]);

        return redirect()->route('contacts.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {   
        $user = auth()->user();
        $contact = $user->contacts()->whereId($id)->delete();

        return redirect()->route('contacts.index');
    }
}
