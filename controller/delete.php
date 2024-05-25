<?php 
include '../model/config.php';
include '../debug/debug.php';

if(isset($_POST['delete']) && isset($_POST['id'])){
    delete($_POST['id']);
}
header("location:../index.php?");