<?

class Account {
    
    private $errorArray;
    private $con;
    
    public function __construct($con){
        
        $this->errorArray = array();
        $this->con = $con;
    }
    
    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);
        
        if(empty($this->errorArray)){
            //insert into database
            return $this->insertUser($un, $fn, $ln, $em, $pw);
        }
        return false;
    }
    
   private function validateUsername($user){
       
    if(strlen($user) > 25 || strlen($user) < 5){
        array_push($this->errorArray, Constants::$userNameCharacters);
        return;
    }

    $checkUser = mysqli_query($this->con, "SELECT username from Users WHERE username = '$user' ");
    if(mysqli_num_rows($checkUser)!=0)
      array_push($this->errorArray, Constants::$userTaken);
    return;
}

   private function validateLastName($last){
    if(strlen($last) > 25 || strlen($last) < 2){
        array_push($this->errorArray, Constants::$lastNameCharacters);
        return;
    }
}

   private function validateFirstName($first){
    if(strlen($first) > 25 || strlen($first) < 2){
        array_push($this->errorArray, Constants::$firstNameCharacters);
        return;
    }
}

   private function validateEmails($em, $em2){
       
    if($em != $em2){
        array_push($this->errorArray, Constants::$emailsDoNotMatch);
        return;
    }
       
if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
    array_push($this->errorArray, Constants::$emailsInvalid);
    return;
}

$checkUser = mysqli_query($this->con, "SELECT email from Users WHERE email = '$em' ");
    if(mysqli_num_rows($checkUser)!= 0)
      array_push($this->errorArray, Constants::$emailInUse);
    return;

       
       
   }

   private function validatePasswords($pwd, $pwd2){
       
       if($pwd != $pwd){
           array_push($this->errorArray, Constants::$passwordsDoNotMatch);
           return;
       }
     
       if(preg_match('/[^A-Za-z0-9]/', $pwd)){
           array_push($this->errorArray, Constants::$passwordsNotAlpha);
           return;
       }
   
      if(strlen($pwd) > 30 || strlen($pwd) < 5){
          array_push($this->errorArray, Constants::$passwordsInvalidLength);
          return;
      }
   }

    public function getError($error){
        if(!in_array($error, $this->errorArray)){
            $error="";
        }
   return "<span class='errorMessage'>$error</span>";
    }
private function insertUser($un, $fn, $ln, $em, $pw){

  $encryptedPass = md5($pw);
  $profilePic = "assests/profilePics/default.jpg";
  $date = date("Y-m-d");
  $result = mysqli_query($this->con, "INSERT INTO Users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPass', '$date', '$profilePic')");

  return $result;
}

public function login($un, $pass){

  $pass = md5($pass);
  $query = mysqli_query($this->con, "SELECT * FROM Users WHERE username = '$un' AND password = '$pass' ");

  if(mysqli_num_rows($query) == 1)
    return true;

  array_push($this->errorArray, Constants::$loginFailed);
  return false;
}  

}






















?>