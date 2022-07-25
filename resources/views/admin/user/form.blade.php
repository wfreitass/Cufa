@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <h2 class="main-title">Adicionar um novo usuário</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <form
                    action="@php
					isset($data) ? print(route('updateuser',['id'=>$data['id']])) : print(route('createuser'));
				@endphp"
                    method="post" class="w-75 ">
                    @csrf
                    @isset($data)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="col-12">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="nome"
                                name="name"
                                value="@isset($data) {{ $data['name'] }} @endisset{{ old('name') }}"
                                placeholder="Nome Completo">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}@isset($data) {{ $data['email'] }} @endisset"
                                placeholder="email@example.com">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control @error('cpf') is-invalid @enderror"
                                placeholder="9999-9999-00" maxlength="11" name="cpf" id="cpf"
                                value="{{ old('cpf') }}@isset($data) {{ $data['cpf'] }} @endisset"
                                aria-label="cpf" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            @error('cpf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="61 992780548" name="phone" id="telefone"
                                value="{{ old('phone') }}@isset($data) {{ $data['phone'] }} @endisset"
                                aria-label="telefone" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="*****" id="password" aria-label="password"
                                name="password"
                                value="{{ old('password') }}@isset($data) {{ $data['password'] }} @endisset">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="confirmPassword" class="form-label">Confirmar Senha</label>
                            <input type="password" class="form-control" name="confirmPassword"
                                value="{{ old('confirmPassword') }}@isset($data) {{ $data['confirmPassword'] }} @endisset"
                                placeholder="Na rua da água de coco" id="confirmPassword" aria-label="confirmPassword">
                        </div>
                    </div>

					<div class="row">
						<div class="col-md-6">
							<label for="is_admin" class="form-label">
								Administrador
							</label>
							<select class="border-0 form-select" id="is_admin" name="admin" aria-label="Default select example">
								<option value="0">Não</option>
								<option value="1">Sim</option>
							  </select>
						</div>
						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="showpassword" value="show">
								<label class="form-check-label" for="showpassword">Mostrar senha</label>
							  </div>
						</div>
					</div>

                    <div class="mt-3 d-flex justify-content-end mb-3">
                        <button class="btn btn-primary">
                            @php
                                isset($data) ? print 'Editar' : print 'Cadastrar';
                            @endphp
                        </button>
                    </div>
                    @include('flash::message')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('js/showPasssowrd.js')}}"></script>
@endsection
