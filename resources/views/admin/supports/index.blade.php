@extends('admin.layouts.app')
@section('title', 'Supports')
@section('header')
    @include('admin.supports.partials.header')
@section('content')
    @include('admin.supports.partials.content')
    <x-pagination :paginator="$supports" :appends="$filters" />
@endsection
