@extends('admin-panel.layouts.app')
@section('title', 'Presensi')
@section('content')
    @include('admin-panel.presensi.html')
@endsection
@section('extra_javascript')
    @include('admin-panel.presensi.javascript')
@endsection
