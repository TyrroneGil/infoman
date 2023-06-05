<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';
putenv("FIREBASE_AUTH_EMULATOR_HOST=localhost:9099"); 

putenv("FIRESTORE_EMULATOR_HOST=localhost:8080"); 
    
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Factory;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
    $password= $_POST['password'];
    $email= $_POST['email'];

   

    $factory = (new Factory)->withServiceAccount('keys\project-demo-ef370-firebase-adminsdk-et5p0-8bb4a9bcbb.json');
    $auth = $factory->createAuth();

    try{
        $attemptSignIn = $auth->signInWithEmailAndPassword($email,$password);
        $_SESSION['user_id'] = $attemptSignIn->firebaseUserId();
        $_SESSION['email'] = $email;
        header('Location:index.php');
    }catch(InvalidPassword $e){
        echo 'Invalid Credentials';

    }catch(UserNotFound $e){
        echo 'Ivalid Credentials '. $e->getMessage();
    }catch(Exception $e){
        echo 'Error: '. $e->getMessage();
    }
    
}



?>