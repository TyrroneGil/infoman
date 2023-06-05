   <?php
   session_start();
   if (!isset($_SESSION['user_id'])) {
       header('location:login.php');
       exit();
   }
putenv("FIREBASE_AUTH_EMULATOR_HOST=localhost:9099"); 
putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");
require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FieldValue;
use Google\Cloud\Firestore\FirestoreClient;



$db = new FirestoreClient([
   
    'projectId' => 'project-demo-ef370'
]);
$id = $_SESSION['user_id'];
$likesRef=$db->collection('likes');

$postRef=$db->collection('likes');
$posts=$db->collection('likes')->where('user_id','==',$id)->documents();
$count=0;
foreach($posts as $post){
    $post['user_id'];
    $count++;
}

if($count==1){
      $postRef->document($id)->delete();
}else{
    $db->collection('likes')->document($id)->set([
     'user_id'=>$_SESSION['user_id'],
     'status'=>'liked',
     'post_id'=>$_POST['id'],
     'author'=>$_POST['author'],
     'date'=>FieldValue::serverTimestamp(),
    ]);
}

// if(){
//   
// }else{
//     $db->collection('likes')->document($id)->set([
// 'user_id'=>$_SESSION['user_id'],
// 'status'=>'liked',
// 'post_id'=>$_POST['id'],
// 'author'=>$_POST['author'],
// 'date'=>FieldValue::serverTimestamp(),
// 

// }







   header('location:index.php');
    


?>