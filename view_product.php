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
        .div4
        {
            background-color: rgb(255, 255, 255,0.7);
            display:inline-block;
            margin:20px;
            padding:10px;
            width: 310px;
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
            margin-top:10px;
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
            margin-left: 700px;
            background-color:gray;
            color:white;
        }
    </style>
    </style>
    <script>
        function upload_product()
        {
            window.location="upload_product.php";
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
        <div class="div1">
            <input type="button" id="s1" name="login" onclick="upload_product()" value="UPLOAD PRODUCT">
            <input type="button" id="s1" name="login" value="VIEW PRODUCT">
            <input type="button" id="s1" name="login" onclick="view_orders()" value="VIEW ORDERS">
            <input type="button" id="s3" onclick="logout()" value="LOGOUT">
        </div>

        <div class="div2">
            <center>Products</center>
        </div>

        <div class="div3">
        <?php
            include_once '../Acmegrade project/config.php';
            if(isset($_POST['delete_product']))
            {
                $delete=$_POST['delete_product'];
                $sql1="delete from products where prod_id=$delete";
                if($conn->query($sql1)==true)
                {
                    echo '<script>alert("Product deleted successful")</script>';
                }
                else
                {
                    echo '<script>alert("Product not deleted")</script>';
                }
            }
            $sql="select * from products";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            if($total!=0)
            {
                while($products=mysqli_fetch_assoc($data))
                {
                    echo "<div class='div4'><img src='".$products['image']."' width='300px'><br><br>Product Name: "
                            .$products['prod_name']."<br>Product cost: "
                            .$products['prod_cost']."<br>Product Description: "
                            .$products['prod_desc']."
                            <form action=''view_product.php' method='post'><br>
                                <div class='div5'><button id='b' name='delete_product' value=".$products['prod_id'].">Delete</button>
                                </div>
                        </div>
                </form>";
                }
            }
            ?>
        </div>
    </body>
</html>