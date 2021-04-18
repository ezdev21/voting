@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('vote.register.submit')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <label for="name">name</label>
          <input type="text" name="name">
          <label for="email">email</label>
          <input type="text" name="email">
          <input type="file" value="upload photo">
          <input type="submit" value="register">
        </form>
    </div>
@endsection