<?php 
include('./model/config.php'); 
if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
    $id = '';
}
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <form method="post" action="../controller/add.php" class="add_form">
        <h1>Gestionnaire des taches</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre</label>
            <input type="text" class="form-control" pattern="^(?!\s*$).+" aria-describedby="emailHelp" name="titre" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" name="description">Description</label>
            <textarea type="text" class="form-control" pattern="^(?!\s*$).+" name="description" required oninvalid="this.setCustomValidity('Veuillez saisir votre message')" oninput="this.setCustomValidity('')"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" name="description">Date echeance</label>
            <input type="date" class="form-control" pattern="^(?!\s*$).+" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+1 month')); ?>"name="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Description</th>
        <th scope="col">date de creation</th>
        <th scope="col">date d'echance</th>
        <th scope="col">statut</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach(select() as $value){
        ?>
        <tr class=<?php 
        if($value['statut'] === 1){
            echo 'table-success';
        }elseif($value['date_echeance'] < date('Y-m-d')){
            echo 'table-danger';
        }else{
            echo '';
        }
        ?>>
        <th scope="row"><?php echo $value['id']?></th>
        <?php if($id != $value['id']){
            ?> 
        <td><?php echo $value['titre'] ?></td>
        <td><textarea class="form-control"readonly><?php echo $value['description']?></textarea></td>
        <td><?php echo $value['date_creation']?></td>
        <td class=<?php if($value['date_echeance'] < date('Y-m-d')){echo "bg-danger";} ?>><?php echo $value['date_echeance']?></td>
        
        <td>
            <form action="./controller/modif.php" method="post">
                <input type="hidden" name="id" value="<?php echo $value['id']?>">
                <input type="checkbox" name="statut" value="1" <?php echo ($value['statut'] === 1) ? 'checked' : ''; ?> onchange="this.form.submit()">
            </form>
        </td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?php echo $value['id']?>">
                <input type="submit" name="Modif" value="Modifier" onchange="this.form.submit()">
            </form>
            <form action="./controller/delete.php" method="post" onsubmit="return confirmDelete()">
                <input type="hidden" name="id" value="<?php echo $value['id']?>">
                <input type="submit" name="delete" value="delete" onchange="this.form.submit()">
            </form>
        </td>
        <?php }elseif($id == $value['id']){?>
            <form action="./controller/modif.php" method="post">
                <input type="hidden" name="id" value="<?php echo $value['id']?>">
                <td><input type="text" class="form-control" value="<?php echo $value['titre'] ?>" aria-describedby="emailHelp" name="titre"></td>
                <td><textarea type="text" class="form-control" name="description"><?php echo $value['description']?></textarea></td>
                <td><?php echo $value['date_creation']?></td>
                <td><input type="date" class="form-control" value="<?php echo $value['date_echeance']?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+1 month')); ?>" name="date"></td>
                <td><input type="checkbox" name="statut" value="1" <?php echo ($value['statut'] === 1) ? 'checked' : ''; ?> ></td>
                <td><input type="submit" name="Modif" value="Modifier" class="btn btn-primary"></td>
                
            </form>
        <?php };
        ?>
        </tr>
        <?php }?>
    </tbody>
    </table>
    <script>
        function confirmDelete() {
            return confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>