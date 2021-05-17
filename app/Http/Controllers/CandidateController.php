<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $candidates=Candidate::latest()->get();
        return view('candidates',['candidates'=>$candidates]);
    }
    public function register(){
        return view('register');
    }
    public function store(Request $request){
      $this->authorize('create',Candidate::class);  
      $this->validate($request,[
          'name'=>['required','string','min:4','max:20'],
          'email'=>['required','email'],
          'avatar'=>['required','image']
      ]);
      $candidate=new candidate;
      $candidate->email=$request->email;
      $candidate->name=$request->name;
      $filename=$candidate->email.'.'.$request->avatar->extension();
      $candidate->avatar=$filename;
      $candidate->save();
      $request->avatar->storeAs('candidates',$candidate->avatar,'public');
      return redirect()->route('candidates');
    }
    public function result(Request $request)
    {
        $candidate=Candidate::findOrFail($request->candidateId);
        $user=User::findOrFail($request->userId);
        $candidateScore=$candidate->users()->count();
        $user->candidate ? $voted=true : $voted=false;
        return response()->json(['candidateScore'=>$candidateScore,'voted'=>$voted]);
    }
    public function vote(Request $request){
        $user=User::findOrFail($request->userId);
        $user->candidate_id=$request->candidateId;
        $user->save();
    }
}
