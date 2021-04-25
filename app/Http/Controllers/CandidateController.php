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
          'name'=>['requred','string','min:4',],
          'email'=>['required','email'],
          'avatar'=>['required','image']
      ]);
      $candidate=Candidate::create(['name'=>$request->name,'email'=>$request->email]);
      $request->avatar->storeAs('candidates',$candidate->id.getClientMimeType(),'public');
      return redirect()->route('candidates');
    }
    public function vote(Request $request){
        $candidateId=$request->candidateId;
        $userId=$request->userId;
        DB::table('users')->where('id',$userId)->update('candidate_id',$candidateId);
    }
    public function result($id)
    {
        $candidate=Candidate::findOrFail($id);
        $score=$candidate->voters()->count();
        return response()->json(['score'=>$score]);
    }
}
