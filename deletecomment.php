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

$commentsRef=$db->collection('comments');
$commentRef2=$commentsRef->document($_GET['id'])->snapshot();

$commentsRef->document($_GET['id'])->delete();
    header('location:comment.php?id='.$commentRef2['post_id'].'');
    


?>