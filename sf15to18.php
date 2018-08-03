<?php
function sfdc15to18($id)
{//takes a 15 character case sensetive Id and turns it into an 18 character case insensative Id

    $charLibrary = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ012345';

    //check the id is 18 digets long
    if(strlen($id) != 15)
    {//it is, exit
        return $id;
    }

    //check the id is 15 digets long
    if(strlen($id) != 15)
    {
        throw new Exception("'id' must be exactly least 15 characters long");
    }
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

        //add our newly generated character to the string
        $id .= substr($charLibrary, $charLookup, 1);
    }

    return $id;
}
?>