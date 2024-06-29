@extends('layouts.app')

@section('title', 'Lista de Pacientes')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h5 class="card-title">Lista de Pacientes</h5>
            <div class="float-end">
            <a href="{{route('patients.export')}}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Exportar para excel"><i class="fas fa-file-excel"></i></a>
            <a href="{{route('patients.chart')}}" class="btn btn-info " data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Exibir grafico"><i class="fas fa-chart-bar"></i></a>
         </div>
        </div>
        <div class="card-body">
          
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CPF</th>
                        <th scope="col">CNS</th>
                        <th scope="col">NOME</th>
                        <th scope="col">DN</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">TELEFONE</th>
                        <th scope="col">MUNICÍPIO</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{ $patient->cpf }}</td>
                            <td>{{ $patient->cns }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->birth }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ "{$patient->county->name}/{$patient->county->fu}" }}</td>
                            <td>
                                <a href="{{route('patients.edit',$patient)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{route('patients.destroy',$patient)}}" method="POST" @style('display: inline-block') class="delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"> </i></button>

                            </form>
                            <a href="{{route('patients.show',$patient)}}" class="btn btn-info"><i class="fa-solid fa-eye"></i> </a>
                            <a href="{{ route('patients.pdf', $patient) }}" class="btn btn-dark" target="_blank"><i class="far fa-file-pdf"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-danger">Nenhum registro encontrado!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('patients.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('home') }}" class="btn btn-danger">Voltar</a>
        </div>
        <div class="card-footer">
          {{ $patients->links() }}
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('form.delete').on('click', (e) => {
            e.preventDefault()
            Swal.fire({
                title: "Apagar Paciente!",
                text: "Realmente deseja apagar esse paciente?",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Não",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim"
            }).then((result) => {
                if (result.isConfirmed) {
                    e.currentTarget.submit()
                }
            });
        })
    </script>
@endsection