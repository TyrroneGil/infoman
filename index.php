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
    
    <form method="GET">
      <div class="input-group my-3">
      <a href="index.php"><button class="btn btn-primary"><i class="bi bi-house"></i></button></a>
        <input class="form-control" name="search" placeholder="Type to search...">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>
  </div>
  <div class="container">
    <?php
    require_once __DIR__ . '/vendor/autoload.php';
    putenv("FIRESTORE_EMULATOR_HOST=127.0.0.1:8080");
    use Google\Cloud\Firestore\FirestoreClient;
    use Google\Cloud\Firestore\FieldValue;
    //putenv('FIRESTORE_EMULATOR_HOST=localhost:8194');
    $db = new FirestoreClient([
      //  'keyFilepath'=>'keys\project-demo-ef370-firebase-adminsdk-et5p0-d2e340ec3c.json',
      'projectId' => 'project-demo-ef370'
    ]);


    $posts = $db->collection('posts');
    $postsdata = $posts->documents();

    /*if(isset($_GET['search']) && $_GET['search']!=null){
    $postsdata=$posts->where('title','=',$_GET['search'])->documents();
}else{
    $postsdata=$posts->documents();
}*/
    /*  
$posts->add([
    'title'=>'Hello Guys',
    'content'=>'Hey guys! Welcome to my first blog! This is just going to be a bit of introduction about myself and why I decided to start this blog in the first place.

So I’ve always wanted to write a blog but I have just never had the courage to and I honestly didn’t know what to write about. But now (with a little help from ACU as this is an assignment that I have to do) I am doing my very own blog! Thanks to my Uni teachers I have learnt that having a blog is actually a very good place to find new resources and new ways of teaching and learning. So with my future profession I thought maybe it is a great idea to start one. Also by having this blog I’m hoping that it will help improve my writing skills and make me more confident in sharing my opinions on different topics. And through my blogs I’ll be able to get feedback from you guys and connect with people I would never have connected with before.

Just a heads up that all the topics and things i will be talking about will be coming out of my own head! (mostly) If i do have any help from other resources I will be thanking them and referencing them down at the bottom of that blog for you guys if you wanted to do some extra reading!

So I hope you enjoy my rants and opinions on the random topics I will be blogging about.

Thanks for tuning in I’ll see you all next time,

Emily out XOXO',
    'status'=>'unlike',
    'comment'=>$db->collection("comments")->add([
      'comment'=>'Bakit ngay?s',
      'date'=>FieldValue::serverTimestamp(),
      'author'=>'Hendrick',
      'post_id'=>''
    ])->id(),
    'reactions'=>0,
    'comments'=>0,
    
]);
$posts->add([
    'title'=>'Blogger Post',
    'content'=>'Chris Guillebeau believes that you don’t have to live your life the way others expect you to in order to find happiness. He named his blog “The Art of Non-Conformity” to convince people that they do not need to conform to the norm to make the world a better place. Additionally, he talks about entrepreneurship, travel, and adventure in the most unconventional way.
    Guillebeau combines personal growth and community service in one original concept. He claims that you can do good things for yourself while still helping other people. His philosophy revolves around deciding what is best for you so you can be an agent of change in the lives of those around you.',
    'status'=>'unlike',
     'comment'=>$db->collection("comments")->add([
      'comment'=>'Hello I want to blog too',
      
      'date'=>FieldValue::serverTimestamp(),
      'author'=>'Logan Moal',
      'post_id'=>''
    ])->id(),
    'reactions'=>0,
    'comments'=>0,
   
]);
$posts->add([
    'title'=>'Tyrrone Blogger',
    'content'=>'Zen is a state of mindfulness that aims to develop the ability to meditate and be intuitive. It focuses on a person’s ability to practice self-control and awareness, and this is where Leo Babauta directs his readers. His blog, Zen Habits, will teach you how to declutter (physically, mentally, and emotionally) so that you can focus on what’s more important in your life.



Babauta offers a habits program called “Sea Change” and a training program called “Fearless Training.” Sea Change challenges you to focus on one new habit at a time before developing another. Fearless Training dares you to boldly face uncertainties and commitments.',
    'status'=>'unlike',
     'comment'=>$db->collection("comments")->add([
      'comment'=>'Hello Tyrrone Thank you for this blog',
      'date'=>FieldValue::serverTimestamp(),
      'author'=>'Lolgamer',
      'post_id'=>''
    ])->id(),
    'reactions'=>0,
    'comments'=>0,
    
]);
$posts->add([
    'title'=>'Arji Blog',
    'content'=>'Have you ever found yourself worrying about different things? Have you ever felt that a sense of worry and stress often clouds big events and celebrations of your life? These feelings are so common among people.

Humans are the wisest species of them all, and they get this label because of their ability to contemplate the future. Our foresight and ability to intelligently calculate the risks attached to certain activities are why we are unique.



But our wisdom  and that inherent quality of worrying about the future  is the very reason why we feel depressed and anxious all the time. Many people are so consumed worrying about what they cannot control that they forget to breathe and live in the moment. The result: all the beautiful moments pass by, and we fail to even notice them.

Instead of constantly thinking about what the future holds for you, you should focus your entire energy on the present.





While you should normally be enjoying yourself, you are worried about what will happen on Monday morning at work. Since you are preoccupied with worries and stress, you didnt enjoy your time at all.



Will we ever be able to fight against the feeling of helplessness and anxiousness? Or will we forever be trapped inside the web of our own negative thoughts? The good news is that we can break free from these thoughts that dominate our minds 00/7, and the key is to stay in the present and not be distracted.

But the only way to emerge stronger and feel good even during times of adversity is for you to take charge of your life. A study has found that happiness is a choice. You ought to make an effort to feel good about yourself and be happy.



The level of happiness that you can attain is directly proportional to the extent to which you stay in the present. This post will look at different ways to help us be present and live in the moment daily.',
    'status'=>'unlike',
     'comment'=>$db->collection("comments")->add([
      'comment'=>'Thank you so much for this blog',
      'date'=>FieldValue::serverTimestamp(),
      'author'=>'mcphee',
      'post_id'=>''
    ])->id(),
    'reactions'=>0,
    'comments'=>0,
   
]);
$posts->add([
    'title'=>'Gloco Blog',
    'content'=>'Marie Forleo describes herself as an “entrepreneur, writer, philanthropist, and an unshakable optimist.” Her blog focuses on helping readers to become the people they want to be. Forleo also has a YouTube channel called “Marie TV” that focuses on general self-development and life success.



Ever since the blog was featured on Oprah, Forleo has become the go-to guru for people who want to develop their skills and talents. If you are having a hard time believing in yourself, submit your worries to her and she will believe on your behalf. Because of her infectious behavior and positivity, you will surely find yourself taking that leap of faith',
    'status'=>'unlike',
     'comment'=>$db->collection("comments")->add([
      'comment'=>'So good at writing.',
      'date'=>FieldValue::serverTimestamp(),
      'author'=>'grgy',
      'post_id'=>''
    ])->id(),
    'reactions'=>0,
    'comments'=>0,
    
]);
*/

    $filter = array();
    
if(isset($_SESSION['user_id'])!=null){
    if (isset($_GET['search']) && $_GET['search'] == null) {
      foreach ($postsdata as $post) {
        echo '
 
   
   <div class="card my-3">
  
  <div class="card-body">
    <h1 class="card-title">' . $post['title'] . '</h1>
    <h3 class="card-text text-truncate">' . $post['content'] . '</h3>
    <div class="container">
  <div class="row align-items-start">
    <div class="col">
     <h4> Reactions: ' . $post['reactions'] . '</h4>
    </div>
    <div class="col">
      <h4><a href="comment.php?id=' . $post->id() . '" class="">Comments:</a> ' . $post['comments'] . '</h4>
    </div>
    <div class="col">
    <a href="add.php?id=' . $post->id() . '"> <button class="btn btn-primary"><i class=' . ($post['status'] == 'unlike' ? "'bi bi-heart'" : "'bi bi-heart-fill'") . '>
    </i></button></a>
    
    </div>
  </div>
  </div>
</div>
</div>';
      }
    } elseif (isset($_GET['search']) && $_GET['search'] != null) {

      foreach ($postsdata as $post) {
        $posttitle = strtolower($post['title']);
        $search1 = strtolower($_GET['search']);
        if (str_contains($posttitle, $search1)) {
          $filter[] = $post;
        }
      }

      echo "Searching for " . $_GET['search'];
      echo "<br>";

      if (empty($filter)) {
        echo "no result found";
      } else {
        $id = $_SESSION['user_id'];
        $likesRef=$db->collection('likes');
        
        $postRef=$db->collection('likes');
        $posts=$db->collection('likes')->where('user_id','==',$id)->documents();
        $count=0;
        foreach($posts as $post){
            $post['user_id'];
            $count++;
        }
        foreach ($filter as $post) {
          echo '
 
   
   <div class="card my-3">
  
  <div class="card-body">
    <h1 class="card-title">' . $post['title'] . '</h1>
    <h3 class="card-text text-truncate">' . $post['content'] . '</h3>
    <div class="container">
  <div class="row align-items-start">
    <div class="col">
     <h4> Reactions: ' . $post['reactions'] . '</h4>
    </div>
    <div class="col">
    <h4><a href="comment.php?id=' . $post->id() . '" class="">Comments:</a> ' . $post['comments'] . '</h4>
    </div>
    <div class="col">
    <form action="add.php" method="POST">
 
 
    <input class="form-control" type="hidden" name="author" value="'.$username['username'].'" >
    <input type="hidden" name="id" value="' .$post->id().'">
    <button class="btn btn-primary"><a class="'.($count==1 ? 'bi bi-heart-fill' : 'bi bi-heart').'"></a></button>
  </form>
  </i></button></a>
    </div>
  </div>
  </div>
</div>
</div>';
        }
      }
    } else {
      $id = $_SESSION['user_id'];
$likesRef=$db->collection('likes');

$postRef=$db->collection('likes');
$posts=$db->collection('likes')->where('user_id','==',$id)->documents();
$count=0;
foreach($posts as $post){
    $post['user_id'];
    $count++;
}
      foreach ($postsdata as $post) {
        
        echo '
 
   
   <div class="card my-3">
  
  <div class="card-body">
    <h1 class="card-title">' . $post['title'] . '</h1>
    <h3 class="card-text text-truncate">' . $post['content'] . '</h3>
    <div class="container">
  <div class="row align-items-start">
    <div class="col">
     <h4> Reactions: ' . $post['reactions'] . '</h4>
    </div>
    <div class="col">
    <h4><a href="comment.php?id=' . $post->id() . '" class="">Comments:</a> ' . $post['comments'] . '</h4>
    </div>
    <div class="col">
    <form action="add.php" method="POST">
 
 
    <input class="form-control" type="hidden" name="author" value="'.$username['username'].'" >
    <input type="hidden" name="id" value="' .$post->id().'">
    <button class="btn btn-primary"><a class="'.($count==1 ? 'bi bi-heart-fill' : 'bi bi-heart').'"></a></button>
  </form>
  </i></button></a>
    </div>
  </div>
  </div>
</div>
</div>';
      }
    
    }
  }elseif(isset($_SESSION['user_id'])==null){
    echo "Sign in to see posts";
  }



    ?>
  </div>
</body>

</html>