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
        $totalQuestions = questions::select()->count();

        // To limit questions per page got into app/models/questions::homequestions and
        // just change simplePaginate(10) value for e.g simplePaginate(5) this will show 5 questions per page.

        // For finding how many numbers we need for pagination i use this technique
        // $maximum questions / Question to show PerPage
        $reqPagination = ceil( $totalQuestions / $output->perPage() );
        $reqPagination = number_format($reqPagination, 0);

        // For adding active class in pagination menu
        $currentPageurl = $output->url($output->currentPage()); // get current page url
        // get the numeric value from url for comparing it with for-loop $i
        $active = filter_var($currentPageurl, FILTER_SANITIZE_NUMBER_INT);

        return view('landing')
                ->with('questions', $output)
                ->with('totalQuestions', $totalQuestions)
                ->with('reqPagination', $reqPagination)
                ->with('active', $active);
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

        // To limit answers per page got into app/models/questions::show_question_answers and
        // just change paginate(15) value for e.g paginate(5) this will show only 5 answers per page.

        return view('showquestion')
            ->with('results', $output)
            ->with('qid', $input['qid']);
    }

}