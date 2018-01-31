<?php


function cleanFormUser($inputText){
     
$inputText = strip_tags($inputText);
$inputText = str_replace(" ", "", $inputText);

    return $inputText;
}

function cleanFormPass($inputText){
$inputText = strip_tags($inputText);
    return $inputText;
}

function cleanFormData($inputText){
     
$inputText = strip_tags($inputText);
$inputText = str_replace(" ", "", $inputText);
$inputText = ucfirst(strtolower($inputText));

    return $inputText;
}



if(isset($_POST['registerButton'])){
    
  $username = cleanFormUser($_POST["username"]);
  $firstName = cleanFormData($_POST["firstname"]);
  $lastName =  cleanFormData($_POST["lastname"]);
  $email = cleanFormData($_POST["email"]);
  $email2 = cleanFormData($_POST["email2"]);
  $password = cleanFormPass($_POST["registerPassword"]);
  $password2 = cleanFormPass($_POST["registerPassword2"]);
    

$isSuccess = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    
    if($isSuccess){
      $_SESSION["userLoggedIn"] = $username;
        header("Location: index.php");
    }


}


?>