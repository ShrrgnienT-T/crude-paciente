<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

</head>

<body>

    <h1>Detalhes do Paciente: {{ $data->name}}</h1>
    <ul>
        <!--//TODO bug ao renderizar a imagem-->
        <li>FOTO: XXXXX</li>
        <li>ID: {{$data->id}}</li>
        <li>CPF: {{$data->cpf}}</li>
        <li>CNS: {{$data->cns}}</li>
        <li>NOME: {{$data->name}}</li>
        <li>DN: {{$data->birth}}</li>
        <li>E-MAIL:{{$data->email}}</li>
        <li>TELEFONE: {{$data->phone}}</li>
        <li>MUNICÍPIO: {{$data->county->name}}/{{$data->county->fu}}</li>
    </ul>

</body>



</html>