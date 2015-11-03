<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class questions extends Model
{
    protected static function add_question($fields)
    {
        DB::table('questions')->insert(
            ['title' => $fields]
        );

        $id = DB::select('select id from questions ORDER BY updated_at DESC LIMIT 1');
        return $id;
    }
}
