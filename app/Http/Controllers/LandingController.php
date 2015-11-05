<?php namespace App\Http\Controllers;
use Request;
use Redirect;
use App\Models\questions;
use App\Models\answers;
use App\Models\tags;

class LandingController extends Controller
{
    public function index()
    {
        $output = questions::homequestion();
        return view('landing')->with('questions', $output);
    }

    public function tags()
    {
        $output = questions::tags();
        $getTag = tags::get_tag($output);
        return view('tags')->with('tag', $getTag);
    }

    public function tagsearch($tag)
    {
        $output = questions::tagsearch($tag);
        return view('tagsearch')
                ->with('questions', $output)
                ->with('tag', $tag);
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

        // After saving Q and A pass the aid to display the page with Q and A
        return Redirect::to('/showquestion?qid=' . $aid);
    }

    public function createanswer()
    {
        $input = Request::all();

        // Pass question Id and Description of Answer
        $aid = answers::add_answer($input['detail'], $input['qid']);

        // After saving Q and A pass the qid to display the page with Q and A
        $output = questions::show_question_answers($input['qid']);
        return Redirect::to('/showquestion?qid=' . $input['qid']);
    }

    public function showquestion()
    {
        $input = Request::all();
        $output = questions::show_question_answers($input['qid']);
        return view('showquestion')
            ->with('title', $output['title'])
            ->with('answer', $output['answer'])
            ->with('qid', $input['qid']);
    }

}