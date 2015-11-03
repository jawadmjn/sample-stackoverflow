<?php namespace App\Http\Controllers;

use Request;
use App\questions;
use App\answers;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function createview()
    {
        return view('createview');
    }

    public function createquestion()
    {
        $input = Request::all();

        // Add question and get the ID of the Question
        $qid = questions::add_question($input['title']);

        // Pass question Id and Description of Answer
        $aid = answers::add_answer($input['detail'], $qid);

        dd($aid);
        return view('createview');
    }

    public function showquestion()
	{
		return view('createview');
	}

}