<html>
<style>
body
{
background-color:rgb(184,240,244);
}
.div1
{
border-radius:15px 15px 0px 0px;
width:600px;
background-color:#192841;
color:white;
padding:10px 0px 10px 0px;
text-align:center;
font-size:35px;
margin-top:-450px;
margin-left: 700px;
}
.div2
{
border-radius:0px 0px 15px 15px;
width:400px;
background-color:rgb(255, 255, 255,0.5);
padding:40px 0px 40px 0px;
font-size:18px;
padding:100px;
margin-left: 700px;
}
.a
{
line-height:25px;
border-radius:5px;
padding:0 30px;
margin-left:60px;
}
.s
{
line-height:25px;
border-radius:5px;
padding:10px 30px 10px 30px;
background-color:skyblue;
margin-left:150px;
}
img
{
    margin-top:200px;
    margin-left:100px;
}
</style>
    <script>
        function vendor_login()
        {
            window.location="vendor_login.php";
        }
        function back()
        {
            window.location="index.html";
        }
    </script>
    <body>
        <?php
            include_once '../Acmegrade project/config.php';
            if(isset($_POST['signup']))
            {
                $name=$_POST['name'];
                $pass=$_POST['pass'];   

                $email = $_POST['email'];
                $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
                preg_match($email_pattern, $email, $email_matches);

                $mobileno=$_POST['mobileno'];
                $mobileno_pattern='/^[0-9]{10}+$/';
                preg_match($mobileno_pattern, $mobileno, $mobileno_matches);

                if(!$email_matches || !$mobileno_matches)
                {
                    echo '<script>alert("Please enter valid details")</script>';
                }           
                else
                {
                    $sql="insert into login(name,email,mobileno,pass)values('$name','$email','$mobileno','$pass')";
                    if($conn->query($sql)==true)
                    {
                        echo '<script>alert("Registration successful")</script>';
                    }
                    else
                    {
                        echo '<script>alert("Registration unsuccessful")</script>';
                    }
                }
            }
        ?>
        <form action="" method="post">
<img src="ecommerce.png" width="600px">
<div class="div1">Registration Form</div>
<div class="div2">
Full Name : <input class="a" type="text" id="t1" name="name"><br><br>
E - mail Id : <input class="a" type="text" id="t2" name="email"><br><br>
Mobile No : <input class="a" type="text" id="t3" name="mobileno"><br><br>
Password : <input class="a" type="password" id="t4" name="pass"><br><br><br>
<input class="s" type="submit" name="signup" value="Register" ><br><br>
<center>Already have an account? <a href="vendor_login.php">Click here</a></center>
</div>
</form>
    </body>
</html>