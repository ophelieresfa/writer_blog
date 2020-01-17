<?php

require 'Database.php';

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon blog</h1>
        <p>En construction</p>

        <?php

        $db = new Database();
        echo $db->getConnexion();

        ?>

    </div>
</body>
</html>