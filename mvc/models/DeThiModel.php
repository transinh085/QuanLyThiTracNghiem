<?php
class DeThiModel extends DB
{
    public function create($monthi, $nguoitao, $tende, $thoigianthi, $thoigianbatdau, $thoigianketthuc, $hienthibailam, $xemdiemthi, $xemdapan, $troncauhoi, $trondapan, $nopbaichuyentab, $loaide, $socaude, $socautb, $socaukho, $chuong, $nhom)
    {
        $sql = "INSERT INTO `dethi`(`monthi`, `nguoitao`, `tende`, `thoigianthi`, `thoigianbatdau`, `thoigianketthuc`, `hienthibailam`, `xemdiemthi`, `xemdapan`, `troncauhoi`, `trondapan`, `nopbaichuyentab`, `loaide`, `socaude`, `socautb`, `socaukho`) VALUES ('$monthi','$nguoitao','$tende','$thoigianthi','$thoigianbatdau','$thoigianketthuc','$hienthibailam','$xemdiemthi','$xemdapan','$troncauhoi','$trondapan','$nopbaichuyentab','$loaide','$socaude','$socautb','$socaukho')";
        $result = mysqli_query($this->con, $sql);
        if ($result) {
            $madethi = mysqli_insert_id($this->con);
            $result = $this->create_dethi_auto($madethi, $monthi, $chuong, $socaude, $socautb, $socaukho);
            // Một đề thi giao cho nhiều nhóm
            $result = $this->create_giaodethi($madethi, $nhom);
            // Một đề thi thì có nhiều chương
            $result = $this->create_chuongdethi($madethi,$chuong);
            return $madethi;
        } else return false;
    }

    // Đầu vào như này là đéo ổn 
    public function create_dethi_auto($made, $monhoc, $chuong, $socaude, $socautb, $socaukho)
    {
        $valid = true;
        $sql_caude = "SELECT * FROM cauhoi ch join monhoc mh on ch.mamonhoc = mh.mamonhoc where ch.mamonhoc = $monhoc and ch.dokho = 1 and ";
        $sql_cautb = "SELECT * FROM cauhoi ch join monhoc mh on ch.mamonhoc = mh.mamonhoc where ch.mamonhoc = $monhoc and ch.dokho = 2 and ";
        $sql_caukho = "SELECT * FROM cauhoi ch join monhoc mh on ch.mamonhoc = mh.mamonhoc where ch.mamonhoc = $monhoc and ch.dokho = 3 and ";
        $countChuong = count($chuong)-1;
        $detailChuong = "(";
        $i = 0;
        while ($i < $countChuong) {
            $detailChuong.="ch.machuong='$chuong[$i]' or ";
            $i++;
        }
        $detailChuong.="ch.machuong=$chuong[$countChuong])";

        $sql_caude = $sql_caude.$detailChuong." order by rand() limit $socaude";
        $sql_cautb = $sql_cautb.$detailChuong." order by rand() limit $socautb";
        $sql_caukho = $sql_caukho.$detailChuong." order by rand() limit $socaukho";
        
        $result_cd = mysqli_query($this->con,$sql_caude);
        $result_tb = mysqli_query($this->con,$sql_cautb);
        $result_ck = mysqli_query($this->con,$sql_caukho);

        $data_cd = array();

        while ($row = mysqli_fetch_assoc($result_cd)) {
            $data_cd[] = $row;
        }
        while ($row = mysqli_fetch_assoc($result_tb)) {
            $data_cd[] = $row;
        }
        while ($row = mysqli_fetch_assoc($result_ck)) {
            $data_cd[] = $row;
        }
        shuffle($data_cd);
        return $data_cd;
    }

    public function create_chuongdethi($made, $chuong)
    {
        $valid = true;
        foreach ($chuong as $machuong) {
            $sql = "INSERT INTO `dethitudong`(`made`, `machuong`) VALUES ('$made','$machuong')";
            $result = mysqli_query($this->con, $sql);
            if (!$result) $valid = false;
        }
        return $valid;
    }

    public function update_chuongdethi($made, $chuong)
    {
        $valid = true;
        $sql = "DELETE FROM `dethitudong` WHERE `made`='$made'";
        $result_del = mysqli_query($this->con, $sql);
        if ($result_del) $result_update = $this->create_chuongdethi($made, $chuong);
        else $valid = false;
        return $valid;
    }

    public function create_giaodethi($made, $nhom)
    {
        $valid = true;
        foreach ($nhom as $manhom) {
            $sql = "INSERT INTO `giaodethi`(`made`, `manhom`) VALUES ('$made','$manhom')";
            $result = mysqli_query($this->con, $sql);
            if (!$result) $valid = false;
        }
        return $valid;
    }

    public function update_giaodethi($made, $nhom)
    {
        $valid = true;
        $sql = "DELETE FROM `giaodethi` WHERE `made`='$made'";
        $result_del = mysqli_query($this->con, $sql);
        if ($result_del) $result_update = $this->create_giaodethi($made, $nhom);
        else $valid = false;
        return $valid;
    }

    public function update($made, $monthi, $tende, $thoigianthi, $thoigianbatdau, $thoigianketthuc, $hienthibailam, $xemdiemthi, $xemdapan, $troncauhoi, $trondapan, $nopbaichuyentab, $loaide, $socaude, $socautb, $socaukho, $chuong, $nhom)
    {
        $valid = true;
        $sql = "UPDATE `dethi` SET `monthi`='$monthi',`tende`='$tende',`thoigianthi`='$thoigianthi',`thoigianbatdau`='$thoigianbatdau',`thoigianketthuc`='$thoigianketthuc',`hienthibailam`='$hienthibailam',`xemdiemthi`='$xemdiemthi',`xemdapan`='$xemdapan',`troncauhoi`='$troncauhoi',`trondapan`='$trondapan',`nopbaichuyentab`='$nopbaichuyentab',`loaide`='$loaide',`socaude`='$socaude',`socautb`='$socautb',`socaukho`='$socaukho' WHERE `made`='$made'";
        $result = mysqli_query($this->con, $sql);
        if ($result) {
            // Một đề thi giao cho nhiều nhóm
            $result = $this->update_giaodethi($made, $nhom);
            // Một đề thi thì có nhiều chương
            $result = $this->update_chuongdethi($made, $chuong);
        } else $valid = false;
        return $valid;
    }

    public function delete($madethi)
    {
        $valid = true;
        $sql = "UPDATE `dethi` `trangthai`= 0 WHERE `madethi` = $madethi";
        $result = mysqli_query($this->con, $sql);
        if (!$result) $valid = false;
        return $valid;
    }

    // Lấy đề thi mà người dùng tạo
    public function getAll($nguoitao)
    {
        $sql = "SELECT dethi.made, tende, monhoc.tenmonhoc, thoigianbatdau, thoigianketthuc, nhom.tennhom, namhoc, hocky
        FROM dethi, monhoc, giaodethi, nhom
        WHERE dethi.monthi = monhoc.mamonhoc AND dethi.made = giaodethi.made AND nhom.manhom = giaodethi.manhom AND nguoitao = $nguoitao
        ORDER BY dethi.made DESC";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $made = $row['made'];
            $index = array_search($made, array_column($rows, 'made'));
            if ($index === false) {
                $item = [
                    "made" => $made,
                    "tende" => $row['tende'],
                    "thoigianbatdau" => date_format(date_create($row['thoigianbatdau']), "H:i d/m/Y"),
                    "thoigianketthuc" => date_format(date_create($row['thoigianketthuc']), "H:i d/m/Y"),
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

    // Lấy chi tiết đề thi
    public function getById($made)
    {
        $sql_dethi = "SELECT dethi.*, monhoc.tenmonhoc FROM dethi, monhoc WHERE made = $made AND dethi.monthi = monhoc.mamonhoc";
        $result_dethi = mysqli_query($this->con, $sql_dethi);
        $dethi = mysqli_fetch_assoc($result_dethi);
        if($dethi != null) {
            $sql_giaodethi = "SELECT manhom FROM giaodethi WHERE made = $made";
            $sql_dethitudong = "SELECT machuong FROM dethitudong WHERE made = $made";
            $result_giaodethi = mysqli_query($this->con, $sql_giaodethi);
            $result_dethitudong = mysqli_query($this->con, $sql_dethitudong);
            $dethi['chuong'] = array();
            while($row = mysqli_fetch_assoc($result_dethitudong)) {
                $dethi['chuong'][] = $row['machuong'];
            }
            $dethi['nhom'] = array();
            while($row = mysqli_fetch_assoc($result_giaodethi)) {
                $dethi['nhom'][] = $row['manhom'];
            }
        }
        return $dethi;
    }

    // Lấy thông tin cơ bản của đề thi ()
    public function getInfoTestBasic($made)
    {
        $sql_dethi = "SELECT dethi.made, dethi.tende, dethi.thoigiantao,dethi.loaide, monhoc.mamonhoc, monhoc.tenmonhoc FROM dethi, monhoc WHERE made = $made AND dethi.monthi = monhoc.mamonhoc";
        $result_dethi = mysqli_query($this->con, $sql_dethi);
        $dethi = mysqli_fetch_assoc($result_dethi);
        if($dethi != null) {
            $sql_giaodethi = "SELECT giaodethi.manhom, nhom.tennhom FROM giaodethi, nhom WHERE made = $made AND giaodethi.manhom = nhom.manhom";
            $result_giaodethi = mysqli_query($this->con, $sql_giaodethi);
            $dethi['nhom'] = array();
            while($row = mysqli_fetch_assoc($result_giaodethi)) {
                $dethi['nhom'][] = $row;
            }
        }
        return $dethi;
    }

    // Lấy đề thi của nhóm học phần
    public function getListTestGroup($manhom)
    {
        $sql = "SELECT dethi.made, dethi.tende, dethi.thoigianbatdau, dethi.thoigianketthuc
        FROM giaodethi, dethi
        WHERE manhom = '$manhom' AND giaodethi.made = dethi.made ORDER BY dethi.made DESC";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $row['thoigianbatdau'] = date_format(date_create($row['thoigianbatdau']), "H:i d/m/Y");
            $row['thoigianketthuc'] = date_format(date_create($row['thoigianketthuc']), "H:i d/m/Y");
            $rows[] = $row;
        }
        return $rows;
    }

    // Lấy câu hỏi của đề thi
    public function getQuestionOfTest($made)
    {
        $sql = "SELECT cauhoi.macauhoi,cauhoi.noidung FROM chitietdethi, cauhoi WHERE made= '$made' AND chitietdethi.macauhoi = cauhoi.macauhoi";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $row['cautraloi'] = array();
            $macauhoi = $row['macauhoi'];
            $sql = "SELECT macautl,noidungtl FROM `cautraloi` WHERE `macauhoi` = '$macauhoi'";
            $result_ctl = mysqli_query($this->con,$sql);
            while($row_ctl = mysqli_fetch_assoc($result_ctl)) {
                $row['cautraloi'][] = $row_ctl;
            }
            $rows[] = $row;
        }
        return $rows;
    }

    public function getTimeTest($dethi){
        $sql = "Select thoigianthi from dethi where made = '$dethi'";
        $result = mysqli_query($this->con,$sql);
        if($result){
            $data = mysqli_fetch_assoc($result);
            return $data['thoigianthi'];
        }
        return false;
    }
}
