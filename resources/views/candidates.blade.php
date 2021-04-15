<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>voting</title>
</head>
<body>
    <div class="container" id="app">
        <div>
            @forelse ($candidates as $candidate)
                <img src="'public/candidates'.{{$candidate->id}}" alt="candidate photo" width="100px">
                <p>{{$candidate->name}} <span>{{$candidate->score}}</span>
                    @can('vote',Candidate::class)
                      <buttonComponent candidate="{{$candidate}}" user="{{Auth::user()}}"/>
                    @endcan
                </p>
            @empty
                <h3>no candidates found yet</h3>
            @endforelse
        </div>
    </div>
</body>
<script src="{{mix('js/app.js')}}"/>
</html>