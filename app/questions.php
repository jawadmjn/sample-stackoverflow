<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class questions extends Model
{
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
