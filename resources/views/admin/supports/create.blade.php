@extends('admin.layouts.app')
@section('header')
    <h1>Nova dúvida</h1>
@endsection
@section('content')

<form action="{{ route('supports.store') }}" method="post">
    @include('admin.supports.partials.form')
</form>
@endsection
