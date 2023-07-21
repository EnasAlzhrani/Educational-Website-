<?php 

    require_once('config.php');
    
?>
    
<script>

    
    function signUpV(){
        
        let flag = true;
        
        let username = document.getElementById('username').value;
        
        let email = document.getElementById('email').value;
        
        let pass = document.getElementById('pass').value;
        
        let Cpass = document.getElementById('Cpass').value;
        
        const emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        
        
        if(username === "" || username === null){
            
            document.getElementById('emptyUsername').style.display = 'inline';
            document.getElementById('username').style.border='solid red';
            flag = false;
            
        }
        else{
            
            document.getElementById('emptyUsername').style.display = 'none';
            document.getElementById('username').style.border='';
        }
        
        
        if (email === "" || email === null ){
            
            document.getElementById('emptyEmail').style.display = 'inline';
            
            document.getElementById('email').style.border='solid red';
            
            flag = false;
        }
        else{
            
            document.getElementById('emptyEmail').style.display = 'none';
            document.getElementById('email').style.border='';
            
        if(!email.match(emailFormat)){
                
                document.getElementById('invalidEmail').style.display = 'inline';
            
                document.getElementById('email').style.border = 'solid red';
                
                flag = false;
            }
            else{
                
                document.getElementById('invalidEmail').style.display = 'none';
            
                document.getElementById('email').style.border = '';
                
            
            }
        }
            
        if (pass === "" || pass === null ){
                
            document.getElementById('emptyPass').style.display = 'inline';
            
            document.getElementById('pass').style.border = 'solid red';
                
            flag = false;
                
        }
        
        else{
                
                document.getElementById('emptyPass').style.display = 'none';
            
                document.getElementById('pass').style.border = '';        
                
            }
        
        if (Cpass === "" || Cpass === null ){
                
                document.getElementById('emptyCpass').style.display = 'inline';
            
                document.getElementById('Cpass').style.border = 'solid red';
                
                flag = false;
                
            }
            else{
                
                document.getElementById('emptyCpass').style.display = 'none';
            
                document.getElementById('Cpass').style.border = '';
                
                 if(Cpass !== pass){
                    
                    document.getElementById('machpass').style.display = 'inline';
                    document.getElementById('Cpass').style.border = 'solid read';
                    
                    flag = false;
                }
                
                else{
                    
                    document.getElementById('machpass').style.display = 'none';
                    document.getElementById('Cpass').style.border = '';
                    
                }
            }
            
        
        return flag;
        
    }
    
</script>
<head>
	<title>Sing Up</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
    
    <h1>Sing Up </h1>
    <h3>Start learning with us</h3>
    <span class="complete" id="">success</span>
    
    
<br><form name="signup" action='registration.php' method="POST" onsubmit="return signUpV();">
        
        <label>User Name:</label>
        <span class="error" id="emptyUsername">Required</span>
        <br><input type="text" name="username" id="username" placeholder="Ente Your Name">
        <br>
        <br><label>Email address:</label>
        <span class="error" id="existEmail">Email exist!! try  to log in</span>
        <span class="error" id="emptyEmail">Required</span>
        <span class="error" id="invalidEmail">invalid Email address</span>
        <br><input type="text" name="email" id="email" placeholder="Ente Your Email">
        
        <br>
        <br><label>Password:</label>
        <span class="error" id="emptyPass">Required</span>
        <br><input type="password" name="pass" id="pass" placeholder="Enter Your Password">
		<br>			
        <br><label>Confirm Password:</label>
        <span class="error" id="emptyCpass">Required</span>
        <span class="error" id="machpass">Dose Not Match </span>
        <br><input type="password" name="Cpass" id="Cpass" placeholder=" Confirm Password">
        <br>
        <br><button type="submit" name="signup" id="signup">Sign Up</button>
        <br><a href="index.php">Log in</a>
        
         <?php
            
            
   // $emailFormat = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    
            if(isset($_POST['signup'])){
                
                $email = $_POST['email'];
        $username = $_POST['username'];
            $pass = $_POST['pass'];
            $Cpass = $_POST['Cpass'];
                
$sql = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";
$result = mysqli_query($connection, $sql) or die( mysqli_error($connection));
$row = mysqli_fetch_assoc($result);
$count = $row['count'];
                
if($count>0){            
            
    
    echo "<script> 
        
        document.getElementById('existEmail').style.display = 'inline';
        
    </script>";
}
else{
    
    
$insert = "INSERT into users (email, paasword, user_name) value ('$email','$pass','$username')";

if(mysqli_query($connection, $insert)) {
                                    echo "<script>
                                    document.getElementById('success').style.display = 'inline';
                                    </script>";
                                    echo "<script> 
                                    location.href='index.php'; 
                                    </script>";
                                }
}
                
        
    
            }
    ?>

        
       
        
    </form>
    
    

    
</body>