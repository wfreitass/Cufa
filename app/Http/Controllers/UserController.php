<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserResquest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        if (User::count() > 0) {
            $data = User::select('id', 'name', 'email', 'phone')->orderBy('name', 'ASC')->paginate(15);
            return view('admin.user.home', ['data' => $data]);
        } else {
            flash('Nenhum usuário encontrado na base da dados')->warning();
            return view('admin.user.home');
        }
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
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                if ($data['password'] !== $data['confirmPassword']) {
                    flash("As senhas não são iguais !!!")->error();
                    return view('admin.user.form', ['data' => $data]);
                }
                unset($data['confirmPassword']);
                $data['password'] = Hash::make($data['password']);
                // dd($data);
                $data = User::create($data);

                flash("Usuário Adicionado ao sistema", 'success');
                return view('admin.user.form', ['data' => $data]);
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
        try {
            $data = User::where('id', $id)->first();
            // dd($data);
            return view('admin.user.form', ['data' => $data]);
        } catch (\Throwable $th) {
            flash("Não foi possível visualizar os dados de usuário, entrar em contato com o desenvolvedor...")->error();
            return view('admin.home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserResquest $request, $id)
    {
        if ($request->isMethod('PUT')) {
            try {
                $User = User::where('id', $id)->first();
                if ($User->update($request->all())) {
                    $data = User::where('id', $id)->first();
                    flash("Usuário atualizado com sucesso!")->success();
                    return view('admin.user.form', array('data' => $data));
                }
            } catch (Exception $e) {
                flash("Não foi possível editar os dados de usuário, entrar em contato com o desenvolvedor...")->error();
                return view('admin.home', ['error' => $e]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('is_admin', Auth::user())) {
            try {
                if (User::where('id', $id)->delete()) {
                    flash('Dados excluidos com sucesso', 'success');
                    return redirect(route('users'));
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
                flash('Error ao excluir dados, entre em contato com o desenvolvedor', 'error');
                return view('admin.user.home', $error);
            }
        }
        return view('admin.user.home');
    }


    public function search(Request $request)
    {
        if ($request->isMethod('POST')) {
            try {
                $data = User::where('cpf', $request->all()['cpf'])->get();
                if ($data->count() > 0) {
                    return view('admin.user.home', ['data' => $data]);
                }
                
                flash('Usuário não encontrado na base de dados')->warning();
                return view('admin.user.home');
            } catch (Exception $e) {
                flash('Usuário não encontrado na base de dados')->error();
                return view('admin.user.home',['data' => $e]);
            }
           
        }
    }
}
