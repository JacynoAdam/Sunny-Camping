@extends('layouts.admin')

@section('main')
    <reservations :rooms="{{ $rooms }}" :current="{{ $current }}"></reservations>
@endsection
