<?php
class PhanCongModel extends DB{

    public function getGiangVien(){
        $sql = "SELECT ng.id,nq.manhomquyen,ng.hoten FROM nhomquyen AS nq,nguoidung AS ng WHERE nq.manhomquyen = ng.manhomquyen  AND nq.tennhomquyen='Giảng Viên'";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getMonHoc(){
        $sql = "SELECT * FROM `monhoc`";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function addAssignment($giangvien,$listSubject){
        $check = true;
        foreach($listSubject as $subject){
            $mamonhoc = $subject['mamonhoc'];
            $sql = "INSERT INTO `phancong`(`mamonhoc`, `manguoidung`) VALUES ('$mamonhoc','$giangvien')";
            $result = mysqli_query($this->con,$sql);
            if($result){
            } else {
                $check = false;
            }
        }
        return $check;
    }

    public function getAssignment(){
        $sql = "SELECT pc.mamonhoc, pc.manguoidung, ng.hoten, mh.tenmonhoc FROM phancong as pc JOIN monhoc as mh on pc.mamonhoc=mh.mamonhoc JOIN nguoidung as ng on pc.manguoidung=ng.id";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
}
?>