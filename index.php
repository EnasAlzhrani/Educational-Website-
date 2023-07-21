<?php 
    require_once('config.php');
?>

<head>
	<title>Log In</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1> Log in</h1>
    <h3>Log in to continue the learning journey with us</h3>
    
    <br><form name="logIn" action='index.php' method="POST" onsubmit='return logInValidation();'>
        
        <span class="error" id="errorLogIn">No match</span>
        
        <label>Email address:</label>
        <span class="error" id="emptyEmail">Required</span>
        <span class="error" id="invalidEmail">invalid Email address</span>
        <br><input type="text" name="email" id="email" placeholder="Ente Your Email">
        
        <br>
        <br><label>Password:</label>
        <span class="error" id="emptyPass">Required</span>
        <br><input type="password" name="pass" id="pass" placeholder="Enter Your Password">
        <br>
        <br><button type="submit" name="logIn">Log in</button>
        <br><a href="registration.php"> Sign Up </a>
        
        
        <?php
            
        
            if(isset($_POST['logIn'])){
                
                
                
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                
                $sql = "SELECT * FROM users WHERE email = '$email' AND paasword = '$pass' ";
                $result = mysqli_query($connection, $sql) or die( mysqli_error($connection));
                
                
                if($row = mysqli_fetch_array($result) > 0){
                
                    
                    while($row = mysqli_fetch_array($result) > 0)
                        $_SESSION['username'] = $row['user_name'];
                        
                    $_SESSION['email'] = $email;
                    $_SESSION['loggedin'] = true;
                    
                    
                    
                    $sql = "SELECT * FROM users WHERE email = '$email' AND paasword = '$pass' ";
                    $result = mysqli_query($connection, $sql) or die( mysqli_error($connection));
                    
                    $sql = "UPDATE users set login_time = now() WHERE email = '$email' ";
                    $update = mysqli_query($connection, $sql);
                    

                        header('Location:homePage.php');
                    
                }
                else {
                    
                    echo 
                        
                        "<script>
                            document.getElementById('errorLogIn').style.display = 'inline';
                            document.getElementById('errorLogIn').style.color = 'red';
                        </script>";
                }
                
                

            }
        ?>
        
    </form>
    
    <script>
        
        function logInValidation() {
            
            
            let flag = true;
            let email = document.getElementById('email').value;
            let pass = document.getElementById('pass').value;
            
            // check empty     
            
            if (email === "" || email === null ) {
                
                document.getElementById('emptyEmail').style.display = 'inline';
                document.getElementById('email').style.border = 'solid red';
                flag = false;
            }
            
            if (pass === "" || pass === null ) {
                
                document.getElementById('emptyPass').style.display = 'inline';
                document.getElementById('pass').style.border = 'solid red'; 
                flag = false;
            }
            
            ///////////////////////////////////////////////////////////////////
            
            
            // chech email format
            
            const emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            
            
            if (!email.match(emailFormat)) {
                
                document.getElementById('invalidEmail').style.display = 'block';
                document.getElementById('email').style.border = 'solid red';
                flag = false;
            }
            
            return flag;
        
        }
        
    </script>
    
    
</body>