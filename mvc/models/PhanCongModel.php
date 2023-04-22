<?php
class PhanCongModel extends DB{

    public function getGiangVien(){
        $sql = "SELECT ng.id,ng.manhomquyen,ng.hoten FROM nguoidung ng join chitietquyen ctq on ng.manhomquyen = ctq.manhomquyen where ctq.chucnang = 'cauhoi' OR ctq.chucnang = 'monhoc' OR ctq.chucnang='hocphan' OR ctq.chucnang = 'chuong' GROUP BY ng.id";
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

    public function delete($mamon,$id){
        $sql = "DELETE FROM `phancong` WHERE mamonhoc = '$mamon' and manguoidung = '$id'";
        $result = mysqli_query($this->con,$sql);
        return $result;
    }

    public function deleteAll($id){
        $sql = "DELETE FROM `phancong` WHERE manguoidung = '$id'";
        $result = mysqli_query($this->con,$sql);
        return $result;
    }

    public function getAssignmentByUser($user){
        $sql = "SELECT * FROM `phancong` where manguoidung = '$user'";
        $result = mysqli_query($this->con,$sql);
        $row = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
}
?>