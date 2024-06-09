<?php

$ErrMsgs = 
[
    'fName' => '',
    'lName'=> '',
    'mName' => '',
    'email' => '',
    'number' => ''
];

$reqMsgs = 
[
    'fName' => 'First name is required',
    'lName'=> 'Last Name is required',
    'mName' => ' ',
    'email' => 'Email is required',
    'number' => 'Mobile Number is required'
];

$invMsgs = 
[
    'fName' => 'Must only contain letters',
    'lName'=> 'Must only contain letters',
    'mName' => ' ',
    'email' => 'Invalid email address',
    'number' => 'Number must start with "0"/"9" and must be 11 digits'
];

$contents =
[
    'fName' => 'yes',
    'lName'=> '',
    'mName' => '',
    'email' => '',
    'number' => ''
];


function pr()
{
    global $contents;

    foreach ($contents as $key => $val)
    {
        echo ''. $key .''. $val .'';
    }
}

function validate($arr)
{
    if (!isset($arr['submit']))
    {
        return;
    }

    checkIsFilled($arr);
    fillWithPrev($arr);
    checkIsValid($arr);
}

function checkIsValid($arr)
{
    foreach ($arr as $key => $val)
    {
        global $ErrMsgs;

        if (!isset($ErrMsgs[$key]))
        {
            continue;
        }

        if ($ErrMsgs[$key] != '')
        {
            continue;
        }
        
        if (!checkValidInput($val, $key))
        {
            global $invMsgs;
            $ErrMsgs[$key] = $invMsgs[$key];
        }

    }
}

function output()
{
    global $contents;

    foreach ($contents as $key => $value) 
    {
        $str = '<tr>
                    <td><b>' . $key . '</b></td>
                    <td>' . $value . '</td>
                </tr>';
        
        echo $str;
    }
}
function checkIsFilled($arr)
{
    global $ErrMsgs;
    global $reqMsgs;

    foreach ($arr as $key => $val)
    {
        if ($arr[$key] == '')
        {   
            $ErrMsgs[$key] = $reqMsgs[$key];
        }
    }
}

function checkValidInput($str, $type)
{
    switch ($type)
    {
        case 'fName':
        case 'lName':
            return preg_match("/^[a-zA-Z-' ]*$/", $str);
        case 'email':
            return filter_var($str, FILTER_VALIDATE_EMAIL);
        case 'number':
            return preg_match("/^[0][9][0-9]{9}$/", $str);
    }
}

function fillWithPrev($arr)
{
    global $contents;

    foreach($contents as $key => $val)
    {
        if (!isset($arr[$key]))
        {
            return;
        }

        $contents[$key] = $arr[$key];
    }
}

function checkAllValid($arr)
{
    if (!isset($arr['submit']))
    {
        return false;
    }

    global $ErrMsgs;
    
    foreach($ErrMsgs as $key => $val)
    {
        if (trim($val) != '')
        {
            return false;
        }
    }

    return true;
}