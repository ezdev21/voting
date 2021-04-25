@extends('layouts.app')
@section('content')
        <div id="app" class="flex flex-row flex-wrap ">
                @forelse ($candidates as $candidate)
                <div class="p-2 m-3 shadow-xl">
                  <img src="/storage/candidates/{{$candidate->id}}.jpg" alt="candidate photo" width="200px">
                  <p><span class="text-xl text-blue-900 font-bold">{{$candidate->name}}</span>
                    <result-component score="{{$candidate->voters()->count()}}"></result-component>
                      <vote-component candidateId="{{$candidate->id}}" userId="{{Auth::user()->id}}"></vote-component>
                  </p>
                </div>
                @empty
                  <p class="text-red-900 font-bold text-xl">no candidates found yet</p>
                @endforelse
        </div>
@endsection