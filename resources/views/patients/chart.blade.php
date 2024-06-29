@extends('layouts.app')

@section('title', 'Gráficos dos pacientes')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h5 class="card-title">Gráficos dos pacientes</h5>
         </div>
        </div>
        <div class="row">
            <div class="col-md-6 border shadow p-3 mb-5 bg-body rounded">
                {{ $chart->render() }}
            </div>
        </div>
        </div>
        <div class="card-footer">
        
        </div>
    </div>
@endsection