@extends('admin.layouts.app')

@section('title', 'Exibindo a dúvida {{ $support->subject }}')

@section('header')
<h1>Exibindo dados da dúvida {{ $support->id }}</h1>
@endsection

@section('content')
<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Conteudo: {{ $support->body }}</li>
</ul>

<form action="{{ route('supports.destroy', $support->id) }}" method="post">
    <x-delete-support/>
</form>
@endsection
