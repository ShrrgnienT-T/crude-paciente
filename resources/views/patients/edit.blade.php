@extends('layouts.app')

@section('title', 'Editar paciente')

@section('content')

@inject('resource', 'App\Http\Resources\Resources')
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Editar paciente</h5>
            <form action="{{ route('patients.update', $patient) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-3 my-1">
                        <input type="text" name="cpf" id="cpf" class="form-control cpf" value="{{ old('cpf', $patient->cpf) }}" placeholder="CPF">
                    </div>
                    <div class="form-group col-3">
                        <input type="text" name="cns" id="cns" class="form-control cns" value="{{ old('cns',$patient->cns) }}" placeholder="CNS">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$patient->name) }}" placeholder="NOME">
                    </div>
                    <div class="form-group col-4">
                        <input type="date" name="birth" id="birth" class="form-control"
                            value="{{ old('birth', $patient->getRawOriginal('birth')) }}" placeholder="DATA DE NASCIMENTO">
                    </div>
                    <div class="form-group col-4">
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email',$patient->email) }}" placeholder="E-MAIL">
                    </div>
                    <div class="form-group col-4">
                        <input type="text" name="phone" id="phone" class="form-control phone" value="{{ old('phone',$patient->phone) }}" placeholder="TELEFONE">
                    </div>
                    <div class="form-group col-4 my-1">
                        <select name="county_id" class="form-control">
                            @foreach ($resource->getCounties() as $county)
                                <option value="{{$county->id}}" @selected(old('county_id',$patient->county_id)==$county->id)>{{$county->name. '/'. $county->fu}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{ route('patients.index') }}" class="btn btn-danger">Voltar</a>
            </form>
        </div>
    </div>
@endsection
