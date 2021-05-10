<?php include "database.php"; ?>
<?php
// we are creating a query to draw files from the database(mySQL)
$query= "SELECT * FROM shouts ORDER BY id DESC";
$shouts = mysqli_query($conn,$query); 
  ?>
<!DOCTYPE html>
<html>
     <head>
             <meta charset='utf-8'/>
	<title>CHAT IT!</title>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<body>
    <!-- Notice how the attributes are all in green colour ; To create an attribute associated to a html tag, you must not close the tag before calling the attribute ie type the html tag;call the attribute and equal it to its key(in quotes) before closing the tag -->
    <div id = 'container'>
    	<header>
    		<h1>CHAT IT! Chatbox</h1>
    	</header>
        <div id = 'shouts'>
            <ul>
                <?php 
                   while ( $row = mysqli_fetch_assoc($shouts)) :?>  
                     <!-- <li class = 'shout'><span>10:15PM - </span>Brad: Hey, what are you guys up to?</li> THE MSG ABOVE WAS THE STATIC ONE, IT WAS SUBSEQUENTLY CHANGED 1BY1 TO A DYNAMIC CONTENT COMING STRAIGHT OUT OUR DATABASE WITH THE AID OF PHP CODES-->
                   <!-- To turn static messages into dynamic messages that pulls information from the database, we would have to edit the time space by putting in a php code that pulls the time info from the database and also do the same for the user and message row -->
                   <li class = 'shout'><span><?php echo $row['time'] ?> - </span><?php echo $row['user'] ?>: <?php echo $row['message'] ?></li>
                 <?php endwhile;?>
                
                
            </ul>
    </div>
        <div id = 'input'>
            <?php if(isset($_GET['error'])):?>
                <div class = "error"><?php echo $_GET['error'];?></div>
        <?php endif; ?>
            <form method="post" action="process.php">
            <!-- Cheche Commentt - Added required attributes to the form fields, so it will not even send without an input -->
                <input type="text" name="user" placeholder="Enter your Name" required>
                <input type="text" name="message" placeholder="Enter your Message " required>
                <br>
                <input class="shout-btn" type="submit" name="submit" value="SHOUT IT OUT">
            </form>
        </div>
    </div>
</body>
</html> 
