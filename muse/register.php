<?php
include("includes/config.php");
include_once("includes/Classes/Account.php");
include_once("includes/Classes/Constants.php");
 $account = new Account($con);
include_once("includes/handlers/register-handler.php");
include_once("includes/handlers/login-handler.php");
    

?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <title> Welcome to Muse! </title>
    
    </head>

   
    
    <body>
    
    <div id="background">

        <div id="loginContainer">

    <div id="inputContainer">
        
        <!--Login Form -->
      
        <form id="loginForm" action="register.php" method ="POST">
            
        <h2> Login to your account</h2>

        <?php echo $account->getError(Constants::$loginFailed); ?>
            
        <p>
            <label for="loginUsername"> Username </label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>
            
        </p>
        
            <p>
            
             <label for="loginPassword"> Password</label>
             <input id="loginPassword" name="loginPassword" type="password" placeholder="Username" required>
       
            </p>
        
            <button type="submit" name ="loginButton">Login</button>

            <div class="hasAccount">
                <span id="hideLogin"> Dont have an account yet? Sign Up </span>
            </div>
        
        </form>
        
         <!-- Regsiter Form -->
        
        <form id="registerForm" action="register.php" method ="POST">
            
        <h2>Create your account</h2>
            
        <p>
            <label for="username"> Username </label>
            <input id="username" name="username" type="text" placeholder="Username" required>
            <?php echo $account->getError(Constants::$userNameCharacters); ?>
            <?php echo $account->getError(Constants::$userTaken); ?>

        </p>
          
            <p>
            
             <label for="firstname">First Name</label>
             <input id="firstname" name="firstname" type="text" placeholder="First Name" required>
            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
          </p>
            
            <p>
            
                 <label for="lastname">Last Name</label>
                  <input id="lastname" name="lastname" type="text" placeholder="Last Name" required>
              <?php echo $account->getError(Constants::$lastNameCharacters); ?>
            
            </p>
        
            <p>
            
                 <label for="email">Email</label>
                  <input id="email" name="email" type="email" placeholder="@youremail" required>
                <?php echo $account->getError(Constants::$emailsInvalid); ?>
                <?php echo $account->getError(Constants::$emailInUse); ?>
            </p>
            
            <p>
            
                 <label for="email2"> Confirm Email</label>
                  <input id="email2" name="email2" type="email" placeholder="Confirm Email" required>
                       <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>

            </p>
            
            <p>
            
             <label for="registerPassword"> Password</label>
             <input id="registerPassword" name="registerPassword" type="password" placeholder="Password" required>
             <?php echo $account->getError(Constants::$passwordsInvalidLength); ?>
             <?php echo $account->getError(Constants::$passwordsNotAlpha); ?>
            </p>
            
            <p>
            
             <label for="registerPassword2">Confirm Password</label>
             <input id="registerPassword2" name="registerPassword2" type="password" placeholder="Confirm Password" required>
             <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
            </p>
            
            <button type="submit" name ="registerButton">Register!</button>
        </form>
        
        
        </div>

    </div>
    
    </div>
    
    
    
    
    
    </body>














</html>

