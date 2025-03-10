@extends('layout.sidenav-layout')
@section('content')
    @include('components.campus.campus-list')
    @include('components.campus.campus-delete')
    @include('components.campus.campus-create')
    @include('components.campus.campus-update')
@endsection
