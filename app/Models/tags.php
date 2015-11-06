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
                    // Storing all the single values in another tags array if its leanghty enough to be a tag
                    if (strlen($singlevalue) > 2)
                    {
                        $utag[] = $singlevalue;
                    }
                }
            }
            // Make every single value unique, so no repeating of tags
            $utag = array_unique($utag);
        }

        // Make every single value unique, so no repeating of tags
        return $utag;
    }

    public static function get_questiontag($title)
    {
        $tag[] = explode(" ", $title);
        // This loop getting Single values from each array stored in tag[]
        foreach ($tag as $key => $value)
        {
            foreach ($value as $key => $singlevalue)
            {
                // Storing all the single values in another tags array if its leanghty enough to be a tag
                if (strlen($singlevalue) > 2)
                {
                    $utag[] = $singlevalue;
                }
            }
        }
        // Make every single value unique, so no repeating of tags
        return $utag = array_unique($utag);
    }
}