@extends('admin-panel.layouts.app')
@section('title', 'Data Presensis')
@section('content')
    @include('admin-panel.administrator.presensi-management.html')
@endsection
@section('extra_javascript')
    @include('admin-panel.administrator.presensi-management.javascript')
@endsection
