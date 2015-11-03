<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class answers extends Model
{
    public static function add_answer($fields, $qid)
    {
        $result = DB::table('answers')->insert(
            ['description' => $fields, 'qid' => $qid]
        );

        return $result;
    }

    // protected static function retrieve_data($fields)
    // {
    //     $result = DB::select('select * from questions where id = ?', [1]);
    //     return $result;
    // }

}