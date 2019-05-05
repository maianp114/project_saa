<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <style>
            body {
                font-family: 'Sarabun', sans-serif;
                background: url('img/zxc.jpg');
                background-size: cover; 
            }
            .boxx {
                width: 100%;
                margin: 0 auto;
                background-color: #FFFFFF;
                border: 1px solid #eee;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 8px rgba(214, 214, 214, 0.2);
                box-shadow: 0 1px 8px rgba(214, 214, 214, 0.2);
                padding: 10px 20px 10px 20px;
                margin-top:200px
            }
            .cart_submit {
                padding: 15px;
                font-size: 20px;
                color: #FFFFFF;
                background: linear-gradient(to right, #fc5c7d, #6a82fb); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                border-color: #FFFFFF;
                box-shadow: 0 1px 8px rgba(214, 214, 214, 0.2);
                -moz-transition: all .2s ease-in;
                -webkit-transition: all .2s ease-in;
                transition: background .2s ease-in;
                
            }

            .cart_submit:hover {
                color: #FFFFFF;
                box-shadow: 0 1px 8px rgba(214, 214, 214, 0.2);
                
            }
    </style>
</head>
<body>
    <div class="container">
            <div class="boxx">
                <div class="row">
                    <div class="col-8">
                        <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">สินค้า</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">จำนวน</th>
                                <th class="col">รวม/รายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once('condb.php');
                            $total=0;
                            foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
                            {
                                $sql = "select * from ecu_product where p_id=$p_id";
                                $query = mysqli_query($con, $sql);
                                $row	= mysqli_fetch_array($query);
                                $sum	= $row['p_price']*$p_qty;
                            $total	+= $sum;
                            $net = $total*0.93;
                            $vat = $total*0.07;
                            echo "<tr>";
                            echo "<th scope='row'>";
                            echo  $i += 1;
                            echo "</th>";
                            echo "<td width='50%'>" . $row["p_name"] . "</td>";
                            echo "<td width='20%'>" .number_format($row['p_price'],2) ."</td>";
                            echo "<td>$p_qty</td>";
                            echo "<td width='10%'>".number_format($sum,2)."</td>";
                            echo "</tr>";
                            }
                            echo "<tr>";
                                echo "<td colspan='4' align='right'>ราคาสุทธิ</td>";
                                echo "<td>".number_format($net,2)."</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td colspan='4' align='right'>ภาษี</td>";
                                echo "<td>".number_format($vat,2)."</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td colspan='4' align='right'>ราคารวม</td>";
                                echo "<td>".number_format($total,2)."</td>";
                            echo "</tr>";
                        ?>
                            
                            
                        </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                    <?php
                        session_start();
                        include("condb.php");
                        $ccon = "SELECT * FROM ecu_member WHERE c_id = '".$_SESSION['UserID']."'";
                        $objQuery = mysqli_query($con,$ccon);
                        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
                    ?>
                    <form  name="formlogin" action="saveorder.php" method="POST" id="login" class="form-horizontal">
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $objResult["c_name"] ?>"  placeholder="ชื่อ-สกุล" required>
                        </div>
                        <div class="form-group">
                            <label>ที่อยู่  </label>
                            <textarea class="form-control" rows="3" name="address" placeholder="ที่อยู่ในการส่งสินค้า" required><?php echo $objResult["c_address"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทร</label>
                            <input type="text" class="form-control" name="phone" required placeholder="เบอร์โทรศัพท์">
                        </div>
                        <div class="form-group">
                            <label>อีเมล</label>
                            <input type="email" class="form-control" name="email"  required placeholder="อีเมล์">
                        </div>
                        <button type="submit" name="Submit2" class="btn btn-block cart_submit"><i class="fas fa-shopping-cart"></i> สั่งชื้อ</button>
                    </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>