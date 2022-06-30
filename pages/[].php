<?php
    $getParams = require('./modules/wisit-router/getParams.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dynamic</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>This is dynamic path</h1>
        <h2>params is '<?php echo $getParams(); ?>'</h2>
    </div>
</body>
</html>