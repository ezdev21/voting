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
      $this->validate($request,[
          'name'=>['required','string','min:4','max:20'],
          'email'=>['required','email'],
          'avatar'=>['required','image']
      ]);
      $candidate=new candidate;
      $candidate->email=$request->email;
      $candidate->name=$request->name;
      $filename=$candidate->email.''.$request->avatar->getClientMimeType();
      $candidate->avatar=$filename;
      $candidate->save();
      $request->avatar->storeAs('candidates',$filename,'public');
      return redirect()->route('candidates');
    }
    public function vote($candidateId,$userId){
        $user=User::findOrFail($userId);
        $user->candidate_id=$candidateId;
        $user->save();
        return true;
    }
    public function result($id)
    {
        $candidate=Candidate::findOrFail($id);
        $score=$candidate->voters()->count();
        return response()->json(['score'=>$score]);
    }
}
