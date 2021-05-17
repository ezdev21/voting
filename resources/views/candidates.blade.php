@extends('layouts.app')
@section('content')
<div>
  </div>
        <div id="app" class="flex flex-wrap">
                @forelse ($candidates as $candidate)
                <div class="flex-initial p-2 m-3 shadow-xl">
                  <img src="/storage/candidates/{{$candidate->avatar}}" alt="candidate photo" width="200px">
                  <p><span class="text-xl text-blue-900 font-bold">{{$candidate->name}}</span>
                   <vote-component candidate-id="{{$candidate->id}}" user-id="{{Auth::user()->id}}"></vote-component> 
                  </p>
                </div>
                @empty
                  <p class="text-red-900 font-bold text-xl">no candidates found yet</p>
                @endforelse
        </div>
@endsection