<?php
     $host        ="aws-0-us-east-1.pooler.supabase.com";
     $port        ="6543";
     $dbname      ="postgres";
     $user        ="postgres.beiffshkcrbekdbyfsiu";
     $password    ="unicesmag@@";
    /*
    $host        ="localhost";
    $port        ="5432";
    $dbname      ="petstore";
    $user        ="postgres";
    $password    ="postgres";
*/
    $data_connection="
        host=$host
        port=$port
        dbname=$dbname
        user=$user
        password=$password
    ";
    
    $conn = pg_connect($data_connection);

    if(!$conn){
        echo "Connection error";

    }else{
        echo "Success !!!";
    }

    //pg_close($conn);
?>