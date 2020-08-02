<?php
	$dbhost = "66.147.242.186";
    $dbuser = "urcscon3_london";
    $dbpass = "coffee1N/21!";
    $dbname = "urcscon3_london";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $query  = "SELECT * FROM students";
    $result = mysqli_query($connection, $query);
?>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: secondary.php?tip=Login Before");
    exit;
}
?>

<?php include "inc/html-top.php"; ?>




<article>
	<header class="blacktop2">
		<div class = "blackcontent">
			<div class="homebtn">
				<a href="index.php">Home</a>
			</div>

			<div class="secondary-login">
				<?php if(isset($_SESSION['username'])) { ?>
			      <a href="logout.php">Logout</a>
			    <?php } 
			    else { ?>
			      <a href="login.php">Login</a>
			    <?php } ?>
			</div>
		</div>
	</header>

 <?php
        while($data = mysqli_fetch_array($result)) {
    ?>

	<div class="container">

		<div class="grid">

			<div class = "intrf">
				<p><?php echo $data["quote"];?></p>
				<h2><?php echo $data["firstname"], " ", $data["lastname"];?></h2>
			</div> 
				
			<div class="intrp">
				<p><?php echo $data["bio"];?></p>
			</div> 

			<div class="rdmore">
				<a href="https://<?php echo $data["link"];?>"><div>Read More!</div></a>
				<div>
				<a class = "edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
    			<a class = "delete" onclick="return confirm('Are you sure you want to delete: <?php echo $data["firstname"] . " " . $data["lastname"]; ?>?')" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a>
			</div> 

		</div> 

	</div> 

    <?php } ?>
 </article>


<footer>
	<a href="new.php" class="new" title="Add new student's information">Add New Entry</a>
	<a href="secondary.php" class="done-button" title="Done with modify. Back to original page.">Done</a>
</footer>


<?php include "inc/scripts.php"; ?>
</body>
</html>