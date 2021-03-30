<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use Illuminate\Support\Facades\Hash;
use App\Laravue\Models\User;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getQuestions($annee)
    {
        $questions = question::all()->where('annee',$annee);
        return response()->json(['questions' => $questions], 200); 
    }

    public function addUser($annee,$fq,$sq,$tq,Request $request)
    {
        $count = true;
        $detector = 0;
        $reponses = question::all()->where('annee',$annee);
        foreach($reponses as $reponse)
        {
            if($detector == 0)
            {
                if(strcmp($reponse->reponse , $fq) != 0)
                $count = false;
            }
            elseif($detector == 1)
            {
                if(strcmp($reponse->reponse , $sq) != 0)
                $count = false;
            }
            elseif($detector == 2)
            {
                if(strcmp($reponse->reponse , $tq) != 0)
                $count = false;
            }
            $detector++;
        }

        if($count == true)
        {
            $user = new User();
            $user->password = Hash::make($request->mdp);
            $user->email = $request->email;
            $user->name = $request->nom.' '.$request->prenom;
            $user->statut = 1;
            $user->save();
        }
        else
        {
            $user = new User();
            $user->password = Hash::make($request->mdp);
            $user->email = $request->email;
            $user->name = $request->nom.' '.$request->prenom;
            $user->statut = 0;
            $user->save();
            return response()->json(['success'=>0]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
