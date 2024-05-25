<?php
$host = 'localhost';
$db = 'Crud';
$user = 'root';
$pass = '';

try{
$pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch(PDOException $e){
    echo $e->getMessage()
;}
date_default_timezone_set('UTC');
// *===* CREATE *==* 

function add($titre,$description,$date) {
    global $pdo;
    $req = $pdo->prepare('INSERT INTO tache (titre,description,date_creation,date_echeance,statut) VALUES(?,?,NOW(),?,FALSE)');
    $req->execute([$titre,$description,$date]);
};
// *===* READ *==*
function select(){
    global $pdo;
    $req = $pdo->query('SELECT * FROM tache');
    return $req->fetchAll();
};

// *==* UPDATE *===* 

function Check($statut,$id){
    global $pdo;
    try{
    $req = $pdo->prepare('UPDATE tache SET statut = ? WHERE id = ?');
    $req->execute([$statut,$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
        echo $req;
    }
}

function update($titre,$description,$date,$id){
    global $pdo;
    try{
    $req = $pdo->prepare('UPDATE tache SET titre = ?, description = ?, date_echeance = ? WHERE id = ?');
    $req->execute([$titre,$description,$date,$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
        echo $req;
    }
}
// *===* DELETE *===* 
function delete($id){
    global $pdo;
    $req = $pdo->prepare('DELETE FROM tache WHERE id = ?');
    $req->execute([$id]);
};
