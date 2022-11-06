 
<!-- from w3schools -->

<?php
//include db connection files may vary
include 'db.php';

// define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = $comment =  "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

 // Check database connection  $conn may vary depends on db conection file
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
 
// prepare and bind
$stmt = $conn->prepare("INSERT INTO <table> (name, email, comment) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $comment);

 //run statement
$stmt->execute();

// close statement and connection
$stmt->close();
$conn->close();  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Contact Us</h2><br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" placeholder="Jane Doe" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" placeholder="jane@doe.com" value="<?php echo $email;?>">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  Comment: <br><textarea name="comment" placeholder="Write Message..." rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>

  <input type="submit" name="submit" value="Submit">
</form>

 


<!-- There's a devil waiting outside your door
(How much longer?)
There's a devil waiting outside your door
(How much longer?)
And he's bucking, and braying, and pawing at the floor
(How much longer?)
And he's howling with pain, crawling up the walls
(How much longer?)

There's a devil waiting outside your door
(How much longer?)
And he's weak with evil, and broken by the world
(How much longer?)
And he's shouting your name, and asking for more


(How much longer?)
There's a devil waiting outside your door
(How much longer?)
Loverman, since the world began
Forever, amen, till the end of time, yeah
Take off that dress, ooh, I'm coming down, yeah
I'm your loverman, yeah 'cause I am what I am
What I am, what I am, what I am

L is for love, baby
O is for only you that I do
V is for loving virtually everything that you are
E is for loving almost everything that you do
R is for rape me
M is for murder me
A is for answering all of my prayers
N is for knowing your loverman's going

To be the answer to all of yours
Loverman, till the bitter end
While the empires burn down
Forever and ever, and ever, ever, amen
I'm your loverman so help me, baby
So help me, baby 'cause I am what I am
What I am, what I am, what I am
I'm your loverman
There's a devil crawling along your floor


(How much longer?)
There's a devil crawling along your floor
(How much longer?)
With a trembling heart, he's coming through your door
(How much longer?)
With his straining sex in his jumping paw

(How much longer?)

Ooh, there's a devil crawling along your floor
(How much longer?)
And he's old, and he's stupid, and he's hungry, and he's sore
And he's blind, and he's lame, and he's dirty, and he's poor
Gimme more, gimme more, gimme more
Gimme more, gimme more, gimme more
(How much longer?)
There's a devil crawling along your floor

Loverman, ha ha, and here I stand
Forever, amen 'cause I am what I am
What I am, what I am, hey
Forgive me, baby, my hands are tied
And I got no choice, no, no, no, no
I got no choice, no choice at all
I'll say it again
L is for love, baby

O is for oh, yes I do
V is for virtue, so I ain't gonna hurt you
E is for even if you want me to
R is for render unto me, baby
M is for that which is mine

A is for any old how, darling and
N is for any old time
Loverman, yeah, yeah, yeah
I got a masterplan, yeah to take off your dress, yeah
And be your man, be your man, yeah
Seize the throne, ha, ha, seize the mantle
Seize that crown, yeah, 'cause I am what I am
What I am, what I am, plus I am
I'm your loverman
There's a devil laying by your side
(How much longer?)
There's a devil laying by your side
(How much longer?)

You might think he's asleep but take a look at his eyes
(How much longer?)
And he wants you, darling, to be his bride
(How much longer?)
Yeah, there's a devil laying by your side
(How much longer?)
Loverman, loverman, loverman
I'll be your loverman till the end of the time
Till the empires burn down forever, amen
I'll be your loverman, I'll be your loverman
I'm your loverman, I'm your loverman
Yeah, I'm your loverman, I'm your loverman
Loverman, I'm your loverman
I'm your loverman, I'm your loverman
Yeah, I'm your loverman, yes, I'm your loverman
Loverman, loverman, loverman forever, amen
Loverman
(How much longer?) -->
