<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class questions extends Model
{
    public function answers()
    {
        return $this->hasMany('App\Models\answers');
    }

    public static function homequestion()
    {
        // To limit questions per page just change simplePaginate(10) value for e.g simplePaginate(5) this will show 5 questions per page.
        $question = DB::table('questions')
                        ->join('answers', 'questions.id', '=', 'answers.questions_id')
                        ->select('questions.id', 'questions.title', 'answers.description', 'answers.questions_id')
                        ->orderBy('questions.lastmodified', 'DESC')
                        ->groupBy('answers.questions_id')
                        ->simplePaginate(10);

        //$question = DB::select('select questions.id, questions.title, answers.description, answers.questions_id FROM `questions` INNER JOIN `answers` on questions.id = answers.questions_id ORDER BY questions.lastmodified DESC');

        return $question;
    }
}