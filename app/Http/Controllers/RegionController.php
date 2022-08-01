<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionRequest;
use App\Models\Region;
use Exception;
use Illuminate\Http\Request;


class RegionController extends Controller
{
    private $region;

    public function __construct(Region $region){
        $this->middleware('auth');
        $this->region = $region;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Region::all()->count() > 0) {
            $data = Region::orderBy('name')->paginate(15);
            return view('admin.region.home', ['data' => $data]);
        } else {
            flash('Nenhum dado encontrado', 'warning');
            return view('admin.region.home');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {  
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                if (Region::where('name', $data['name'])->first()) {
                    flash('Região já cadastrada na base de dados', 'warning');
                    return view('admin.region.form');
                }
                $data = Region::create($data);
                flash('Região adicionada com sucesso', 'success');
                return view('admin.region.form', ['data' => $data]);
            } catch (Exception $e) {
                flash('Error ao Adicionar uma nova região, entre em contato com o desenvolvedor')->error();
                return view('admin.region.form', ['error' => $e->getMessage()]);
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
        try {
            $data = Region::where('id', $id)->first();
            return view('admin.region.form', ['data' => $data]);
        } catch (Exception $e)  {
            flash("Não foi possível visualizar os dados de usuário, entrar em contato com o desenvolvedor...")->error();
            return view('admin.home', ['error' => $e->getMessage()]);
        }
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
        if ($request->isMethod('PUT')) {
            try {
                $region = Region::where('id', $id)->first();
                if ($region->update($request->all())) {
                    $data = Region::where('id', $id)->first();
                    flash("Usuário atualizado com sucesso!")->success();
                    return view('admin.region.form', array('data' => $data));
                }
            } catch (Exception $e) {
                flash("Não foi possível editar os dados da região, entrar em contato com o desenvolvedor...")->error();
                return view('admin.home', ['error' => $e->getMessage()]);
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
        //
    }
}
