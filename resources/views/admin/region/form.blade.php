@extends('layouts.app')

@section('content')
	<div class="d-flex justify-content-start">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item "><a href="{{ route('home') }}" class="cufa-link">Home</a></li>
				<li class="breadcrumb-item " aria-current="page"><a href="{{ route('regions') }}" class="cufa-link">Regiões</a></li>
				<li class="breadcrumb-item  active " aria-current="page"><a href="{{ route('createregion') }}">@php
				 	isset($data) ? print('Editando dados da Região') : print('Adicionar uma nova Região');
				@endphp
				</a></li>
			</ol>
		</nav>
	</div>
    <div class="d-flex justify-content-center">
        <h2 class="main-title">
			@empty ($data)
				Adicionar uma nova Região
				@else
				Editando Região
			@endempty
		</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <form
                    action="@php
					isset($data) ? print(route('updateregion',['id'=>$data['id']])) : print(route('salveregion'));
				@endphp"
                    method="post" class="w-75 ">
                    @csrf
                    @isset($data)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="col-12">
                            <label for="nome" class="form-label">Nome da Região</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="nome"
                                name="name"
                                value="@isset($data) {{ $data['name'] }} @endisset{{ old('name') }}"
                                placeholder="Vila Nossa Senhora de Fátima">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col d-none">
                            <label for="uf" class="form-label">uf</label>
                            <input type="uf" class="form-control" id="uf" name="uf"
                                value="DF"
                                placeholder="DF">
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
