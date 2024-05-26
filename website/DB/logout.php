<?php
session_start();
include("../DB/db.php");
if (!$conn){
    echo "ERROR! could not connect to database";
}
header("Location: ../Main/homepage.php");
session_destroy();

