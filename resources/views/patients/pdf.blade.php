<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

</head>

<body>
    {{-- @dd($data) --}}

    <h1>Detalhes do Paciente: {{ $data->name }}</h1>
    <ul>

        <li>FOTO:
            @php
                $url = $data->foto
                    ? public_path('storage') . '/' . $foto
                    : public_path('images') . '/' . mt_rand(1, 9) . '.png';
            @endphp
            <br />
            <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents($url)) }}" @style('width: 200px; height: 200px; border: 1px solid black; border-radius: 50%') />
        </li>
        <li>ID: {{ $data->id }}</li>
        <li>CPF: {{ $data->cpf }}</li>
        <li>CNS: {{ $data->cns }}</li>
        <li>NOME: {{ $data->name }}</li>
        <li>DN: {{ $data->birth }}</li>
        <li>E-MAIL:{{ $data->email }}</li>
        <li>TELEFONE: {{ $data->phone }}</li>
        <li>MUNICÍPIO: {{ $data->county->name }}/{{ $data->county->fu }}</li>
    </ul>

</body>



</html>
