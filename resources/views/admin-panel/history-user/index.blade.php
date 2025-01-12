@extends('admin-panel.layouts.app')
@section('title', 'Riwayat Presensi')
@section('content')
    @include('admin-panel.history-user.html')
@endsection
@section('extra_javascript')
    @include('admin-panel.history-user.javascript')
@endsection
