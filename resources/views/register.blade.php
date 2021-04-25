@extends('layouts.app')
@section('content')
    <div class="bg-gray-300">
        <form method="post" action="{{route('vote.register.submit')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <label for="name">name</label>
          <input type="text" name="name" class="block w-30 sm:w-full h-10" placeholder="candidate name">
          <label for="email">email</label>
          <input type="text" name="email" class="block w-30 sm:w-full h-10" placeholder="candidate email">
          <input type="file" name="avatar" value="upload photo" >
          <input type="submit" value="register" class="m-1 px-2 text-white text-xl bg-green-700">
        </form>
    </div>
@endsection