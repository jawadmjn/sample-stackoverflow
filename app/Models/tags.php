<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    public static function get_tag($questions)
    {
        $utag = null;
        if($questions != null)
        {
            // This loop getting all the Questions title and exploding w/t "SPACE "
            foreach ($questions as $key => $value)
            {
                $tag[] = explode(" ", $value->title);
            }

            // This loop getting Single values from each array stored in tag[]
            foreach ($tag as $key => $value)
            {
                foreach ($value as $key => $singlevalue)
                {
                    // Storing all the single values in another tags array if its leanghty enough to be a tag and for avoiding words like, is, am, on a ...
                    if (strlen($singlevalue) > 2)
                    {
                        $utag[] = $singlevalue;
                        // if there is no value > 2, then this will be a null array and we should not return it.
                    }
                }
            }
            // if $questions != null and leangth of all singlevalues from title is < 2 then $utag array will be null, so not return  NULL array.
            if($utag != null)
            {
                // Make every single value unique, so no repeating of tags
                $utag = array_unique($utag);
            }
        }

        // Make every single value unique, so no repeating of tags
        return $utag;
    }

    public static function get_questiontag($title)
    {
        $utag = null;
        $tag[] = explode(" ", $title);
        // This loop getting Single values from each array stored in tag[]
        foreach ($tag as $key => $value)
        {
            foreach ($value as $key => $singlevalue)
            {
                // Storing all the single values in another tags array if its leanghty enough to be a tag and for avoiding words like, is, am, on a ...
                if (strlen($singlevalue) > 2)
                {
                    $utag[] = $singlevalue;
                    // if there is no value > 2, then this will be a null array and we should not return it.
                }
            }
        }
        if($utag != null)
        {
            // Make every single value unique, so no repeating of tags
            return $utag = array_unique($utag);
        }
        else
        {
            return $utag;
        }
    }
}