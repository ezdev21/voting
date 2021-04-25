@extends('layouts.app')
@section('content')
    <div class="container" id="app">
        <div class="flex flex-row flex-wrap ">
                @forelse ($candidates as $candidate)
                <div class="p-2 m-3 shadow-xl">
                  <img src="/storage/candidates/{{$candidate->id}}.jpg" alt="candidate photo" width="200px">
                  <p><span class="text-xl text-blue-900">{{$candidate->name}}</span>
                    <resultComponent userId="{{$candidate->id}}">
                    @can('vote',Auth::user())
                      <voteComponent candidateId="{{$candidate->id}}" userId="{{Auth::user()->id}}"/>
                    @endcan
                  </p>
                </div>
                @empty
                  <h3>no candidates found yet</h3>
                @endforelse
        </div>
@endsection