<?php
function sfdc15to18($id, $objectPrefix = null)
{//takes a 15 character case sensetive Id and turns it into an 18 character case insensative Id

    $charLibrary = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ012345';

    //check the id is at least 15 digets long
    if(strlen($id) < 15)
    {
        throw new Exception("'id' must be at least 15 characters long");
    }

    if($objectPrefix != null && strlen($objectPrefix) != 3)
    {
        throw new Exception("'objectPrefix' must be null or 3 characters long");
    }

    //check that the objectPrefix matches, if it has been set
    if($objectPrefix != null && substr($id, 0, 3) != $objectPrefix)
    {
        throw new Exception("'id' does not have the correct prefix: '".substr($id, 0, 3)."' (should be '".$objectPrefix."')");
    }

    //incase we are already being given an 18 length id, pull the first 15 out
    $id = substr($id, 0, 15);

    //generate the last 3 digets
    for($i = 0; $i < 3; $i++)
    {
        $charLookup = 0;

        //we'll use 5 characters to generate the check digits
        for($j = 0; $j < 5; $j++)
        {
            $charFound = substr($id, (($i * 5) + $j), 1);

            //check if this character is uppercase
            if(!is_numeric($charFound) && strtoupper($charFound) === $charFound)
            {//it is, do bitshift magic
                $charLookup += 1 << $j;
            }
        }

        $id .= substr($charLibrary, $charLookup, 1);
    }

    return $id;
}
?>