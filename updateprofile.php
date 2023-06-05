<?php
require_once __DIR__.'/vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\FieldValue;
putenv("FIRESTORE_EMULATOR_HOST=127.0.0.1:8080");
//putenv('FIRESTORE_EMULATOR_HOST=localhost:8194');
$db=new FirestoreClient([
    //'keyFilepath'=>'keys\project-demo-ef370-firebase-adminsdk-et5p0-d2e340ec3c.json',
    'projectId'=>'project-demo-ef370'
]);



$post=$db->collection('users');




$post->document($_POST['id'])->set([
    'username'=>$_POST['username'],
    'birthday'=>$_POST['birthday'],
    'profession'=>$_POST['prof'],
    'age'=>$_POST['age']
],['merge'=>true]);
header('location:index.php');
    
    


?>