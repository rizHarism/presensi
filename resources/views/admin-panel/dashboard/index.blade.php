@extends('admin-panel.layouts.app')
@section('title', 'Dashboard')
@section('content')
    @include('admin-panel.dashboard.html')
@endsection
@section('extra_javascript')
    @include('admin-panel.dashboard.javascript')
@endsection
