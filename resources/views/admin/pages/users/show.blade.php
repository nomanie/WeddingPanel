@extends('admin.master')

@section('header')
    @include('admin.global.header.header')
@endsection

@section('sidebar')
    @include('admin.global.sidebar.sidebar')
@endsection
@section('body')
    @include('admin.components.users.show')
@endsection()
