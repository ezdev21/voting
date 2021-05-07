@extends('layouts.app')
@section('content')
    <div>
    <a href="{{route('vote.register')}}" class="text-xl text-green-800">register for vote</a>
    <a href="{{route('candidates')}}" class="text-xl text-red-900">vote</a>
    </div>
@endsection