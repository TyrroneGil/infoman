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

 
    <div class="container">
      <div class="input-group my-3">
         <a href="index.php"><button class="btn btn-primary"><i class="bi bi-house"></i></button></a>
        <input class="form-control" name="search" placeholder="Type to search...">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
   </div>
  
  <div class="container">
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
putenv("FIRESTORE_EMULATOR_HOST=127.0.0.1:8080");
//putenv('FIRESTORE_EMULATOR_HOST=localhost:8194');
$db = new FirestoreClient([
  //'keyFilepath'=>'keys\project-demo-ef370-firebase-adminsdk-et5p0-d2e340ec3c.json',
  'projectId' => 'project-demo-ef370'
]);
$id2=$_GET['id'];
$postRef=$db->collection('posts');
$post3=$postRef->document($id2)->snapshot();
$postcomment=$postRef->document($id2)->snapshot();

$posts2=$postRef->documents();
$comments2=$db->collection('comments')->where('post_id','==',$id2)->documents();
$id = $_SESSION['user_id'];
        $likesRef=$db->collection('likes');
        
        $postRef=$db->collection('likes');
        $posts=$db->collection('likes')->where('user_id','==',$id)->documents();
        $count=0;
        foreach($posts as $post){
            $post['user_id'];
            $count++;
        }


    echo '


<div class="card my-3">

<div class="card-body">
<h1 class="card-title">' . $post3['title'] . '</h1>
<p class="card-text ">' . $post3['content'] . '</p>
<div class="container">
<div class="row align-items-start">
<div class="col-4">
 <h4> Reactions: ' . $post3['reactions'] . '</h4>
</div>
<div class="col-4">
 <h4> Comments: ' . $post3['comments'] . '</h4>
</div>

<div class="col-4">
<form action="add.php" method="POST">
 
 
  <input class="form-control" type="hidden" name="author" value="'.$username['username'].'" >
  <input type="hidden" name="id" value="' .$id2.'">
  <button class="btn btn-primary"><a class="'.($count==1 ? 'bi bi-heart-fill' : 'bi bi-heart').'"></a></button>
</form>
</i></button></a>

</div>
</div>
</div>
</div>
</div>';
echo'Comments: '; 
echo'<div class="container">';
foreach($comments2 as $comment){
 
  echo '


  <div class="card my-3">
  
  <div class="card-body">
  <div class="row"> 
  <div class="col-4">
  <h5 class="card-title">Author: ' . $comment['author'] . '</h5>
  </div>
  <div class="col-4">
  <p>Date: ' . (date_format(date_create($comment['date']), 'F n,Y')) . '</p>
  </div>
  <div class="col-4">
  <a href="deletecomment.php?id='.$comment->id().'" class="btn btn-danger">Delete</a>
  </div>
 


  <p class="card-text text-truncate">' . $comment['comment'] . '</p>
  <div class="container">
 
  
  
  </div>
  </div>
  </div>
  </div>';

  
}
echo '</div>';
?>
<div class="container">
<form action="addcomment.php" method="POST">
  <div></div>
 
  <input class="form-control" type="hidden" name="author" value="<?php echo $username['username'] ?>" >
  <label for="">Comment</label>
  <input class="form-control" name="comment"type="text">
  <input type="hidden" name="id" value="<?php echo $id2; ?>">
  <button  class="btn btn-primary my-1"type="submit">Submit</button>
</form>


</div>
</div>
</body>

</html>