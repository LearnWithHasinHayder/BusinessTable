@extends('layout.app')
@section('content')
    @include('components.customer.customer-list')
    @include('components.customer.customer-create')
    @include('components.customer.customer-update')
@endsection
