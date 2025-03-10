@extends('layout.sidenav-layout')
@section('content')
    @include('components.shift.shift-list')
    @include('components.shift.shift-delete')
    @include('components.shift.shift-create')
    @include('components.shift.shift-update')
@endsection
