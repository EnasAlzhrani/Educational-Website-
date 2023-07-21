<?php 

    require_once('config.php');
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                
            header("location: index.php");
            exit;
    }
    
    $lesson_id = $_SESSION["lessonID"];
    $email = $_SESSION["email"];
    $qid = $lesson_id * 4 -3;


 
?>

<head>
	<title>Quize</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <?php
    echo "<h1 class='title'>Quize NO.".$lesson_id."</h1>";
    ?>
    <span class = 'error' id='quizeerror'> solve all </span>     
   <form method="post" action="quizzes.php" name="quiz" onsubmit='return quizValidation();'> 
       
   <?php
        
    $sql = "SELECT * FROM questions WHERE lesson_id = '$lesson_id' && id = '$qid'";
                
                if($result = mysqli_query($connection, $sql)){
                
                    
                    while($row = mysqli_fetch_assoc($result)){
                    
                        $ansr1 = $row['ansr'];
                                                
                    echo
                 
                "<lebal class='qustion' id='lebalq1'>".$row['qustion']."</lebal><br>"
            .
                "<input type='radio' id='idq1'name ='idq1' value=".$row['op1'].">"
            .
                "<lebal class='qustion' id='lebal11'>".$row['op1']."</lebal><br>"
            .
                "<input type='radio' id='idq1'name ='idq1' value=".$row['op2'].">"
            .
                "<lebal class='qustion'id='op12'>".$row['op2']."</lebal><br>"
            .
                "<input type='radio' id='idq1'name ='idq1' value=".$row['op3'].">"
            .
                "<lebal class='qustion'id='op13'>".$row['op3']."</lebal><br>"
            .
                "<input type='radio' id='idq1'name ='idq1' value=".$row['op4'].">"
            .
                "<lebal class='qustion'id='lebal14'>".$row['op4']."</lebal><br>";
                }}
       
       $qid++;
       
        $sql = "SELECT * FROM questions WHERE lesson_id = '$lesson_id' && id = '$qid'";
                
                if($result = mysqli_query($connection, $sql)){
                
                    
                    while($row = mysqli_fetch_array($result)){
                        
                        $ansr2 = $row['ansr'];
                    
                    echo
                 
                "<lebal class='qustion' id='lebalq2'>".$row['qustion']."</lebal><br>"
            .
                "<input type='radio' id='idq2'name ='idq2' value=".$row['op1'].">"
            .
                "<lebal class='qustion' id='lebal21'>".$row['op1']."</lebal><br>"
            .
                "<input type='radio' id='idq2'name ='idq2' value=".$row['op2'].">"
            .
                "<lebal class='qustion'id='lebal22'>".$row['op2']."</lebal><br>"
            .
                "<input type='radio' id='idq2'name ='idq2' value=".$row['op3'].">"
            .
                "<lebal class='qustion'id='lebal23'>".$row['op3']."</lebal><br>"
            .
                "<input type='radio' id='idq2'name ='idq2' value=".$row['op4'].">"
            .
                "<lebal class='qustion'id='lebal24'>".$row['op4']."</lebal><br>";
                }}
        $qid++;
       
        $sql = "SELECT * FROM questions WHERE lesson_id = '$lesson_id' && id = '$qid'";
                
                if($result = mysqli_query($connection, $sql)){
                
                    
                    while($row = mysqli_fetch_array($result)){
                        
                        $ansr3 = $row['ansr'];
                        
                    echo
                 
                "<lebal class='qustion' id='lebalq3'>".$row['qustion']."</lebal><br>"
            .
                "<input type='radio' id='idq3'name ='idq3' value=".$row['op1'].">"
            .
                "<lebal class='qustion' id='lebal31'>".$row['op1']."</lebal><br>"
            .
                "<input type='radio' id='idq3'name ='idq3' value=".$row['op2'].">"
            .
                "<lebal class='qustion'id='lebal32'>".$row['op2']."</lebal><br>"
            .
                "<input type='radio' id='idq3'name ='idq3' value=".$row['op3'].">"
            .
                "<lebal class='qustion'id='lebal33'>".$row['op3']."</lebal><br>"
            .
                "<input type='radio' id='idq3'name ='idq3' value=".$row['op4'].">"
            .
                "<lebal class='qustion'id='lebal34'>".$row['op4']."</lebal><br>";
                }
            }
       
       $qid++;
       
        $sql = "SELECT * FROM questions WHERE lesson_id = '$lesson_id' && id = '$qid'";
                
                if($result = mysqli_query($connection, $sql)){
                
                    
                    while($row = mysqli_fetch_array($result)){
                        
                        $ansr4 = $row['ansr'];
                        
                    echo
                 
                "<lebal class='qustion' id='lebalq4'>".$row['qustion']."</lebal><br>"
            .
                "<input type='radio' id='idq4'name ='idq4' value=".$row['op1'].">"
            .
                "<lebal class='qustion' id='lebal41'>".$row['op1']."</lebal><br>"
            .
                "<input type='radio' id='idq4'name ='idq4' value=".$row['op2'].">"
            .
                "<lebal class='qustion'id='lebal42'>".$row['op2']."</lebal><br>"
            .
                "<input type='radio' id='idq4'name ='idq4' value=".$row['op3'].">"
            .
                "<lebal class='qustion'id='lebal43'>".$row['op3']."</lebal><br>"
            .
                "<input type='radio' id='idq4'name ='idq4' value=".$row['op4'].">"
            .
                "<lebal class='qustion'id='lebal44'>".$row['op4']."</lebal><br>";
                }}
                        
     
       
    ?>
       <button type="submit" id="quiz" name = "quiz">Submit</button><br>
       <button type="reset" id="reset" name = "reset">Reset</button><br>
       <button type="button" id="home" name = "home" ><a href="homePage.php"> go home</a></button>
       
       <?php
        

        if(isset($_POST["quiz"])){
            
            $q1s = $_POST['idq1'];
            $q2s = $_POST['idq2'];
            $q3s = $_POST['idq3'];
            $q4s = $_POST['idq4']; 
            $quizS = 0;
                        
            if($ansr1 === $q1s){
                
                echo "<script>document.getElementById('lebalq1').style.color= 'green';</script>";
                $quizS++;
            }
            else{
                
                echo "<script>document.getElementById('lebalq1').style.color= 'red';</script>";
            }
            if($ansr2 === $q2s){
                
                echo "<script>document.getElementById('lebalq2').style.color= 'green';</script>";
                $quizS++;
            }
            else{
                
                echo "<script>document.getElementById('lebalq2').style.color= 'red';</script>";
            }
            
            if($ansr3 === $q3s){
                
                echo "<script>document.getElementById('lebalq3').style.color= 'green';</script>";
                $quizS++;
            }
            else{
                
                echo "<script>document.getElementById('lebalq3').style.color= 'red';</script>";
            }
            
            if($ansr4 === $q4s){
                
                echo "<script>document.getElementById('lebalq4').style.color= 'green';</script>";
                $quizS++;
            }
            else{
                
                echo "<script>document.getElementById('lebalq4').style.color= 'red';</script>";
                
                
            }
            
            echo "<script>document.querySelector('#quizeerror').style.display = 'none';</script>";
            echo "<h3 class= 'score'> ".$quizS."/4</h3>";
            
            $sql = "UPDATE users set q".$lesson_id."_score = '$quizS' WHERE email = '$email'";
            
            $update = mysqli_query($connection, $sql);
            
            $sql = "UPDATE users set lesson_completed= '$lesson_id'  WHERE email = '$email'";
                        
            $update = mysqli_query($connection, $sql);
            
            
            echo 
                "<script>document.querySelector('#quiz').style.display = 'none';</script>"
            .
                "<script>document.querySelector('#reset').style.display = 'none';</script>";
            
            
            
        }
    
        
    ?> 
       
    </form>  

    <script>
    
    function quizValidation(){
        
        
        //document.body.innerHTML("<h3> hhhhhhhh</h3>");
        
        let checked1 = false;
        let checked2 = false;
        let checked3 = false;
        let checked4 = false;
        
        let q1 = document.quiz.idq1;
        for(let i = 0; i<q1.length; i++)
        if(q1[i].checked){
            checked1 = true;
            //document.querySelector('#lebalq1').style.color = 'blue';
            
        }
        
        let q2 =document.quiz.idq2;
        for(let i = 0; i<q2.length; i++)
        if(q2[i].checked){
            checked2 = true;
            //document.querySelector('#lebalq2').style.color = 'blue';
        }
        
        let q3 =document.quiz.idq3;
        for(let i = 0; i<q3.length; i++)
        if(q3[i].checked){
            checked3 = true;
            //document.querySelector('#lebalq3').style.color = 'blue';
        }
        
        let q4 = document.quiz.idq4;
        for(let i = 0; i<q4.length; i++)
        if(q4[i].checked){
            checked4 = true;
            //document.querySelector('#lebalq4').style.color = 'blue';
        }
        
        if(checked1 && checked2 && checked3 && checked4){
            return true;
        }
        
        else {
                document.querySelector('#quizeerror').style.display = 'block';  
                return false;
        }
    }
    
</script>
   
    
</body>