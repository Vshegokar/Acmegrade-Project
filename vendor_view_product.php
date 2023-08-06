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
            padding: 20px 30px 20px 30px;
            font-size: 20px;
        }
        .div3
        {
            background-color: rgb(255, 255, 255,0.7);
            padding: 60px 30px 60px 50px;
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
            margin-left: 950px;
            background-color:gray;
            color:white;
        }
        .div4
        {
            display:inline-block;
            width:300px;
            margin:8px;
            padding:8px;
            border: 1px solid gray;
        }
    </style>
    </style>
    <script>
        function logout()
        {
            window.location="vendor_login.php";
        }
    </script>
    <body>
    <form action='' method='post'>
        <div class="div1">
            <input type="button" id="s1" value="VIEW PRODUCT">
            <button id="s1" name="your_cart">YOUR CART</button>
            <input type="button" id="s3" onclick="logout()" value="LOGOUT">
        </div>
    </form>
        <div class="div2">
            <center>PRODUCTS</center>
        </div>

        <div class="div3">
        <?php
            include_once '../Acmegrade project/config.php';
            $sql="select * from products";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            if($total!=0)
            {
                while($products=mysqli_fetch_assoc($data))
                {
                    echo "<div class='div4'><img src='".$products['image']."' width='300px'><br><br>
                    Product ID: ".$products['prod_id']."<br>
                    Product Name: ".$products['prod_name']."<br>
                    prod_cost: ".$products['prod_cost']."<br>
                    prod_desc: ".$products['prod_desc']."
                    <form action='' method='post'>
                        <div class='div5'><br><button id='b' name='add_to_cart' value=".$products['prod_id'].">Add to cart</button>
                        </div>
                    </div>
                </form>";
                }
            }
            $mobileno=$_GET['mobileno'];
            if(isset($_POST['add_to_cart']))
            {
                $add_to_cart=$_POST['add_to_cart'];
                
                $sql1="insert into mybag(mobileno,prod_id)values('$mobileno','$add_to_cart')";
                if($conn->query($sql1)==true)
                {
                    echo '<script>alert("Product added successfully")</script>';
                }
                else
                {
                    echo '<script>alert("Error")</script>';
                }
            }
            if(isset($_POST['your_cart']))
            {
                
                    echo "<script>window.location='your_cart.php? mobileno=$mobileno'</script>";
                
            }
            ?>
        </div>
    </body>
</html>