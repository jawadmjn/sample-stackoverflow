<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\jawad;

class TestdbController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        //DB::insert('insert into questions (title) values (?)', ['This is my First question']);
        //DB::delete('delete from questions');
        //$users = DB::select('select * from questions where id = ?', [1]);
        //$users = DB::select('select * from questions');

        $input = Request::all();
        $input = 'This is my First question';

        //$output = jawad::add_data($input);
        $output = jawad::retrieve_data($input);


        dd($output);

        return view('testdb', ['users' => $users]);
    }
}