<?php namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class jawad extends Model
{
    protected static function add_data($fields)
    {
        $result = DB::insert('insert into jawads (title) values (?)', [$fields]);
        return $result;
    }

    protected static function retrieve_data($fields)
    {
        $result = DB::select('select * from jawads where id = ?', [1]);
        return $result;
    }
}