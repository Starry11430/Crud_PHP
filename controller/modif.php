<?php 
include '../model/config.php';
include '../debug/debug.php';

if($_POST['statut'] == True){
    Check(True,$_POST['id']);
}elseif($_POST['statut'] == 0){
    Check(0,$_POST['id']);
}

if(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['date']) && $_POST['date']){
    update($_POST['titre'],$_POST['description'],$_POST['date'],$_POST['id']);
}
header("location:../index.php?");

