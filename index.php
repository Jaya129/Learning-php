<?php
$insert = false;
if(isset($_POST['name'])){
  //Set connection variables 
$server = "localhost";
$username = "root";
$password = "6vuD]8r@7zsyx7WK";

//create a connection
$con = mysqli_connect($server, $username, $password);

//Check for connection success
if(!$con){
    die("Connection to this database failed due to: " . mysqli_connect_error());
}
//echo "Success connecting to the database."

//Collect post variables
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$movie = $_POST['movie'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$desc = $_POST['desc'];
$sql =  "INSERT INTO movies.movie (`name`, `email`, `phone`, `movie_name`, `age`, `gender`, `query`, `date`) VALUES ('$name', '$email', '$phone', '$movie', '$age', '$gender', '$desc', current_timestamp())"; 
//echo $sql;

//Execute the query
if($con->query($sql) == true){
   // echo "Successfully inserted";

   //Flag for successful insertion
   $insert = true; 
}
else{
    echo "ERROR:<br> $con->error";
}

//Connection closed
$con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Ticket Booking Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;1,100&family=Roboto:ital,wght@1,400;1,500&display=swap" rel="stylesheet">
  </head>
  <body>
    <img class="bg" src="bg.jpg" alt="Movie Theatre Picture">
    <div class="container">
      <h1>Movie Ticket Booking Form</h1>
      <p>Fill this form and enjoy your journey.</p>

<?php
if($insert == true){
     echo "<p class='submit-notification'>Thanks for filling out the form!</p>";
    }
    ?>
      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
        />
        <input
          type="text"
          name="email"
          id="email"
          placeholder="Enter your email"
        />
        <input
          type="text"
          name="phone"
          id="phone"
          placeholder="Enter your phone"
        />
        <input
          type="text"
          name="movie"
          id="movie"
          placeholder="Enter the name of the movie"
        />
        <input type="text" name="age" id="age" placeholder="Enter your age" />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter your gender"
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Enter your queries here"
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    
    <script href="index.js"></script>
  </body>
</html>
