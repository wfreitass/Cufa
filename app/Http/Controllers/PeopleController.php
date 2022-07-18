<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeopleRequest;
use App\Models\People;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(People::all()->count() > 0){
            $data = People::paginate(15);
            return view('admin.people.home', ['data' => $data]);
        }else{
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
        return view('admin.people.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeopleRequest $request)
    {
        if($request->isMethod('post')){
            try{
                $data = $request->all();
                if(People::where('cpf',$data['cpf'])->first()){
                    flash('CPF já cadastrado na base de dados', 'warning');
                    return view('admin.people.create');
                }
                People::create($data);
                flash('Pessoa adicionada com sucesso', 'success');
                return view('admin.people.create', $data);
            }catch(Exception $e){   
                $error = $e->getMessage();
                flash('Error ao Adicionar uma nova pessoa, entre em contato com o desenvolvedor', 'error');
                return view('admin.people.create', $error);
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

    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cpf
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        if($request->isMethod('post')){
            // $data =  People::where('cpf', $request->all('cpf'))->get();
            $data = DB::table('people')->where('cpf',$request->all('cpf'))->paginate(1);
            return view('admin.people.home', ['data' => $data]);
        }
    }
}
