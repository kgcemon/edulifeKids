@extends('layout.sidenav-layout')
@section('content')
    @include('components.batch.batch-list')
    @include('components.batch.batch-create')
    @include('components.batch.batch-update')
@endsection
