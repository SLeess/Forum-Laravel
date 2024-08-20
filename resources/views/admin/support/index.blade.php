{{-- <h1>Listagem dos suportes</h1> --}}
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Aplicação</title>
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        body{
            height: 100vh;
        }
        .row{
            height: 30vh;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Listagem de Suportes</h1>
        @if(@session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Sucesso!</h4>
                <p>{{ session('msg') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Descrição</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $status = [
                        'a' => 'Ativo',
                        'p' => 'Parado',
                        'c' => 'Concluido'
                    ];
                @endphp
                @foreach ($supports as $support)
                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $support->subject }}</td>
                        <td>{{ $status[$support->status] }}</td>
                        <td>{{ $support->body }}</td>
                        <td><></td>
                        {{-- $support --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('supports.create') }}">Nova listagem</a>
    </div>
</body>
