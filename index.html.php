<?php include "PHP/functions.php"; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/master.css">
    <link rel="stylesheet" href="CSS/card.css">
    <title>Aufgabe_Tiffinger&Thiel</title>
</head>
<body>
    <div id="wrap">
        <div id='aufgabe1'>
            <h1>Aufgabe 1</h1>
            <h3>Frei gewählte API: <a href="https://ghibliapi.herokuapp.com/films" target="_blank">Ghibli Filme</a></h3>
        </div>
        <?php GetApiData();?>
        <div id='aufgabe2'>
            <h1>Aufgabe 2</h1>
            <form action="" method="post">
                <button type="submit" name='load-data' class="btn btn-success">Daten laden</button>
            </form>
            <div id='displaydata'>
                <div id='card-holder'>
                    <?php
                        DisplayApiData();
                    ?>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>