@extends('admin-panel.layouts.app')
@section('title', 'Profile')
@section('content')
    @include('admin-panel.profile.html')
@endsection
@section('extra_javascript')
    @include('admin-panel.profile.javascript')
@endsection
