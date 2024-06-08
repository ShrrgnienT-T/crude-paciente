@extends ('layouts.app')

@section ('title', 'Detalhe do Paciente')


@section ('content')
    <div class="card-header"> 
        <h1> </h1>
    </div>
    <div class="card">
        <ul class="list-group">
            <li class="list-group-item">FOTO: <br/>
                <img src="{{asset($patient->foto)}}" alt="foto do paciente" {{$patient->id}}>
            </li>
            <li class="list-group-item">ID:  {{$patient->id}}</li>
            <li class="list-group-item">CPF: {{$patient->cpf}}</li>
            <li class="list-group-item">CNS: {{$patient->cns}}</li>
            <li class="list-group-item">NOME: {{$patient->name}}</li>
            <li class="list-group-item">DN: {{$patient->birth}}</li>
            <li class="list-group-item">EMAIL: {{$patient->email}}</li>
            <li class="list-group-item">TELEFONE: {{$patient->phone}}</li>
            <li class="list-group-item">MUNICÍPIO: {{{$patient->county->ibge}}} {{$patient->county->name}}/ {{$patient->county->fu}}</li>
         
          </ul>
      </div>
   <div class="card-footer">
    <a href="#" class="btn btn-danger"> Voltar </a>
   </div>

@endsection