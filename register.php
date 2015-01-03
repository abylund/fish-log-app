

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
First Name: <input type="text" name="fn"><br>
Last Name: <input type="text" name="ln"><br>
email: <input type="text" name="email" value="<?php $email ?>"><br>
password: <input type="text" name="pw"><br>

<input type="submit" value="Submit" name="submit"> 
</form>

<?php    

if(empty($_POST['fn']) || empty($_POST['ln']) || empty($_POST['email']) || empty($_POST['pw'])) {
    echo 'All fields are required';
}

elseif((null !== 'fn') && (null !== 'ln') && (null !== 'email') && (null !== 'pw')) {

 $userFile = new StdClass();
    $userFile->fn = $_POST['fn'];
    $userFile->ln = $_POST['ln'];
    $userFile->email = $_POST['email'];
    $userFile->pw = $_POST['pw'];
     
    
    $userJsonString = json_encode($userFile, JSON_PRETTY_PRINT);
    
    $filename = uniqid(rand(), true) . '.txt';
    
    $file = fopen('Users/'.$filename, 'w');

    fwrite($file, $userJsonString);
    fclose($file);
    echo 'Data Submitted Successfully';

}      
    
    
    
    
if(isset($_POST['submit'])) {

$cookie_name1 = "UserFirstName";
$cookie_name2 = "UserLastName";
$cookie_name3 = "UserEmailAddress";
$cookie_name4 = "UserPassword";
    
setcookie($cookie_name1, $_POST['fn']);
setcookie($cookie_name2, $_POST['ln']);
setcookie($cookie_name3, $_POST['email']);
setcookie($cookie_name4, $_POST['pw']);

}

?>
    
