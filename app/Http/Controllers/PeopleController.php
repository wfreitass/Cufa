<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeopleRequest;
use App\Models\People;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as Gate;

class PeopleController extends Controller
{
    private $people;

    public function __construct(People $people)
    {
        $this->middleware('auth');
        $this->people = $people;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (People::all()->count() > 0) {
            $data = People::orderBy('name')->paginate(15);
            return view('admin.people.home', ['data' => $data]);
        } else {
            flash('Nenhum dado encontrado', 'warning');
            return view('admin.people.home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeopleRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                if (People::where('cpf', $data['cpf'])->first()) {
                    flash('CPF já cadastrado na base de dados', 'warning');
                    return view('admin.people.form');
                }
                $data = People::create($data);
                flash('Pessoa adicionada com sucesso', 'success');
                return view('admin.people.form', ['data' => $data]);
            } catch (Exception $e) {
                $error = $e->getMessage();
                flash('Error ao Adicionar uma nova pessoa, entre em contato com o desenvolvedor', 'error');
                return view('admin.people.form', $error);
            }
        }
        return view('admin.home');
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
        $data = $this->people->find($id);
        // $data = People::where('id', $id)->get();
        return view('admin.people.form', ['data' => $data]);
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
        if ($request->isMethod('put')) {
            try {
                $people = $this->people->find($id);
                $people->update($request->all());
                flash("Atualizado com sucesso", "success");
                return view('admin.people.form', ['data' => $people]);
            } catch (Exception $e) {
                $error = $e->getMessage();
                flash('Error ao Autualizar dados, entre em contato com o desenvolvedor', 'error');
                return view('admin.people.form', $error);
            }
        }
        return view('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('destroy-people', Auth::user())){
            try {
                if (People::where('id', $id)->delete()) {
                    flash('Dados excluidos com sucesso', 'success');
                    return redirect(route('peoples'));
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
                flash('Error ao excluir dados, entre em contato com o desenvolvedor', 'error');
                return view('admin.people.home', $error);
            }
        }
        return view('admin.people.home');
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data =  People::where('cpf', $request->all('cpf')['cpf'])->get();
                if ($data->count() == false) {
                    flash("Cpf Não encontrado na base de dados", "warning");
                    return view('admin.people.home', ['data' => $data]);
                }
                return view('admin.people.home', ['data' => $data]);
            } catch (Exception $e) {
                $error = $e->getMessage();
                flash('Error ao Adicionar uma nova pessoa, entre em contato com o desenvolvedor', 'error');
                return view('admin.people.form', $error);
            }
        }
    }
}
