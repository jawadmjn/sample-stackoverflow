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
                ->with('reqPagination', $reqPagination)
                ->with('active', $active);
    }

    public function tags()
    {
        $output = new questions;
        $tag = $output::select('title')->get();
        $getTag = tags::get_tag($tag);
        return view('tags')->with('tag', $getTag);
    }

    public function tagsearch($tag)
    {
        $output = new questions;
        $tagresults = $output::select('questions.id', 'questions.title', 'answers.description')
                        ->join('answers', 'questions.id', '=', 'answers.questions_id')
                        ->orderBy('questions.lastmodified', 'DESC')
                        ->groupBy('answers.questions_id')
                        ->where('questions.title', 'LIKE', '%'.$tag.'%')
                        ->get();

        return view('tagsearch')
                ->with('tagresults', $tagresults)
                ->with('tag', $tag);
    }

    public function createview()
    {
        return view('createview');
    }

    public function createquestion()
    {
        $input = Request::all();

        // check for if user disable JS and submit empty form.
        if($input['title'] == "" || $input['detail'] == "")
        {
            return view('createview')->with('error', "Please fill, all fields are Required.");
        }

        // Create the Question
        $createquestion = new questions;
        $createquestion->title = $input['title'];
        $createquestion->lastmodified = date('Y-m-d H:i:s', time());
        $result = $createquestion->save();

        // after Adding question get the ID of the Question for putting it as FK in answers table
        $qid = answers::get_qid();
        //$qid = $createquestion::select('id')->orderBy('lastmodified', 'DESC')->take(1)->get();

        // Create the Answer with proper question id.
        $createanswer = new answers;
        $createanswer->description = $input['detail'];
        $createanswer->questions_id = $qid;
        $createanswer->lastmodified = date('Y-m-d H:i:s', time());
        $result = $createanswer->save();

        // After saving Q and A pass the aid to display the page with Q and A
        return Redirect::to('/showquestion?qid=' . $qid);
    }

    public function createanswer()
    {
        $input = Request::all();

        // check for if user disable JS and submit empty form.
        if($input['detail'] == "")
        {
            $error = "Answer can't be blank.";
            return Redirect::to('/showquestion?qid=' . $input['qid'] . '&error=' . $error);
        }

        $createanswer = new answers;
        $createanswer->description = $input['detail'];
        $createanswer->questions_id = $input['qid'];
        $createanswer->lastmodified = date('Y-m-d H:i:s', time());
        $result = $createanswer->save();

        // After saving Q and A pass the qid to display the page with Q and A
        return Redirect::to('/showquestion?qid=' . $input['qid']);
    }

    public function showquestion()
    {
        $input = Request::all();

        $error = "";
        if( isset($input['error']) )
        {
            $error = $input['error'];
        }

        $question = questions::where('id', '=', $input['qid'])->firstOrFail();

        // To limit answers per page just change paginate(8) value for e.g paginate(5) this will show only 5 answers per page.
        $answers = questions::find($input['qid'])->answers()->paginate(3);

        // $answers->setPath('showquestion'); // bug fix only for goddady

        $output = ['title' => $question->title, 'answer' => $answers];


        return view('showquestion')
            ->with('results', $output)
            ->with('qid', $input['qid'])
            ->with('error', $error);
    }

}