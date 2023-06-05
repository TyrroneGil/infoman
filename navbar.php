<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\FieldValue;
//putenv('FIRESTORE_EMULATOR_HOST=localhost:8194');


putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");
$db = new FirestoreClient([
  //'keyFilepath'=>'keys\project-demo-ef370-firebase-adminsdk-et5p0-d2e340ec3c.json',
  'projectId' => 'project-demo-ef370'
]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>Document</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#"><img src="/src/Blogger-Logo.jpg" height="50px" width="100px" alt=""></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class=" nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <?php

if (isset($_SESSION['user_id']) == null) : ?>
  <li class="nav-item">
    <a class=" nav-link" href="signup.php">Signup</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Login</a>
  </li>
</ul>

<?php elseif (isset($_SESSION['user_id']) != null) :
          $username = $db->collection('users')->document($_SESSION['user_id'])->snapshot();
      ?>  
      <a class="nav-link btn btn-primary text-white" href="postform.php?id='<?php echo $_SESSION['user_id'] ?>'">Add Post</a>
        </ul>
          <a class="nav-link btn btn-danger" href="logout.php">Logout</a>
        
       
          <a class=" nav-link" href="profile.php?id=<?php echo $_SESSION['user_id']?>">Welcome
            <?php echo $username['username']; ?>
          </a>

       
      
        



<?php endif; ?>

  </div>
</nav>
</body>

</html>