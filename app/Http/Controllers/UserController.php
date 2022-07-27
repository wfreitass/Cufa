<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserResquest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserResquest $request)
    {
        if($request->isMethod('post')){
            try {
                $data = $request->all();
                if($data['password'] !== $data['confirmPassword']){
                    flash("As senhas não são iguais !!!")->error();
                    return view('admin.user.form', ['data' =>$data]);
                }
                unset($data['confirmPassword']);
                $data['password'] = Hash::make($data['password']);
                // dd($data);
                $data = User::create($data);

                flash("Usuário Adicionado ao sistema", 'success');
                return view('admin.user.form', ['data' =>$data]);
               
            } catch (Exception $e) {
                $error = $e->getMessage();
                flash('Error ao Adicionar um novo usuário, entre em contato com o desenvolvedor')->error();
                return view('admin.user.form', ['error' => $error]);
            }
        }
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
