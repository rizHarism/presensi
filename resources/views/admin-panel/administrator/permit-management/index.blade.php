@extends('admin-panel.layouts.app')
@section('title', 'Data Perizinan')
@section('content')
    @include('admin-panel.administrator.permit-management.html')
@endsection
@section('extra_javascript')
    @include('admin-panel.administrator.permit-management.javascript')
@endsection
