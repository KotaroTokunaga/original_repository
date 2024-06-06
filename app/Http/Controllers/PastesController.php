<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PastesController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

    }

    public function hi(){

        echo 'Hi, nice to meet you Wataru!!<br>';

        echo 'コントローラーから';

    }

    public function index(){

        $list = DB::table('pastes')->get();

        return view('pastes.index',['lists'=>$list]);

    }

    public function createForm(){

        return view('pastes.createForm');

    }

    public function create(Request $request){

        $pasta = $request->input('newPost');

        DB::table('pastes')->insert([

            'pasta' => $pasta
        ]);

        return redirect('/index_Pa');

    }

    public function updateForm($id){

        $pasta = DB::table('pastes')

        ->where('id', $id)

        ->first();

        return view('pastes.updateForm', ['pasta' => $pasta]);

    }

    public function update(Request $request){

        $id = $request->input('id');

        $up_post = $request->input('upPost');

        DB::table('pastes')

        ->where('id',$id)

        ->update(

            ['pasta' => $up_post]
        );

        return redirect('/index_Pa');

    }

    public function delete($id){

        DB::table('pastes')

        ->where('id', $id)

        ->delete();


        return redirect('/index_Pa');

    }

}
