@extends('layout.sidenav-layout')
@section('content')
    @include('components.heroSection.hero-section-list')
    @include('components.heroSection.hero-section-create')
    @include('components.heroSection.hero-section-update')
    @include('components.heroSection.hero-section-delete')
@endsection
