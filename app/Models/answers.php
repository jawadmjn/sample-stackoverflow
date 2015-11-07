<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class answers extends Model
{
    public static function get_qid()
    {
        $qid = DB::select('select id from questions ORDER BY lastmodified DESC LIMIT 1');

        // qid comes in an array, just for making it sure a check when its an array not a nummeric value then go in loop foreach
        if(!is_numeric($qid))
        {
            $qid = $qid[0];
            foreach ($qid as $key => $value)
            {
                if(is_numeric($value))
                {
                    $qid = $value;
                }
            }
        }
        return $qid;
    }
}