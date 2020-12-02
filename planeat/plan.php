<?php

require_once "config.php";

if(isset($_POST['submit'])){
$age = $_POST["age"];
$h = $_POST["height"];
$w = $_POST["weight"];
$gender = $_POST["foo"];
$act = 0;
if(!empty($_POST['activity'])){
    $selected = $_POST['activity'];
    if($selected == "1"){
        $act = 1.2;
    }
    else if($selected == "2"){
        $act = 1.375;
    }
    else if($selected == "3"){
        $act = 1.375;
    }
    else if($selected == "4"){
        $act = 1.725;
    }
    else if($selected == "5"){
        $act = 1.9;
    }
}
$bmr = 0;
$cal = 0;
if($gender == "male"){
    $bmr = 66 +(13.7 * $w) + (5 * $h) - (6.8 * $age);
    $cal = $bmr * $act;
}
else if($gender == "female"){
    $bmr = 655 +(9.6 * $w) + (1.8 * $h) - (4.7 * $age);
    $cal = $bmr * $act;
}
}

$bcal = 0.2 * $cal;
$lcal = 0.4 * $cal;
$dcal = 0.4 * $cal;
$scal = 0.2 * $cal;

$b1n = "";
$b1c = 0;
$b1 = mysqli_query($connect, "SELECT Name, Calories FROM bf_bev ORDER BY RAND() LIMIT 1");
while($row = mysqli_fetch_array($b1)){
    $b1n = $row['Name'];
    $b1c = $row['Calories'];
}

$b2n = "";
$b2c = $bcal - $b1c;
$b2 = mysqli_query($connect, "SELECT Name,Calories FROM bf_bev WHERE Calories < '$b2c'");
while($row = mysqli_fetch_array($b1)){
    $b2n = $row['Name'];
    $b2c = $row['Calories'];
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Diet Plan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plan.css">
</head>
<body>

   <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <div class="overlay"></div> 
    <nav class="navbar navbar-expand-md">
  <a class="navbar-brand brand" href="#"><img src="Assets/Logo.png">PlanEat</a>
  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
       
        
  <div class="collapse navbar-collapse" id="main-navigation">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a href="signin.html"><button class="nav-link login">Login</button></a>
      </li>
    </ul>
  </div>
</nav>
    
     <header class="page-header header container-fluid">
    <div class="overlay"></div> 
        <div class="description">
            <h1>Your Diet Plan</h1>
             <p> Daily Calorie Requirement : <?php echo $cal ?></p>
            
        </div>
         <div class="plan">
                <table class="table table-bordered">
  <thead>
      
    <tr>
      <th scope="col">#</th>
      <th scope="col">Dish</th>
      <th scope="col">Calories</th>
      <th scope="col">Customize</th>
    </tr>
      <tr>
        <th colspan="5" class="meal-head">Breakfast</th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $b1n ?></td>
      <td><?php echo $b1c ?></td>
      
        <td> <button> Replace </button></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><?php echo $b2n ?></td>
      <td><?php echo $b2c ?></td>
    
        <td> <button> Replace </button></td>
    </tr>
            <tr>
        <th colspan="5" class="meal-head">Lunch</th>
      </tr>
    <tr>
      <th scope="row">1</th>
       <td>Jacob</td>
      <td>Thornton</td>

        <td> <button> Replace </button></td>
    </tr>
      <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      
        <td> <button> Replace </button></td>
    </tr>
      
       <tr>
      <th scope="row">3</th>
      <td>Jacob</td>
      <td>Thornton</td>
      
        <td> <button> Replace </button></td>
    </tr>
       <tr>
           <tr>
        <th colspan="5" class="meal-head">Snacks</th>
      </tr>
    <tr>
      <th scope="row">1</th>
       <td>Jacob</td>
      <td>Thornton</td>
     
        <td> <button> Replace </button></td>
    </tr>
      <tr>
        <th colspan="5" class="meal-head">Dinner</th>
      </tr>
    <tr>
      <th scope="row">1</th>
       <td>Jacob</td>
      <td>Thornton</td>
      
        <td> <button> Replace </button></td>
    </tr>
      <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
     
        <td> <button> Replace </button></td>
    </tr>
      
       <tr>
      <th scope="row">3</th>
      <td>Jacob</td>
      <td>Thornton</td>
       
        <td> <button> Replace </button></td>
    </tr>
  </tbody>
</table>
            </div>
         
    </header>
    
    

    
    
    </body>
</html>
