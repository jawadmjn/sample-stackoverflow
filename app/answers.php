<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class answers extends Model
{
    public static function add_answer($fields, $qid)
    {
        $qid = $qid[0];
        foreach ($qid as $key => $value)
        {
            if(is_numeric($value))
            {
                $qid = $value;
            }
        }

        $date = date('Y-m-d H:i:s', time());
        $result = DB::table('answers')->insert(
            ['description' => $fields, 'qid' => $qid, 'lastmodified' => $date]
        );

        return $result;
    }
}