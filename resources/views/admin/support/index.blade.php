@extends('admin.partials.html')

@section('title', 'Fórum 2.0')

@section('title-body')
<h1>Listagem de Suportes</h1>
@endsection

@section('flashMessage')
@extends('admin.partials.flashMessage')
@endsection

@section('content')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col"></th>
            <th scope="col">Assunto</th>
            <th scope="col">Status</th>
            <th scope="col">Descrição</th>
            <th scope="col"></th>
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
        @foreach ($supports->items() as $support)
            <tr>
                <th scope="row">#</th>
                <td>{{ $support->subject }}</td>
                <td>{{ $status[$support->status] }}</td>
                <td>{{ $support->body }}</td>
                <td><a class="btn btn-primary" href="{{ route('supports.show', $support->id) }}">Ver mais</a></td>
                <td><a class="btn btn-warning" href="{{ route('supports.edit', $support->id) }}">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-pagination :paginator="$supports" :appends="$filters"/>
<a class="btn btn-primary mt-3" href="{{ route('supports.create') }}">Nova listagem</a>
@endsection
