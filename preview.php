<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once('condb.php');
$total=0;
$order_no =	$_REQUEST["order_id"] ;	
    $sql = "SELECT * FROM ecu_order 
    INNER JOIN ecu_order_detail
    ON ecu_order.order_id = ecu_order_detail.order_id
    INNER JOIN ecu_product
    ON ecu_order_detail.p_id = ecu_product.p_id
    WHERE ecu_order.order_id LIKE '%".$order_no."%'
    ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC"
    ;
    $query =mysqli_query($con, $sql);
    $sql2 = "SELECT * FROM ecu_order 
    INNER JOIN ecu_order_detail
    ON ecu_order.order_id = ecu_order_detail.order_id
    INNER JOIN ecu_product
    ON ecu_order_detail.p_id = ecu_product.p_id
    WHERE ecu_order.order_id LIKE '%".$order_no."%'
    ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC"
    ;
$query2 =mysqli_query($con, $sql2);
$row2 = mysqli_fetch_array($query2);
$mpdf = new \Mpdf\Mpdf();
$content = ' 
<style>
body {
font-family: "Garuda", sans-serif;
}
</style>';
if (mysqli_num_rows($query) > 0) {
    $i = 1;
while($row = mysqli_fetch_assoc($query)) {
    $data = $row['p_name'];
    $price = $row['p_price'];
    $quantity = $row['p_qty'];
    $sum	= $row['total'];
    $total	+= $sum;
    $content .= '<tr style="border:1px solid #000;">
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
                <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$data.'</td>
                <td style="border-right:1px solid #000;padding:3px;text-align:center;" >' .number_format($price,2) .'</td>        
                <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$quantity.'</td>    
                <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.number_format($sum,2) .'</td>     
 

			</tr>';
            $i++;
            
}
}
$sum	= $row['total'];
    $total	+= $sum;
    $net = $total*0.93;
    $vat = $total*0.07;
$test = '
<style>
	body{
		font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
	}
</style>
<tr style="border:1px solid #000;font-size:14pt;margin-top:8px;">
<td   style="border-right:1px solid #000;padding:4px;text-align:right;" colspan="4" >ราคาสุทธิ</td>
<td align="center">  '.number_format($net,2) .'</td>
</tr>
<tr style="border:1px solid #000;font-size:14pt;margin-top:8px;">
<td   style="border-right:1px solid #000;padding:4px;text-align:right;" colspan="4" >ภาษีมูลค่าเพิ่ม</td>
<td align="center">  '.number_format($vat,2) .'</td>
</tr>
<tr style="border:1px solid #000;font-size:14pt;margin-top:8px;">
<td   style="border-right:1px solid #000;padding:4px;text-align:right;" colspan="4" >ราคารวม</td>
<td align="center">  '.number_format($total,2) .'</td>
</tr>';

$nam = $row2[name];
$address = $row2[address];
$email = $row2[email];
$tel = $row2['phone'];
$date = $row2['order_date'];
$mpdf = new \Mpdf\Mpdf();

$head = '
<style>
	body{
		font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
	}
</style>

<h2 style="text-align:center">ใบรับสินค้า</h2>
<p align="center"><img src="https://www.ecu-shop.com/wp-content/uploads/2019/02/ecu-logo-alt.png" align="middle" style=" max-height: 50px; "></p>
<p align="center"> 530 หมู่ 4 ต. ท่าฉลอง อ.บางพลี สมุทรปาการ 10540 </p>
<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
<tr style="border:1px solid #000;padding:4px;">
<td  style="border-right:1px solid #000;padding:4px;text-align:center;" colspan="5"><b> ชื่อ :</b>'.$nam.'
&nbsp;&nbsp;&nbsp; <b>ที่อยู่ :</b> '.$address.'</td> <br>
    
</tr>
<tr style="border:1px solid #000;padding:4px;">
<td  style="border-right:1px solid #000;padding:4px;text-align:center;" colspan="5"><b> Email :</b>'.$email.'
&nbsp;&nbsp;&nbsp; <b>เบอร์โทร์ศัพท์ :</b> '.$tel.'&nbsp;&nbsp;&nbsp; </td>

</tr>
<tr style="border:1px solid #000;padding:4px;">
<td  style="border-right:1px solid #000;padding:4px;text-align:center;" colspan="5"><b> วันที่สั่งซื้อ :</b> '.$date.'</td>
</tr>
    <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ลำดับ</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="35%">ชื่อสินค้า</td>
        <td  width="20%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp;ราคาสินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">จำนวนชิ้น</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="20%">รวม</td>



        </tr>

        </thead>
            <tbody>';
            
        $end = "</tbody>
        </table>";
        
        $mpdf->WriteHTML($head);
        
        $mpdf->WriteHTML($content);
        $mpdf->WriteHTML($test);
        $mpdf->WriteHTML($end);
$mpdf->Output();


?>







