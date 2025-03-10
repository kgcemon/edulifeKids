@extends('layout.sidenav-layout')
@section('content')
    @include('components.student.student-list')
{{--    @include('components.student.student-delete')--}}
    @include('components.student.student-create')
{{--    @include('components.student.student-update')--}}
@endsection
