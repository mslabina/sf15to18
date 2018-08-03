<?php
//takes a 15 character case sensetive Id and turns it into an 18 character case insensitive Id
function sfdc15to18($id)
{
    $charLibrary = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ012345';

    // check the id is 18 digits long
    if(strlen($id) == 18)
    {
        return $id; //it is, exit
    }

    // check if the id is 15 digits long
    if(strlen($id) != 15)
    {
        throw new Exception("The given id isn't 15 characters long.");
    }
    
    // generate the last 3 digits
    for($i = 0; $i < 3; $i++)
    {
        $charLookup = 0;

        // For every 5-digit block of the given id
        for($j = 0; $j < 5; $j++)
        {
            // Assign the j-th chracter of the i-th 5-digit block to c
            $charFound = substr($id, (($i * 5) + $j), 1);

            // check if this character is an uppercase letter
            if(!is_numeric($charFound) && strtoupper($charFound) === $charFound)
            {
                // Set a 1 at the character's position in the reversed segment
                $charLookup += 1 << $j;
            }
        }

        // Add the calculated character for the current block to the id
        $id .= substr($charLibrary, $charLookup, 1);
    }

    return $id;
}
?>
