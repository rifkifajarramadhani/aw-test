<?php
// create a function to match string input with set of array
// example:
// input = tale, output = 3 => late, teal, tale

$data = [
    "below", "car", "chin", "elbow", "late", "state", "study", "taste", "teal", "tale"
];

function func($input, $data)
{
    $find = 0;
    for($i = 0; $i < count($data); $i++)
    {
        if(count_chars($input, 1) == count_chars($data[$i], 1)) {
            $find++;
        }
    }

    print $find;
}

func("car", $data);
?>