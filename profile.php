<?php 
include 'navbar.php';

require_once __DIR__ . '/vendor/autoload.php';
putenv("FIRESTORE_EMULATOR_HOST=127.0.0.1:8080");
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\FieldValue;
//putenv('FIRESTORE_EMULATOR_HOST=localhost:8194');
$db = new FirestoreClient([
  //  'keyFilepath'=>'keys\project-demo-ef370-firebase-adminsdk-et5p0-d2e340ec3c.json',
  'projectId' => 'project-demo-ef370'
]);


$users = $db->collection('users');
$usersdata = $users->document($_GET['id'])->snapshot();

echo'
<div class="container my-3">

<div class="card-header text-white bg-primary mb-3">
<div class="card-body">
<form action="updateprofile.php" method="POST">
<div class="my-3">
    <input name="id" type="hidden" value="'.$_GET['id'].'"></input>
    <h1 class=""> Email: '.$usersdata['email'].'</h1>
    <label>Username</label>
    <input name="username" type="text" class="form-control" value="'.($usersdata['username']).'"></input>
</div>

<div class="mb-3">
    <label>Birthday</label>
    <input name="birthday" type="text" class="form-control" value="'.($usersdata['birthday']).'" ></input>
</div>
<div class="mb-3">
    <label>Age</label>
    <input name="age" type="text" class="form-control" value="'.($usersdata['age']).'" ></input>
</div>
<div class="mb-3">
    <label>Profession</label>
    <input name="prof" type="text" class="form-control" value="'.($usersdata['profession']).'" ></input>
</div>
<button type="submit" class="btn btn-dark ">Update Profile</button>
</form>
</div>
    </div>

</div>



';






?>