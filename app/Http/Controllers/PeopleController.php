<?php

namespace App\Http\Controllers;

use App\Models\People;
use Exception;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.people.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:8', 'string'],
            'cpf' => ['required', 'min:11', 'max:11', 'string'],
            'phone' => ['required', 'min:8' ,'max:11', 'string'],
            'address' => ['required', 'string'],
            'complement' => ['string']
        ], [
            'name.required' => 'Campo Obrigatório',
            'name.min' => 'O campo preciso de no mínimo :min caracters',
            'name.string' => 'O campo precisa ser uma frase',
            'cpf.required' => 'Campo obrigatório',
            'cpf.min' => 'O campo preciso de no mínimo :min caracters',
            'cpf.max' => 'O campo preciso de no mínimo :max caracters',
            'cpf.string' => 'O campo precisa ser uma frase',
            'phone.required' => 'Campo obrigatório',
            'phone.min' => 'O campo preciso de no mínimo :min caracters',
            'phone.max' => 'O campo preciso de no mínimo :max caracters',
            'phone.string' => 'O campo precisa ser uma frase',
            'address.required' => 'Campo Obrigatório',
            'address.string' => 'O campo precisa ser uma frase',
            'complement.string' => 'O campo precisa ser uma frase'
        ]);
        if($request->isMethod('post')){
            try{
                $data = $request->all();
                People::create($data);
            }catch(Exception $e){   
                return $e->getMessage();
            }
            // dd($data);
        }
        return view('admin.home',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
