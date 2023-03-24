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

    public function getAll($nguoitao)
    {
        $sql = "SELECT dethi.made, tende, monhoc.tenmonhoc, thoigianbatdau, thoigianketthuc, nhom.tennhom, namhoc, hocky
        FROM dethi, monhoc, giaodethi, nhom
        WHERE dethi.monthi = monhoc.mamonhoc AND dethi.made = giaodethi.made AND nhom.manhom = giaodethi.manhom AND nguoitao = $nguoitao";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $made = $row['made'];
            $index = array_search($made, array_column($rows, 'made'));
            if($index === false) {
                $item = [
                    "made" => $made,
                    "tende" => $row['tende'],
                    "thoigianbatdau" => date_format(date_create($row['thoigianbatdau']),"H:i d/m/Y"),
                    "thoigianketthuc" => date_format(date_create($row['thoigianketthuc']),"H:i d/m/Y"),
                    "tenmonhoc" => $row['tenmonhoc'],
                    "namhoc" => $row['namhoc'],
                    "hocky" => $row['hocky'],
                    "nhom" => [$row['tennhom']]
                ];
                array_push($rows, $item);
            } else {
                array_push($rows[$index]["nhom"], $row['tennhom']);
            }
        }
        return $rows;
    }

    public function getById($made)
    {
        $sql_dethi = "SELECT * FROM dethi WHERE made = $made";
        $sql_giaodethi = "SELECT manhom FROM giaodethi WHERE made = $made";
        $sql_dethitudong = "SELECT machuong FROM dethitudong WHERE made = $made";
        $result_dethi = mysqli_query($this->con, $sql_dethi);
        $result_giaodethi = mysqli_query($this->con, $sql_giaodethi);
        $result_dethitudong = mysqli_query($this->con, $sql_dethitudong);
        $dethi = mysqli_fetch_assoc($result_dethi);

        $dethi['chuong'] = array();
        while($row = mysqli_fetch_assoc($result_dethitudong)) {
            $dethi['chuong'][] = $row['machuong'];
        }
        $dethi['nhom'] = array();
        while($row = mysqli_fetch_assoc($result_giaodethi)) {
            $dethi['nhom'][] = $row['manhom'];
        }
        return $dethi;
    }
}

?>