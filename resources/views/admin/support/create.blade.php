@extends('admin.layouts.app')

@section("title", "Novo Tópico")

@section('header')
<h1 class="text-lg text-black-500">Nova dúvida</h1>
@endsection

@section('content')
<form action="{{ route('supports.store') }}" method="POST">
    @include('admin.partials.form', [
        'textButton' => 'Nova dúvida'
    ])
</form>
@endsection

{{-- <div class="align-items-center"> --}}
    {{-- <form action="{{ route('supports.store') }}" method="POST" class="p-5 mx-5 g-3"> --}}
        {{-- @include('admin.partials.form') --}}
        {{-- @section('action', 'Criar') --}}
    {{-- </form> --}}
{{-- </div> --}}

{{-- @section('flashMessage')
@include('admin.partials.flashMessage')
@endsection --}}
