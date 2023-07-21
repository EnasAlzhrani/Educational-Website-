<?php 
    require_once('config.php');
?>

<head>
	<title>Home Page</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
    
    <h1 class="title"> HOME PAGE</h1>
            <?php
    
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                header("location: index.php");
                exit;
            }
            $TOT = 0;
            $email = $_SESSION['email'];
    
            $sql = "SELECT * FROM users WHERE email = '$email'";

            if($result = mysqli_query($connection , $sql)){
                
                $row = mysqli_fetch_assoc($result);
                $_SESSION['login_time'] = $row['login_time'];  
                $_SESSION['username'] = $row['user_name'];
                $lessonID = $row['lesson_completed']+1;
                $_SESSION['lessonID'] = $lessonID;
                $scores = array( 1=> $row['q1_score'], 2=> $row['q2_score'], 3=>$row['q2_score'] );
                
            }
           
            echo
                "<h4 id='UTS'>".$_SESSION['login_time']."</h4> "
                .
                "<h3 id='msg'> HELLO ".$_SESSION['username']."</h3>";
    
            if($lessonID === 4){ 
                for( $j = 1; $j<4; $j++){
                   
                    $TOT += $scores[$j];
                }
                echo
                "<h2 id='MSG'>Congratulations! You have completed all lessons. TOTAL SCORE = ".$TOT."/12</h2> ";}
        ?>
    
    <table class="table">
                <thead>
                    <tr>
                        <th>LESSONS</th>
                        <th>SCORE</th>
                    </tr>
                </thead>
                <tbody>
        
        <?php
        
            for( $i = 1; $i<$lessonID; $i++){
                
                echo "<tr>
                        <td>lesson No.".$i."</td>
                        <td>".$scores[$i]."</td>
                    </tr>";
            }
            if($i<4)
            echo 
                "<tr>
                <td> <a href='lessons.php'>lesson No.".$i."</a></td>
                <td> NOT TAKEN YET</td>
                </tr>";
            
        ?>
            </tbody>
            </table>
    <?php
            if(isset($_POST['signout'])) {
                session_destroy();
                unset($_SESSION['loggedin']);
                header('Location: index.php');
                mysqli_free_result($result);
                mysqli_close($connection);
                exit();
            }
        ?>
    
    
    
   <form id="SO"action="homePage.php" method ='post'>
        <button type="submit" name="signout">Sign out</button>
</form>
    
</body>

<style>

body{
    
    border-style: dashed;
    border-color: black;
    background-color:snow;
    text-align: center;
}

#UTS{
    
    text-align: left;
    font-size: 20px;
    color:blueviolet;
}

h1{
    color:cadetblue;
    font-size: 50px;
    background-color:beige;
}

h3{
    font-size: 20px;
    display: block;
}

.error{
    
    text-decoration: underline; 
    font-style: italic;
    color: firebrick;
    display: none;
        
}

form{
    
    font-size: 20px;
    padding: 1em;
    text-align-last: left;
    display: inline-block;
    border-style: dotted;
    border-color: black;
    background-color:antiquewhite;
}

.complete{
    
    color:aliceblue;
    display: none;
        
}

.table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    text-align: center;
    margin-left:auto;
    margin-right:auto;
}

.table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: center;
    
}

.table td {
    padding: 12px 15px;
}


.table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

</style>