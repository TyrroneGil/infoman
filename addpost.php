<?php
require_once __DIR__.'/vendor/autoload.php';
use Google\Cloud\Firestore\FieldValue;
use Google\Cloud\Firestore\FirestoreClient;
putenv("FIRESTORE_EMULATOR_HOST=127.0.0.1:8080");
//putenv('FIRESTORE_EMULATOR_HOST=localhost:8194');
$db=new FirestoreClient([
    //'keyFilepath'=>'keys\project-demo-ef370-firebase-adminsdk-et5p0-d2e340ec3c.json',
    'projectId'=>'project-demo-ef370'
]);

$postRef=$db->collection('posts');

$postRef->add([
    'author'=>$_POST['author'],
    'title'=>$_POST['title'],
    'status'=>'unlike',
    'content'=>$_POST['content'],
    'reactions'=>0,
    'comments'=>0,
]);
    header('location:index.php')
    


?>