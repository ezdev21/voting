@extends('layouts.app')
@section('content')
    <div class="mx-auto w-1/2">
        <form method="post" action="{{route('vote.register.submit')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <label for="name" class="text-xl">name</label>
          <input type="text" name="name" class="block text-xl p-1 m-1 rounded border-2 border-gray-600" placeholder="candidate name">
          <label for="email" class="text-xl">email</label>
          <input type="text" name="email" class="block text-xl p-1 m-1 rounded border-2 border-gray-600" placeholder="candidate email">
          <label for="avatar" class="text-xl"></label>
          <input type="file" name="avatar" value="upload photo" class="block text-xl m-1">
          <input type="submit" value="register" class="m-1 p-1 px-4 text-white text-xl bg-green-700 rounded">
        </form>
    </div>
@endsection