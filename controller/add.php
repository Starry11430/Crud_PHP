<?php 
include '../model/config.php';
include '../debug/debug.php';

if(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['date']) && $_POST['date']){
    add($_POST['titre'],$_POST['description'],$_POST['date']);
}else{

};
header("location:../index.php?");