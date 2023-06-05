
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<?php
  include 'navbar.php';
  ?>
  <?php
require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
putenv("FIRESTORE_EMULATOR_HOST=127.0.0.1:8080");
//putenv('FIRESTORE_EMULATOR_HOST=localhost:8194');
$db = new FirestoreClient([
  //'keyFilepath'=>'keys\project-demo-ef370-firebase-adminsdk-et5p0-d2e340ec3c.json',
  'projectId' => 'project-demo-ef370'
]);
$id=$_GET['id'];
$postRef=$db->collection('posts');
$post=$postRef->document($id)->snapshot();
$postcomment=$postRef->document($id)->snapshot();
$username=$db->collection('users')->document($_SESSION['user_id'])->snapshot();
$posts2=$postRef->documents();
$comments2=$db->collection('comments')->where('post_id','==',$id)->documents();
?>
  <div class="container">
    <form action="addpost.php" method="POST">
      <input name="author"type="hidden" value="<?php echo $username['username'];?>">
      <label for="">Title: </label>
      <input class="form-control"name="title" type="text">
      <label for="">Content: </label>
      <textarea name="content"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      <button class="btn btn-primary mt-3">Post</button>
    </form>
  </div>
    
</body>
</html>