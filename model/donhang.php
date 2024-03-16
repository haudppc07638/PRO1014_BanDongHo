<?
class donhang
{
    public function bill_insert_id($madh, $id_user, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_tel, $total, $ship, $voucher, $tongthanhtoan, $pttt)
    {
        $db = new connect();
        $query = "INSERT INTO bill(madh, id_user , nguoidat_ten, nguoidat_email, nguoidat_tel, nguoidat_diachi, nguoinhan_ten, nguoinhan_diachi, 
                                     nguoinhan_tel, total, ship, voucher, tongthanhtoan, pttt) 
                 values ('$madh', '$id_user', '$nguoidat_ten', '$nguoidat_email', '$nguoidat_tel', '$nguoidat_diachi', '$nguoinhan_ten', '$nguoinhan_diachi', '$nguoinhan_tel', '$total', '$ship', '$voucher', '$tongthanhtoan', '$pttt')";
        $result = $db->pdo_execute_id($query);
        return $result;
    }
}

?>