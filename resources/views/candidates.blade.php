@extends('layouts.app')
@section('content')
    <div class="container" id="app">
        <div>
            @forelse ($candidates as $candidate)
                <img src="'public/candidates'.{{$candidate->id}}" alt="candidate photo" width="100px">
                <p>{{$candidate->name}}
                    <voteComponent userId="{{Auth::user()->id}}">
                    @can('vote',Candidate::class)
                      <buttonComponent candidateId="{{$candidate->id}}" userId="{{Auth::user()->id}}"/>
                    @endcan
                </p>
            @empty
                <h3>no candidates found yet</h3>
            @endforelse
        </div>
@endsection