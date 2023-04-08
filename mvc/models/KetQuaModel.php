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

    public function end($made, $manguoidung, $diemthi, $thoigianlambai, $socaudung)
    {
        $sql = "UPDATE `ketqua` SET `diemthi`='$diemthi',`thoigianlambai`='$thoigianlambai',`socaudung`='$socaudung' WHERE `made`='$made' AND `manguoidung`='$manguoidung'";
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
            $sql = "INSERT INTO `chitietketqua`(`makq`, `macauhoi`, `dapanchon`) VALUES ('$makq','$macauhoi','$cautraloi')";
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
        $sql = "SELECT * FROM ketqua KQ, nguoidung ND, chitietnhom CTN WHERE KQ.manguoidung = ND.id AND CTN.manguoidung = ND.id AND KQ.made = $made AND CTN.manhom = $manhom";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
}
?>