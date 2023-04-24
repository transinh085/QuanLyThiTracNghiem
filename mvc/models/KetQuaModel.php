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
        $solanchuyentab = $this->getChangeTab($made, $manguoidung)['solanchuyentab'];
        $sql = "UPDATE `ketqua` SET `solanchuyentab`='$solanchuyentab' WHERE `made`='$made' AND `manguoidung`='$manguoidung'";
        $valid = true;
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function getChangeTab($made, $manguoidung) {
        $sql = "SELECT `solanchuyentab` FROM `ketqua` WHERE `made`='$made' AND `manguoidung`='$manguoidung'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function getMaKQ($made, $manguoidung)
    {
        $sql = "SELECT * FROM `ketqua` WHERE `made` = '$made' AND `manguoidung` = '$manguoidung'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function socaudung($listCauTraLoi){
        $socaudung = 0;
        foreach($listCauTraLoi as $tl){
            $macauhoi = $tl['macauhoi'];
            $cautraloi = $tl['cautraloi'];
            $sql = "SELECT * FROM cautraloi ctl WHERE ctl.macauhoi = '$macauhoi' AND ctl.macautl = '$cautraloi' AND ctl.ladapan = 1";
            $result = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($result)>0) $socaudung++;
        }
        return $socaudung;
    }

    public function submit($made,$nguoidung,$list,$thoigian,$slct){
        $sql_ketqua = "Select * from ketqua where made = '$made' and manguoidung = '$nguoidung'";
        $result_ketqua = mysqli_query($this->con,$sql_ketqua);
        $data = mysqli_fetch_assoc($result_ketqua);
        $thoigianvaolam = strtotime($data['thoigianvaothi']);
        $thoigianlambai = strtotime($thoigian) - $thoigianvaolam;
        $valid = true;
        $socaudung = $this->socaudung($list);
        $socau = count($list);
        $diem = round((10/$socau * $socaudung),2);
        $sql = "UPDATE `ketqua` SET `diemthi`='$diem',`thoigianlambai`='$thoigianlambai',`socaudung`='$socaudung',`solanchuyentab`='$slct' WHERE manguoidung = '$nguoidung' and made = '$made'";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $valid = false;
        $makq = $data['makq'];
        foreach($list as $ct){
            $macauhoi = $ct['macauhoi'];
            $cautraloi = $ct['cautraloi'];
            $sql = "UPDATE `chitietketqua` SET `dapanchon`='$cautraloi' WHERE `makq`='$makq' AND `macauhoi`='$macauhoi'";
            $insertCt = mysqli_query($this->con,$sql);
            if(!$insertCt) $valid = false;
        }
        return $valid;
    }

    public function tookTheExam($made){
        $sql = "select * from ketqua kq join nguoidung nd on kq.manguoidung = nd.id where kq.made = '$made'";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getExamineeByGroup($made, $manhom) {
        $sql = "SELECT KQ.*, email, hoten, avatar FROM ketqua KQ, nguoidung ND, chitietnhom CTN WHERE KQ.manguoidung = ND.id AND CTN.manguoidung = ND.id AND KQ.made = $made AND CTN.manhom = $manhom";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getQuerySortByName($filter, $input, $args, $order) {
        if (isset($filter) && $filter == "absent") {
            $query = "SELECT CTN.manguoidung, email, hoten, SUBSTRING_INDEX(hoten, ' ', -1) AS firstname, avatar FROM chitietnhom CTN, nguoidung ND WHERE CTN.manguoidung = ND.id AND CTN.manguoidung IN (SELECT manguoidung FROM `chitietnhom` where manhom = ".$args['manhom'].") AND CTN.manguoidung NOT IN (SELECT KQ1.manguoidung FROM ketqua KQ1, nguoidung ND1, chitietnhom CTN1 WHERE KQ1.manguoidung = ND1.id AND CTN1.manguoidung = ND1.id AND KQ1.made = ".$args['made']." AND CTN1.manhom = ".$args['manhom'].")";
        } else {
            $query = "SELECT KQ.*, email, hoten, SUBSTRING_INDEX(hoten, ' ', -1) AS firstname, avatar FROM ketqua KQ, nguoidung ND, chitietnhom CTN WHERE KQ.manguoidung = ND.id AND CTN.manguoidung = ND.id AND KQ.made = ".$args['made']." AND CTN.manhom = ".$args['manhom'];
            if (isset($filter) && $filter == "interrupted") {
                $query .= " AND ISNULL(diemthi)";
            } else {
                $query .= " AND diemthi IS NOT NULL";
            }
        }
        if ($input) {
            $query = $query . " AND (ND.hoten LIKE N'%${input}%' OR ND.id LIKE '%${input}%')";
        }
        $query = $query . " ORDER BY firstname $order";
        return $query;
    }

    public function getListAbsentFromTest($filter, $input, $args) {
        $query = "SELECT CTN.manguoidung, email, hoten, avatar FROM chitietnhom CTN, nguoidung ND WHERE CTN.manguoidung = ND.id AND CTN.manguoidung IN (SELECT manguoidung FROM `chitietnhom` where manhom = ".$args['manhom'].") AND CTN.manguoidung NOT IN (SELECT KQ1.manguoidung FROM ketqua KQ1, nguoidung ND1, chitietnhom CTN1 WHERE KQ1.manguoidung = ND1.id AND CTN1.manguoidung = ND1.id AND KQ1.made = ".$args['made']." AND CTN1.manhom = ".$args['manhom'].")";
        return $query;
    }

    // Lấy thông tin đề thi, kết quả của sinh viên để xuất file PDF
    public function getInfoPrintPdf($makq)
    {
        $sql = "SELECT DISTINCT ketqua.made, tende, tenmonhoc, mamonhoc, thoigianthi, manguoidung, hoten, socaudung,(socaude + socautb + socaukho) AS tongsocauhoi , diemthi
        FROM chitietketqua, ketqua, dethi, monhoc, nguoidung
        WHERE chitietketqua.makq = '$makq' AND chitietketqua.makq = ketqua.makq AND ketqua.manguoidung = nguoidung.id AND ketqua.made = dethi.made AND dethi.monthi = monhoc.mamonhoc";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    // Lấy điểm để thống kê 
    public function getStatictical($made, $manhom)
    {
        $sql = "SELECT DISTINCT chitietnhom.manguoidung,ketqua.manguoidung AS mandkq,makq,ketqua.made, diemthi
        FROM chitietnhom LEFT JOIN ketqua ON ketqua.manguoidung = chitietnhom.manguoidung AND ketqua.made = '$made'
        WHERE manhom = '$manhom'";
        $result = mysqli_query($this->con, $sql);
        $diemthi = array_fill(0, 10, 0);
        $tongdiem = 0;
        $soluong = 0;
        $max = 0;
        $chuanop = 0;
        $khongthi = 0;
        while($row = mysqli_fetch_assoc($result)){
            if($row['diemthi'] != null) {
                $tongdiem += $row['diemthi'];
                $soluong++;
                $diemthi[ceil($row['diemthi']) - 1]++;
                if($row['diemthi'] > $max) $max = $row['diemthi'];
            } else {
                if($row['mandkq'] != null) $chuanop++;
                else $khongthi++; 
            }
        }
        $rs = array(
            "diem_trung_binh" => $tongdiem/$soluong,
            "da_nop_bai" => $soluong,
            "chua_nop_bai" => $chuanop,
            "khong_thi" => $khongthi,
            "diem_cao_nhat" => $max,
            "thong_ke_diem" => $diemthi
        );
        return $rs;
    }
    
    // Tìm kiếm & phân trang & sắp xếp
    public function getQuery($filter, $input, $args) {
        if (isset($filter) && $filter == "absent") {
            $query = $this->getListAbsentFromTest($filter, $input, $args);
        } else {
            $query = "SELECT KQ.*, email, hoten, avatar FROM ketqua KQ, nguoidung ND, chitietnhom CTN WHERE KQ.manguoidung = ND.id AND CTN.manguoidung = ND.id AND KQ.made = ".$args['made']." AND CTN.manhom = ".$args['manhom'];
            if (isset($filter) && $filter == "interrupted") {
                $query .= " AND ISNULL(diemthi)";
            } else {
                $query .= " AND diemthi IS NOT NULL";
            }
        }
        if ($input) {
            $query = $query . " AND (ND.hoten LIKE N'%${input}%' OR ND.id LIKE '%${input}%')";
        }
        if (isset($args["custom"]["function"])) {
            $function = $args["custom"]["function"];
            switch ($function) {
                case "sort":
                    $column = $args["custom"]["column"];
                    $order = $args["custom"]["order"];
                    switch ($column) {
                        case "manguoidung":
                        case "diemthi":
                        case "thoigianvaothi":
                        case "thoigianlambai":
                        case "solanchuyentab":
                            $query = $query . " ORDER BY $column $order";
                            break;
                        case "hoten":
                            $query = $this->getQuerySortByName($filter, $input, $args, $order);
                            break;
                        default:
                    }
                    break;
                default:
            }
        } else {
            $query = $query . " ORDER BY id ASC";
        }
        return $query;
    }
}
