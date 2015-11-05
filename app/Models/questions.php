<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class questions extends Model
{
    public static function homequestion()
    {
        $question = DB::table('questions')
                        ->join('answers', 'questions.id', '=', 'answers.qid')
                        ->select('questions.id', 'questions.title', 'answers.description', 'answers.qid')
                        ->orderBy('questions.lastmodified', 'DESC')
                        ->groupBy('answers.qid')
                        ->get();

        //$question = DB::select('select questions.id, questions.title, answers.description, answers.qid FROM `questions` INNER JOIN `answers` on questions.id = answers.qid ORDER BY questions.lastmodified DESC');

        return $question;
    }

    public static function tagsearch($tag)
    {
        $question = DB::table('questions')
                        ->join('answers', 'questions.id', '=', 'answers.qid')
                        ->select('questions.id', 'questions.title', 'answers.description', 'answers.qid')
                        ->orderBy('questions.lastmodified', 'DESC')
                        ->groupBy('answers.qid')
                        ->where('questions.title', 'LIKE', '%'.$tag.'%')
                        ->get();
        return $question;
    }

    public static function tags()
    {
        $question = DB::table('questions')
                        ->select('title')
                        ->get();
        return $question;
    }

    public static function add_question($fields)
    {
        $date = date('Y-m-d H:i:s', time());
        DB::table('questions')->insert(
            ['title' => $fields, 'lastmodified' => $date]
        );

        $id = DB::select('select id from questions ORDER BY lastmodified DESC LIMIT 1');
        return $id;
    }

    public static function show_question_answers($qid)
    {
        $question = questions::where('id', '=', $qid)->firstOrFail();
        $answer = answers::where('qid', '=', $qid)->get();
        //$answer = DB::select('select * from answers where qid=?', [$qid]);

        $output = ['title' => $question->title, 'answer' => $answer];
        return $output;
    }
}
