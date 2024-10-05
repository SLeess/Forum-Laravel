{{-- @extends('admin.partials.html') --}}
@extends('admin.layouts.app')

@section('title', 'Fórum 2.0')

@section('header')
    @include('admin.partials.header', compact('supports'))
@endsection

@section('flashMessage')
    @include('admin.partials.flashMessage')
@endsection

@section('content')
    @include('admin.partials.content', [
        "color" => "blue"
    ])
@endsection
