<html>
<head>
<title></title>
<head>
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
margin-top:-380px;
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
<body>
    <?php
            include_once '../Acmegrade project/config.php';
            if(isset($_POST['login']))
            {
                $pass=$_POST['pass'];
                $mobileno=$_POST['mobileno'];
                $mobileno_pattern='/^[0-9]{10}+$/';
                preg_match($mobileno_pattern, $mobileno, $mobileno_matches);
                
                if(!$mobileno_matches)
                {
                    echo '<script>alert("Please enter valid phone number")</script>';
                }  
                else
                {
                    $sql="select * from login where mobileno='$mobileno' and pass='$pass'";
                    $data=mysqli_query($conn,$sql);
                    $total=mysqli_num_rows($data);
                    if($total!=0)
                    {
                        echo "<script>window.location='vendor_view_product.php? mobileno=$mobileno'</script>";
                    }
                    else
                    {
                        echo '<script>alert("Details not available. Please register")</script>';
                    }
                }
            }
        ?>
<form action="vendor_login.php" method="post">
<img src="ecommerce.png" width="600px">
<div class="div1">Login Form</div>
<div class="div2">
Mobile No : <input class="a"  name="mobileno"><br><br>
Password : <input type="password" class="a" name="pass"><br><br><br>
<input class="s" type="submit" name="login" value="Login"><br><br>
<center>Don't have an account? <a href="vendor_signup.php">Click here</a></center>
</div>
</form>
</body>
</html>