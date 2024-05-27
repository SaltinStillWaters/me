<?php
    require('backend.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<?php
    validate($_POST);
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value="<?php echo $contents['email']?>"><br>
    <span style="color: red;"> <?php global $ErrMsgs; echo $ErrMsgs['email']; ?> <br><br></span>

    <label for="fName">First Name:</label><br>
    <input type="text" id="fName" name="fName" value="<?php echo $contents['fName']?>"><br>
    <span style="color: red;"> <?php global $ErrMsgs; echo $ErrMsgs['fName']; ?> <br><br></span>

    <label for="mName">Middle Name:</label><br>
    <input type="text" id="mName" name="mName" value="<?php echo $contents['mName']?>"><br>
    <span style="color: red;"> <?php global $ErrMsgs; echo $ErrMsgs['mName']; ?> <br><br></span>

    <label for="lName">Last Name:</label><br>
    <input type="text" id="lName" name="lName" value="<?php echo $contents['lName']?>"><br>
    <span style="color: red;"> <?php global $ErrMsgs; echo $ErrMsgs['lName']; ?> <br><br></span>

    <label for="number">Mobile Number:</label><br>
    <input type="text" id="number" name="number" value="<?php echo $contents['number']?>"><br>
    <span style="color: red;"> <?php global $ErrMsgs; echo $ErrMsgs['number']; ?> <br><br></span>

    <input type="submit" name="submit" value="Submit">

</form>

<?php
    if (checkAllValid($_POST))
    {
        fillWithPrev($_POST);
        header('location: valid.php');
    }
?>

</body>
</html>