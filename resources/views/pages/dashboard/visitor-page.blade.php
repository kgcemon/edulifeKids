@extends('layout.sidenav-layout')
@section('content')
    @include('components.visitors.visitor-list')
    @include('components.visitors.visitor-delete')
    @include('components.visitors.visitor-create')
    @include('components.visitors.visitor-update')
@endsection
