@extends('layouts.app')

@section('content')
	<div class="d-flex justify-content-start">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item "><a href="{{ route('home') }}" class="cufa-link">Home</a></li>
				<li class="breadcrumb-item " aria-current="page"><a href="{{ route('peoples') }}" class="cufa-link">Pessoas</a></li>
				<li class="breadcrumb-item  active " aria-current="page"><a href="{{ route('createpeople') }}">@php
				 	isset($data) ? print('Editando dados da pessoa') : print('Adicionar uma nova Pessoa');
				@endphp
				</a></li>
			</ol>
		</nav>
	</div>
    <div class="d-flex justify-content-center">
        <h2 class="main-title">
			@empty ($data)
				Adicionar uma nova pessoa
				@else
				Editando da Pessoa
			@endempty
		</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <form
                    action="@php
					isset($data) ? print(route('updatepeople',['id'=>$data['id']])) : print(route('salvepeople'));
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
                                value="@isset($data){{$data['name']}}@endisset{{ old('name') }}"
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
                                value="{{ old('email') }}@isset($data){{ $data['email'] }}@endisset"
                                placeholder="email@example.com">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control @error('cpf') is-invalid @enderror"
                                placeholder="9999-9999-00" maxlength="11" name="cpf" id="cpf"
                                value="{{ old('cpf') }}@isset($data){{ $data['cpf'] }}@endisset"
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
                                value="{{ old('phone') }}@isset($data){{$data['phone']}}@endisset"
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
                            <label for="endereco" class="form-label">Endere??o</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                placeholder="M??dulo o Casa 361A est??ncia Planaltina" id="endereco" aria-label="endereco"
                                name="address"
                                value="{{ old('address') }}@isset($data){{$data['address']}}@endisset">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" name="complement"
                                value="{{ old('complement') }}@isset($data){{$data['complement']}}@endisset"
                                placeholder="Na rua da ??gua de coco" id="complemento" aria-label="complemento">
                        </div>
                    </div>

					<div class="row">
						<div class="col">
							<label for="region" class="form-label">Regi??o</label>
							<select class="form-select border-0" id="region" name="region_id" required aria-label="Default select example">
								<option selected disabled>Escolha uma Regi??o</option>
								@foreach ($regions as $region)
								<option @empty($data)
									@else
										@if ($data['region_id'] == $region['id'])
											selected
										@endif
								@endempty
									 value='{{$region['id']}}'>{{$region['name']}}</option>
								@endforeach

							</select>
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
