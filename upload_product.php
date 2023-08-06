<html>
    <style>
        body
        {
            background-color: rgb(184,240,244);
        }
        #i
        {
            padding:10px;
            width:700px;
        }
        #s1,#s3
        {
            padding: 12px 22px 12px 22px;
            border:1px solid white;
            font-size: 15px;
            background-color:transparent;
        }
        #s1:hover
        {
            border-bottom: 3px solid gray;
        }
        .div1
        {
            background-color: white;
            padding: 20px;
        }
        .div2
        {
            background-color: rgb(0,0,0);
            color: white;
            padding: 0px 30px 20px 30px;
            font-size: 20px;
            margin: 10px 200px 0px 200px;
        }
        .div3
        {
            background-color: rgb(255, 255, 255,0.7);
            padding: 60px 30px 60px 50px;
            margin: 0px 200px 0px 200px;        
        }
        #s2
        {
            padding: 15px 25px 15px 25px;
            color:white;
            background-color:gray;
            border:none;
        }
        #s3
        {
            margin-left: 700px;
            background-color:gray;
            color:white;
        }
    </style>
    <script>
        function view_product()
        {
            window.location="view_product.php";
        }
        function view_orders()
        {
            window.location="view_orders.php";
        }
        function logout()
        {
            window.location="admin_login.php";
        }
    </script>
    <body>
        <?php
            include_once '../Acmegrade project/config.php';
            if(isset($_POST['upload_product']))
            {
                $prod_name=$_POST['prod_name'];
                $prod_cost=$_POST['prod_cost'];
                $prod_desc=$_POST['prod_desc'];
                $image=$_POST['image'];
                if($prod_name=="" || $prod_cost=="" || $prod_desc=="" || $image=="")
                {
                    echo "<script>alert('Please fill all the details')</script>";
                }
                else
                {
                    $sql="insert into products(prod_name,prod_cost,prod_desc,image)values('$prod_name','$prod_cost','$prod_desc','$image')";
                    if($conn->query($sql)==true)
                    {
                        echo '<script>alert("Product added successful")</script>';
                    }
                    else
                    {
                        echo '<script>alert("Product not added")</script>';
                    }
                }
            }
        ?>
        <div class="div1">
            <input type="button" id="s1" name="login" value="UPLOAD PRODUCT">
            <input type="button" id="s1" name="login" onclick="view_product()" value="VIEW PRODUCT">
            <input type="button" id="s1" name="login" onclick="view_orders()" value="VIEW ORDERS">
            <input type="button" id="s3" onclick="logout()" value="LOGOUT">
        </div>
            <br>
        <div class="div2"><br><br>
            <center>Add Products</center>
        </div>
        <form action='upload_product.php' method='post'>
            <div class="div3">
            <center>
            Product name : <input id="i" name="prod_name"><br><br>
            Product price : &nbsp<input id="i" name="prod_cost"><br><br>
            Description : &nbsp&nbsp&nbsp&nbsp<Textarea id="i" name="prod_desc"></Textarea><br><br>
            Product image : <input type="file" accept=".jpg" id="i" name="image"><br><br><br>
            <button id="s2" name="upload_product">ADD PRODUCT</button></center>
            </div>
        </form>
    </body>
</html>