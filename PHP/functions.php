<?php
    include "conn.php";

    function GetApiData(){
        $data = file_get_contents('https://ghibliapi.herokuapp.com/films');
        $obj = json_decode($data);
        foreach(array_slice($obj,0,10) as $name){
            #Speichern der daten in die zugeordneten Variablen
            $MovieTitle = $name->title;
            $MovieDesc = $name->description;
            $MovieBanner = $name->movie_banner;
            $year = $name->release_date;
            $duration = $name->running_time;
            #Entfernen der ' Zeichen um Fehler in der Datenbank zu vermeiden.
            $res_name = str_replace(array("'"),'',$MovieTitle);
            $res_desc = str_replace(array("'"),'',$MovieDesc);
            $res_banner = str_replace(array('""'),'',$MovieDesc);
            #Einfügen der Daten in die Datenbank.
            AddToDB($res_name,$res_desc,$MovieBanner,$year,$duration);
        }
        echo "<h2>Daten wurden erfolgreich in die Datenbank geladen!</h2>";
    }

    function AddToDB($movie,$descrip,$banner,$year,$duration){
        $sql = "INSERT INTO API_DATA(title,description,banner,year,duration)VALUES('$movie','$descrip','$banner','$year','$duration')";
        $link = open_database_connection();
        if (!mysqli_query($link,$sql))
        {
            echo("Error description: " . mysqli_error($link));
        }
        else
        {  
            #echo "10 Datensetze wurden in die Datenbank geladen";
        }
    }

    function DisplayApiData(){
        if(isset($_POST['load-data'])){
            $sql = "SELECT DISTINCT title,description,banner,year,duration FROM API_DATA ORDER BY title ASC LIMIT 10";
            $link = open_database_connection();
            $result = $link->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc()){
                    echo "<div id='card'>";
                        echo "<div id=card-img><img src='".$row['banner']."' alt='card-image'></div>";
                        echo "<h3>";
                            echo $row['title'];
                            echo "<div id='movie-info'>";
                                echo "<p>";
                                    echo "Year: ".$row['year'];
                                echo "</p>";
                                echo "<p>";
                                    echo "Duration: ".$row['duration']. "min";
                                echo "</p>";
                            echo "</div>";
                        echo "</h3>";
                        echo "<hr>";
                            echo "<p>";
                                echo $row['description'];
                            echo "</p>";
                    echo "</div>";
                }
            }
            else{
                echo "<div id='noresults'>";
                    echo "<h1>Keine Daten!<h1>";
                echo "</div>";
            }
            $link->close();
        }
    }
?>