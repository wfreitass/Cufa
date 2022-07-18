@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <h2 class="main-title">Adicionar uma nova pessoa</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">

                {{-- <form action="@if($data){{route('updatepeople',['id'=>$data->id])}}@else{{route('salvepeople')}}@endif" method="post" class="w-75 "> --}}
                <form action="@php
					isset($data) ? print(route('updatepeople',['id'=>$data->id])) : print(route('salvepeople'));
				@endphp" method="post" class="w-75 ">
					@csrf
					@method("PUT")
                    <div class="row">
                        <div class="col-12">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="nome" name="name" value="@isset($data){{$data->name}}@endisset {{old('name')}}" placeholder="Nome Completo">
							@error('name')
								<div class="invalid-feedback">
									{{$message}}
								</div>
							@enderror

                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}} @isset($data)
							{{$data->email}}
						@endisset" placeholder="email@example.com">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control @error('cpf') is-invalid @enderror" placeholder="9999-9999-00" maxlength="11" name="cpf" id="cpf" value="{{old('cpf')}} @isset($data){{$data->cpf}}@endisset"
                                aria-label="cpf"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
								@error('cpf')
								<div class="invalid-feedback">
									{{$message}}
								</div>
							@enderror
                        </div>
                        <div class="col">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="61 992780548" name="phone" id="telefone" value="{{old('phone')}} @isset($data){{$data->phone}}@endisset" aria-label="telefone" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
							@error('phone')
								<div class="invalid-feedback">
									{{$message}}
								</div>
							@enderror
						</div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Módulo o Casa 361A estância Planaltina"
                                id="endereco" aria-label="endereco" name="address" value="{{old('address')}} @isset($data){{$data->address}}@endisset" >
							@error('address')
							<div class="invalid-feedback">
								{{$message}}
							</div>
							@enderror
                        </div>
                        <div class="col">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" name="complement" value="{{old('complement')}} @isset($data){{$data->complement}}@endisset" placeholder="Na rua da água de coco" id="complemento"
                                aria-label="complemento">
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-end mb-3">
						<button class="btn btn-primary">
							@php
								isset($data) ?   print("Editar") :  print("Cadastrar");
							@endphp
						</button>
					</div>
					@include('flash::message')
                </form>
            </div>
        </div>
    </div>
@endsection
