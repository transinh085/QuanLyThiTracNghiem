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
            $result = $this->create_giaodethi($madethi,$nhom);
            // Một đề thi thì có nhiều chương
            $result = $this->create_chuongdethi($madethi,$chuong);
        } else $valid = false;
        return $valid;
    }

    public function create_chuongdethi($made, $chuong)
    {
        $valid = true;
        foreach ($chuong as $machuong) {
            $sql = "INSERT INTO `dethitudong`(`made`, `machuong`) VALUES ('$made','$machuong')";
            $result = mysqli_query($this->con, $sql);
            if(!$result) $valid = false;
        }
        return $valid;
    }

    public function update_chuongdethi($made, $chuong) {
        $valid = true;
        $sql = "DELETE FROM `dethitudong` WHERE `made`='$made'";
        $result_del = mysqli_query($this->con, $sql);
        if($result_del) $result_update = $this->create_chuongdethi($made, $chuong);
        else $valid = false;
        return $valid;
    }

    public function create_giaodethi($made,$nhom)
    {
        $valid = true;
        foreach ($nhom as $manhom) {
            $sql = "INSERT INTO `giaodethi`(`made`, `manhom`) VALUES ('$made','$manhom')";
            $result = mysqli_query($this->con, $sql);
            if(!$result) $valid = false;
        }
        return $valid;
    }

    public function update_giaodethi($made,$nhom)
    {
        $valid = true;
        $sql = "DELETE FROM `giaodethi` WHERE `made`='$made'";
        $result_del = mysqli_query($this->con, $sql);
        if($result_del) $result_update = $this->create_giaodethi($made, $nhom);
        else $valid = false;
        return $valid;
    }

    public function update($made, $monthi, $tende, $thoigianthi, $thoigianbatdau, $thoigianketthuc, $hienthibailam, $xemdiemthi, $xemdapan, $troncauhoi, $trondapan, $nopbaichuyentab, $loaide, $socaude, $socautb, $socaukho, $chuong, $nhom)
    {
        $valid = true;
        $sql = "UPDATE `dethi` SET `monthi`='$monthi',`tende`='$tende',`thoigianthi`='$thoigianthi',`thoigianbatdau`='$thoigianbatdau',`thoigianketthuc`='$thoigianketthuc',`hienthibailam`='$hienthibailam',`xemdiemthi`='$xemdiemthi',`xemdapan`='$xemdapan',`troncauhoi`='$troncauhoi',`trondapan`='$trondapan',`nopbaichuyentab`='$nopbaichuyentab',`loaide`='$loaide',`socaude`='$socaude',`socautb`='$socautb',`socaukho`='$socaukho' WHERE `made`='$made'";
        $result = mysqli_query($this->con, $sql);
        if($result) {
            // Một đề thi giao cho nhiều nhóm
            $result = $this->update_giaodethi($made,$nhom);
            // Một đề thi thì có nhiều chương
            $result = $this->update_chuongdethi($made,$chuong);
        } else $valid = false;
        return $valid;
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

    public function getListTestGroup($manhom)
    {
        $sql = "SELECT dethi.made, dethi.tende, dethi.thoigianbatdau, dethi.thoigianketthuc
        FROM giaodethi, dethi
        WHERE manhom = '$manhom' AND giaodethi.made = dethi.made";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

?>