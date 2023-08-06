<html>
    <style>
        body
        {
            background-color: rgb(18,240,244,0.3);
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
            margin-left: 600px;
            background-color:gray;
            color:white;
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
        th,td
        {
            padding:10px 20px 20px 10px;
            font-size:17px;
        }
        th
        {
            background-color:lightgray;
        }
        td
        {
            background-color:#FAFAFA;
        }
    </style>
    <script>
        function upload_product()
        {
            window.location="upload_product.php";
        }
        function view_product()
        {
            window.location="view_product.php";
        }
        function logout()
        {
            window.location="admin_login.php";
        }
    </script>
    <body>
        <div class="div1">
            <input type="button" id="s1" name="login" onclick="upload_product()" value="UPLOAD PRODUCT">
            <input type="button" id="s1" name="login" onclick="view_product()" value="VIEW PRODUCT">
            <input type="button" id="s1" name="login" value="VIEW ORDERS">
            <input type="button" id="s3" onclick="logout()" value="LOGOUT">
        </div>

        <div class="div2">
            <center>ORDERS</center>
        </div>

        <div class="div3">
        <?php
            include_once '../Acmegrade project/config.php';
            $sql="select * from confirm_order";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            if($total!=0)
            {
                ?>
                <div><table>
                <tr>
                <th>Order No.</th>
                <th>Mobile No.</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>House No./Apartment Name - Flat No.</th>
                <th>Street Name</th>
                <th>Landmark</th>
                <th>Pincode</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Payment Mode</th>
                </tr>
                <?php
                while($confirm_order=mysqli_fetch_assoc($data))
                {
                    echo "<tr>
                    <td>".$confirm_order['orderno']."</td>
                    <td>".$confirm_order['mobileno']."</td>
                    <td>".$confirm_order['prod_id']."</td>
                    <td>".$confirm_order['prod_name']."</td>
                    <td>".$confirm_order['prod_cost']."</td>
                    <td>".$confirm_order['house_no']."</td>
                    <td>".$confirm_order['street_name']."</td>
                    <td>".$confirm_order['landmark']."</td>
                    <td>".$confirm_order['pincode']."</td>
                    <td>".$confirm_order['city']."</td>
                    <td>".$confirm_order['state']."</td>
                    <td>".$confirm_order['country']."</td>
                    <td>".$confirm_order['payment']."</td>
                    </tr>";
                }
            }
            ?>
        </div>
    </body>
</html>