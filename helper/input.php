<?php
require_once('constants.php');

function input($id, $type, $label='', $placeholder='', $required = false)
{
    global $inputs;
    if (!$inputs->add($id, $type, $required))
    {
        echo 'input not added to inputs';
        return 0;
    }

    if (!empty($label))
        echo "<label for='{$id}'> {$label} </label> <br>";

    echo "<input type='text' id='{$id}' name='{$id}' value='{$inputs->getInput($id)->getContent()}'placeholder='{$placeholder}'> <br>";

    if($required)
        echo "<span style='color: red;'> {$inputs->getInput($id)->getErrorMsg()} <br></span>";

    echo "<br>";

    $inputs->displayAll();
}