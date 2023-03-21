<?php

class DeThiModel extends DB{

    public function create($monthi, $nguoitao, $tende, $thoigianthi, $thoigianbatdau, $thoigianketthuc, $hienthibailam, $xemdiemthi, $xemdapan, $troncauhoi, $trondapan, $nopbaichuyentab, $loaide, $socaude, $socautb, $socaukho, $chuong, $nhom)
    {
        $valid = true;
        $sql = "INSERT INTO `dethi`(`monthi`, `nguoitao`, `tende`, `thoigianthi`, `thoigianbatdau`, `thoigianketthuc`, `hienthibailam`, `xemdiemthi`, `xemdapan`, `troncauhoi`, `trondapan`, `nopbaichuyentab`, `loaide`, `socaude`, `socautb`, `socaukho`) VALUES ('$monthi','$nguoitao','$tende','$thoigianthi','$thoigianbatdau','$thoigianketthuc','$hienthibailam','$xemdiemthi','$xemdapan','$troncauhoi','$trondapan','$nopbaichuyentab','$loaide','$socaude','$socautb','$socaukho')";
        $result = mysqli_query($this->con, $sql);
        if($result) {
            $madethi = mysqli_insert_id($this->con);
            // Một đề thi giao cho nhiều nhóm
            foreach ($nhom as $manhom) {
                $result = $this->create_giaodethi($madethi,$manhom);
                if(!$result) {
                    $valid = false;
                    break;
                }
            }
            // Một đề thi thì có nhiều chương
            foreach ($chuong as $machuong) {
                $result = $this->create_chuongdethi($madethi,$machuong);
                if(!$result) {
                    $valid = false;
                    break;
                }
            }
        } else $valid = false;
        return $valid;
    }

    public function create_chuongdethi($made, $machuong)
    {
        $valid = true;
        $sql = "INSERT INTO `dethitudong`(`made`, `machuong`) VALUES ('$made','$machuong')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete_chuongdethi($made, $machuong)
    {
        $valid = true;
        $sql = "DELETE FROM `dethitudong` WHERE `made`='$made',`machuong`='$machuong'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function create_giaodethi($made,$manhom)
    {
        $valid = true;
        $sql = "INSERT INTO `giaodethi`(`made`, `manhom`) VALUES ('$made','$manhom')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete_giaodethi($made, $manhom) {
        $valid = true;
        $sql = "DELETE FROM `giaodethi` WHERE `made`='$made',`manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function update()
    {
        
    }

    public function delete($madethi)
    {
        $valid = true;
        $sql = "UPDATE `dethi` `trangthai`= 0 WHERE `madethi` = $madethi";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }
}

?>