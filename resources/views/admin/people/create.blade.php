@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <h2 class="main-title">Adicionar uma nova pessoa</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <form action="" method="post" class="w-75">
                    <div class="row">
                        <div class="col-12">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" placeholder="Nome Completo">
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="email@example.com">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" placeholder="9999-9999-00" id="cpf"
                                aria-label="cpf">
                        </div>
                        <div class="col">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" placeholder="61 992780548" id="telefone"
                                aria-label="telefone">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" placeholder="Módulo o Casa 361A estância Planaltina"
                                id="endereco" aria-label="endereco">
                        </div>
                        <div class="col">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" placeholder="Na rua da água de coco" id="complemento"
                                aria-label="complemento">
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-primary ">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
