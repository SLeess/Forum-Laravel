<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Suportes</title>
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Novo Suporte</h1>
    <div class="align-items-center">
        <form action="{{ route('supports.store') }}" method="POST" class="g-3 p-5 mx-5">
            @csrf()
            {{-- <input type="text" value="{{ csrf_token() }}" name="_token" hidden> --}}
            <div class="row mb-3">
                <label for="inputAssunto3" class="col-sm-4 col-form-label">Título do assunto</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Assunto do suporte" name="subject" class="form-control"/>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputStatus3" class="col-sm-4 col-form-label">Status</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="a">
                    <label class="form-check-label" for="inputA">Ativo</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="p">
                    <label class="form-check-label" for="inputP">Parado</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="c">
                    <label class="form-check-label" for="inputC">Concluido</label>
                </div>
            <div class="row mb-3">
                <label for="inputBody3" class="col-sm-4 col-form-label">Descrição do Suporte</label>
                <div class="col-sm-8">
                    <textarea name="body" class="form-control" cols="5" rows="10" placeholder="Descrição"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
