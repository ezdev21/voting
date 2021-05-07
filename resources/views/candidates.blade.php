@extends('layouts.app')
@section('content')
<div>
  </div>
        <div id="app" class="flex flex-wrap">
                @forelse ($candidates as $candidate)
                <div class="flex-auto p-2 m-3 shadow-xl">
                  <img src="storage/candidates/{{$candidate->avatar}}" alt="candidate photo" width="200px">
                  <p><span class="text-xl text-blue-900 font-bold">{{$candidate->name}}</span>
                    <result-component score="{{$candidate->voters()->count()}}" candidateid="{{$candidate->id}}"></result-component>
                    @can('vote',Auth::user())
                       <vote-component candidateid="{{$candidate->id}}" userId="{{Auth::user()->id}}"></vote-component> 
                    @endcan
                  </p>
                </div>
                @empty
                  <p class="text-red-900 font-bold text-xl">no candidates found yet</p>
                @endforelse
        </div>
@endsection