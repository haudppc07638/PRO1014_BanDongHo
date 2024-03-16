<?
function cart_insert($id_pro, $price, $name, $img, $soluong, $thanhtien, $id_bill)
{
    $db = new connect();
    $query = "INSERT INTO cart (id_pro, price, name, img,soluong, thanhtien, id_bill) 
              values ('$id_pro','$price','$name','$img','$soluong','$thanhtien','$id_bill')";
    $result = $db->pdo_execute($query);
    return $result;
}
function viewcart1()
{
    $html_cart1 = '';
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $tt = $price * $soluong;
        $i = 1;
        $html_cart1 .= '
        <tr>
        <td>'.$i.'</td>
        <td class="product-thumbnail"><a href="#"><img src="images/' . $img . '"alt="product img" /></a></td>
        <td class="product-name"><a href="">' . $name . '</a></td>
        <td><ul class="pro__prize"><li>' . number_format($price) . ' VND</li></ul></td>
        <td class="product-quantity"><ul class="pro__prize"><li>'.$soluong.'</li></ul></td>
        <td class="product-price"><span class="amount">' . number_format($tt) . ' VND</span></td>
        <td class="product-remove"><a href="#"><i class="icon-trash icons"></i></a></td>
        </tr>';
        $i++;
    }
    return $html_cart1;
}
function get_tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $tt = $price * $soluong;
        $tong += $tt;
    }
    return $tong;
}
