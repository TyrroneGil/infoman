<?php
putenv("FIREBASE_AUTH_EMULATOR_HOST=localhost:9099"); 
putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");
require_once __DIR__.'/vendor/autoload.php';


use Kreait\Firebase\Exception\Auth\EmailExists;
use Kreait\Firebase\Factory;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $email= $_POST['email'];

    $userProps=[
        'email'=>$email,
        'password'=>$password
    ];

    $factory = (new Factory)->withServiceAccount('keys\project-demo-ef370-firebase-adminsdk-et5p0-8bb4a9bcbb.json');
    $auth = $factory->createAuth();

    try{
        $user =$auth->createUser($userProps);
        $firestore=$factory->createFirestore();
        
        $firestore->database()->collection('users')->document($user->uid)->set([
            'email'=>$email,
            'username'=>$username,
            'user_id'=>$user->uid,
            'birthday'=>$_POST['birth'],
            'age'=>$_POST['age'],
            'profession'=>$_POST['proff'],
        ]);
        header('Location:login.php');
    }catch(EmailExists $e){
        echo 'Email Already Exist';

    }catch(Exception $e){
        echo 'Error: '. $e->getMessage();
    }
    
}



?>