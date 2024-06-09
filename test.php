<?php require('helper/input.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
if (isset($_POST['submit']))
{   
    session_start();
    $_SESSION['user'] = array(
        'name' => $_POST['name']
    );

    global $inputs;
    if (isset($inputs))
    {
        $inputs->updateContent();
        $inputs->updateErrorMsgs();
    }
}

?>
    <form method = 'post'>    
        <?php

        input('name', 'name', 'Name:', 'e.g. Yer', true);

        ?>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>