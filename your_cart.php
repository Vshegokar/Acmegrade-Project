<html>
    <style>
        body
        {
            background-color: rgb(18,240,244);
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
        .div5
        {
            border:1px solid black;
            width:fit-content;
        }
        .div5:hover
        {
            border: 2px solid rgb(132, 90, 157);;
        }
        #b
        {
            border:none;
            background-color:transparent;
        }
        #s3
        {
            margin-left:950px;
            background-color: lightgrey;
        }
        .abc
        {
            display:inline-block;
            padding-right:50px;
        }
        .div6
        {
            height:2px;
            background-color:lightgray;
        }
    </style>
    <script>
        function vendor_view_product()
        {
            window.location="vendor_view_product.php";
        }
        function logout()
        {
            window.location="vendor_login.php";
        }
    </script>
    <body>
        <div class="div1">
            <input type="button" id="s1" onclick="history.back()" value="VIEW PRODUCT">
            <input type="button" id="s1" value="YOUR CART">
            <input type="button" id="s3" onclick="logout()" value="LOGOUT">
        </div>

        <div class="div2" id="content1">
            <center>YOUR CART</center>
        </div>
        <div class="div3" id="content2">
        <?php
            include_once '../Acmegrade project/config.php';
            $mobileno=$_GET['mobileno'];
            $sql="select * from mybag where mobileno='$mobileno'";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            $total_amount=0;
            if($total!=0)
            {
                while($mybag=mysqli_fetch_assoc($data))
                {
                    $prod_id=$mybag['prod_id'];
                    $sql1="select * from products where prod_id='$prod_id'";
                    $data1=mysqli_query($conn,$sql1);
                    $total1=mysqli_num_rows($data1);
                    if($total1!=0)
                    {
                        while($products=mysqli_fetch_assoc($data1))
                        {
                            echo "<div class='div4'>
                            <div class='abc'><img src='".$products['image']."' width='150px'></div>
                            <div class='abc'>
                            Product ID: ".$products['prod_id']."<br>
                            Product Name: ".$products['prod_name']."<br>
                            Price: ".$products['prod_cost']."<br>
                            <form action='' method='post'><br>
                                <div class='div5'><button id='b' name='delete_product' value=".$mybag['item_no'].">Delete</button>
                                </div></div>
                            </div>
                            </form>";
                            $total_amount=$total_amount+$products['prod_cost'];
                            $prod_name=$products['prod_name'];
                            $prod_cost=$products['prod_cost'];
                            if(isset($_POST['place_order']))
                            {
                                $house_no=$_POST['house_no'];
                                $street_name=$_POST['street_name'];   
                                $landmark = $_POST['landmark'];
                                $pincode=$_POST['pincode'];
                                $city=$_POST['city'];
                                $state=$_POST['state'];
                                $country=$_POST['country'];
                                $payment=$_POST['payment'];
                                if($house_no=="" || $street_name=="" || $landmark=="" || $pincode=="" || $city=="" || $state=="" || $country=="" || $payment=="")
                                {
                                    echo '<script>alert("Please enter all the details")</script>';
                                }           
                                else
                                {
                                    $sql="insert into confirm_order(mobileno,prod_id,prod_name,prod_cost,house_no,street_name,landmark,pincode,city,state,country,payment)values('$mobileno','$prod_id','$prod_name','$prod_cost','$house_no','$street_name','$landmark','$pincode','$city','$state','$country','$payment')";
                                    if($conn->query($sql)==true)
                                    {
                                        echo '<script>alert("Order confirmed")</script>';
                                        $sql3="delete from mybag where mobileno=$mobileno";
                                        if($conn->query($sql3)==true)
                                        {

                                        }
                                    }
                                    else
                                    {
                                        echo '<script>alert("Unable to place order")</script>';
                                    }
                                }
                            }
                        }
                    }
                }
                
                }
                    if(isset($_POST['delete_product']))
                    {
                        $delete_product=$_POST['delete_product'];
                        
                        $sql2="delete from mybag where mobileno='$mobileno' and item_no='$delete_product'";
                        if($conn->query($sql2)==true)
                        {
                            echo '<script>alert("Product deleted successful")</script>';
                        }
                        else
                        {
                            echo '<script>alert("Product not deleted")</script>';
                        }
                    }
            ?>
        
        <?php
            echo "<center><div class='div6'></div><br>Total Amount : ".$total_amount;
            ?>
            <br><br><form action='' method='post'>
                <input id="i" placeholder="House No./Apartment Name - Flat No." name="house_no"><br><br>
                <input id="i" placeholder="Street Name" name="street_name"><br><br>
                <input id="i" placeholder="Landmark" name="landmark"><br><br>
                <input id="i" placeholder="Pincode" name="pincode"><br><br>

                <input id="i" placeholder="City" name="city"><br><br>
                <input id="i" placeholder="State" name="state"><br><br>
                <input id="i" placeholder="Country" name="country"><br><br>

                <input id="r" type="radio" name="payment" value="Google pay">Google pay<br>
                <input id="r" type="radio" name="payment" value="Net Banking">Net Banking<br>
                <input id="r" type="radio" name="payment" value="Cash on delivery">Cash on delivery<br><br><br>
                <button id="s2" name="place_order">Place Order</button></center></form>
    </body>
</html>