@extends('admin.components.html')

@section('title', 'Editar Suporte')

@section('title-body')
<h1 class="text-center">Suporte: {{ $support->id }}</h1>
@if($errors->any())
    @foreach ($errors->all() as $erro)
        <p class="text-center">{{ $erro }}</p>
    @endforeach
@endif
@endsection

@section('content')
<div class="align-items-center">
    <form action="{{ route('supports.update', $support->id ) }}" method="POST" class="g-3 p-5 mx-5">
        @csrf()
        @method('PUT')
        <div class="row mb-3">
            <label for="inputAssunto3" class="col-sm-4 col-form-label">Título do assunto</label>
            <div class="col-sm-8">
                <input type="text" placeholder="Assunto do suporte" name="subject" class="form-control" value="{{ $support->subject }}"/>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputBody3" class="col-sm-4 col-form-label">Descrição do Suporte</label>
            <div class="col-sm-8">
                <textarea name="body" class="form-control" cols="5" rows="10" placeholder="Descrição">{{ $support->body }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Editar Registro</button>
    </form>
</div>
@endsection
