<?php
class KetQuaModel extends DB{
    public function start($made, $manguoidung)
    {
        $valid = true;
        $sql = "INSERT INTO `ketqua`(`made`, `manguoidung`) VALUES ('$made','$manguoidung')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function updateChangeTab($made, $manguoidung)
    {
        # code...
    }

    public function end($made, $manguoidung, $diemthi, $thoigianlambai, $socaudung)
    {
        $sql = "UPDATE `ketqua` SET `diemthi`='$diemthi',`thoigianlambai`='$thoigianlambai',`socaudung`='$socaudung' WHERE `made`='$made' AND `manguoidung`='$manguoidung',";
    }

    public function getMaKQ($made, $manguoidung)
    {
        $sql = "SELECT `makq` FROM `ketqua` WHERE `made` = '$made' AND `manguoidung` = '$manguoidung'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
}
?>