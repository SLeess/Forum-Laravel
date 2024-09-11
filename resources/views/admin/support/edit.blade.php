@extends('admin.partials.html')

@section('title', 'Editar Suporte')

@section('title-body')
<h1 class="text-center">Suporte: {{ $support->id }}</h1>
@endsection

<x-alert/>

@section('content')
<div class="align-items-center">
    <form action="{{ route('supports.update', $support->id ) }}" method="POST" class="g-3 p-5 mx-5">
        @method('PUT')
        @include('admin.partials.form', ['action' => 'Editar'])
        {{-- @section('method-except-POST')
            @method('PUT')
        @endsection --}}
    </form>
</div>
