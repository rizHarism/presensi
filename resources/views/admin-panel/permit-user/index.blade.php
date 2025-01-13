@extends('admin-panel.layouts.app')
@section('title', 'Perizinan')
@section('content')
    @include('admin-panel.permit-user.html')
@endsection
@section('extra_javascript')
    @include('admin-panel.permit-user.javascript')
@endsection
