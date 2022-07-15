@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-start">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item "><a href="{{route('home')}}">Home</a></li>
			  <li class="breadcrumb-item  active" aria-current="page">Pessoas</li>
			</ol>
		</nav>
    </div>
    <div class="d-flex justify-content-center">
        <h2 class="main-title">Todas as pessoas</h2>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">Pesquisar</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                {{-- <div class="table-responsive"> --}}
                @isset($data)
                    <table class="table table-primary table-striped table-hover table-bordered align-middle">
                        <thead class="">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->cpf }}</td>
                                    <td >
										<button type="button" class="btn btn-warning mr-1">Editar</button>
                                        <button type="button" class="btn btn-danger">Excluir</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">{{ $data->links() }}</div>
                @endisset
                {{-- </div> --}}
                @include('flash::message')
            </div>
        </div>
    </div>

    {{-- Modal de Pesquisa de pessoa --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesquisar </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('searchpeople')}}" method="POST" id="formSearch">
						@csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">CPF</label>
                            <input type="text" class="form-control" id="recipient-name" name="cpf">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="submitSearch">Pesquisar</button>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
	let buttonSubmit = window.document.getElementById('submitSearch');
	let formSearch = window.document.getElementById('formSearch');
	buttonSubmit.addEventListener("click",function(){
		formSearch.submit();
	})
</script>
