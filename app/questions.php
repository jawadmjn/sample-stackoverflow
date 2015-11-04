<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class questions extends Model
{
    protected static function add_question($fields)
    {
        $date = date('Y-m-d H:i:s', time());
        DB::table('questions')->insert(
            ['title' => $fields, 'lastmodified' => $date]
        );

        $id = DB::select('select id from questions ORDER BY lastmodified DESC LIMIT 1');
        return $id;
    }
}
