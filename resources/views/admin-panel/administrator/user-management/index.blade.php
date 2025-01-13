@extends('admin-panel.layouts.app')
@section('title', 'Data Karyawan')
@section('content')
    @include('admin-panel.administrator.user-management.html')
@endsection
@section('extra_javascript')
    @include('admin-panel.administrator.user-management.javascript')
@endsection
