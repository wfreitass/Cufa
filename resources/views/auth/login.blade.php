@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src=" {{asset('storage/images/login/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Entar</h3>
              <p class="mb-4">Sistema de gerenciamento Cufa</p>
            </div>
            <form action="#" method="post" action="{{route('home')}}">
                @csrf
                <div class="form-group first">
                    <input type="text" class="form-control" id="username" placeholder="Usuário">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group last mt-4 mb-4">
                    <input type="password" class="form-control" id="password" placeholder="Senha">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Continuar logado</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                    </label>
                </div>
                <button class="btn btn-block btn-primary" type="submit">Entrar</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
