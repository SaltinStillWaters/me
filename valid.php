<?php
    require('backend.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Summary</title>

</head>
<body>

<div class="container">
<label style="font-size: 25px"><b>SOLDIER SUMMARY</b></label>
<br><br>

<table class="table table-hover table-bordered">
        
    <?php
    
    global $contents;

    foreach ($contents as $key => $value) 
    {
        $str = '<tr>
                    <td><b>' . $key . '</b></td>
                    <td>' . $value . '</td>
                </tr>';
        
        echo $str;
    }

    ?>
</table>

</div>

</body>
</html>