<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>voting</title>
</head>
<body>
    <div class="container">
        <div>
            @forelse ($candidates as $candidate)
                <img src="'public/candidates'.{{$candidate->id}}" alt="candidate photo" width="100px">
                <p>{{$candidate->name}} <span>{{$candidate->score}}</span>
                <button>
                    @can('vote',Candidate::class)
                    vote
                    @endcan
                </button>
            </p>
            @empty
                <h3>no candidates found yet</h3>
            @endforelse
        </div>
    </div>
</body>
</html>