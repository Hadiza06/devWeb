<?php
    session_start();
    require("db.php");
    if(!isset($_SESSION['id'])){
        header("location: index.php");
    } elseif($_SESSION['access'] != 1){
        header("location: home.php");
    }
    $listUsers = $pdo->query("SELECT * FROM users")->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homme</title>
    <?php include("link.php"); ?>
</head>
<?php include("navbar.php"); ?>
<body>

  <h1 class="text-center mt-5">Tableau des utilisateurs</h1>

  <table class="container mt-5 table table-striped  table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mail</th>
            <th scope="col">Prenom</th>
            <th scope="col">Access</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

        <?php foreach($listUsers as $user): ?>
          <tr>
            <th scope="row"><?php echo $user["id"]?></th>
            <td><?php echo $user["mail"] ?></td>
            <td><?php echo $user["username"] ?></td>
            <td>
              <?php if($user["access"] == 1): ?>
                <span class="badge text-bg-danger">admin</span>
              <?php else: ?>
                <span class="badge text-bg-primary">user</span>
              <?php endif; ?>
            </td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa-solid fa-pen-to-square"></i>
              </button>

              <a href="delete_user.php?id=<?php echo $user["id"] ?>" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
              </a></td>
          </tr>

          

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </tbody>
  </table>

</body>
</html>