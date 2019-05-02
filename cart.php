<?php
// include('bg2.php');
    error_reporting( error_reporting() & ~E_NOTICE );
    session_start(); 
    $p_id = $_REQUEST['p_id']; 
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$p_id]))
		{
			$_SESSION['shopping_cart'][$p_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['shopping_cart'][$p_id]=$amount;
		}
	}
	
	if($act=='Cancel-Cart')
	{
		unset($_SESSION['shopping_cart']);	
	}
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
</head>
<style>
    body {
        font-family: 'Sarabun', sans-serif;
        background: #e6e7eb;
    }
.box_cart {
    width: 650px;
    margin: 0 auto;
    background-color: #FFFFFF;
    border: 1px solid #eee;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 8px rgba(214, 214, 214, 0.2);
    box-shadow: 0 1px 8px rgba(214, 214, 214, 0.2);
    padding: 10px 20px 10px 20px;
    margin-top:200px
}    
hr {
    display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0; 
}
.cart_zone {
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    padding: 10px
}

.btn {
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

.table td, .table th {
    vertical-align: initial!important;
}

.container_fix {
		width: 100%;
    margin: 0 auto;
		margin-top:10px
}

</style>
<body>
    <form action="?act=update" method="post">
    <div class="box_cart">
        <h3>ORDER</h3>
        <table class="table">
            <tbody>
            <?php
                    $total = 0;
                    if(!empty($_SESSION['shopping_cart']))
                        {
                        require_once('condb.php');
                            foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
                            {
                                $sql = "select * from ecu_product where p_id=$p_id";
                                $query = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_array($query))
                                {
                            $sql = "select * from ecu_product where p_id=$p_id";
                            $query = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($query);
                            $sum = $row['p_price'] * $p_qty;
														$total += $sum;
														$net = $total*0.93;
														$vat = $total*0.07;
                            @$i = $i + 1;
                            echo "<tr>";
                            echo '<td><img src="img/'.$row["p_img"].'" width="70" height="70"></td>';
                            echo "<td>".$row["p_name"]."</td>";
                            echo "<td width='15%'><input class='form-control' type='number' value='1'></td>";
                            echo "<td>".number_format($row["p_price"],2)." บาท</td>";
                            echo "<td><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-block'><i class='fas fa-trash-alt'></i> ลบ</button></td>";
                            echo "</tr>";
                        }
                    }
                            echo "<hr>";
                            echo "</tbody></table>";
                            echo '<div class="row" style="padding:10px">';
                            echo '<div class="col-9">';
                            echo 'ราคาสุทธิ <br>';
                            echo 'ภาษีมูลค่าเพิ่ม<br>';
                            echo 'ราคารวม';
                            echo '</div>';
                            echo '<div class="col-3">';
                            echo number_format($net,2).'<br>';
                            echo number_format($vat,2).'<br>';
                            echo "<h5><b>".number_format($total,2)."</b><br></h5>";
                            echo '</div>';
                            echo '</div>';
                    }
                ?> 
						<button type="button" name="Submit2" onclick="window.location='confirm.php';" class="btn btn-block cart_submit"><i class="fas fa-shopping-cart"></i> สั่งชื้อ</button>
						<div style="clear:both"></div>
						<div class="container_fix">
				<a href="test2.php" class="btn btn-dark"><i class="fas fa-caret-left"></i>  กลับไปเลือกสินค้าต่อ</a>
            <div class="float-right">
                        <button type="submit" class="btn btn-warning" name="button"><i class="fas fa-calculator"></i> คำนวนใหม่</button>        
						</div>
		</div>
		</div>
	
    </form>
</body>
</html>