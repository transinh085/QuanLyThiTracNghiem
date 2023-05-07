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
        $sql = "INSERT INTO `phancong`(`mamonhoc`, `manguoidung`) VALUES ";
        foreach($listSubject as $key => $mamonhoc){
            $sql .= "('$mamonhoc','$giangvien')";
            if ($key != count($listSubject) - 1) {
                $sql .= ", ";
            }
        }
        $result = mysqli_query($this->con,$sql);
        if($result){
        } else {
            $check = false;
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
        // $sql = "SELECT * FROM `phancong` where manguoidung = '$user'";
        $sql = "SELECT mamonhoc FROM `phancong` where manguoidung = '$user'";
        $result = mysqli_query($this->con,$sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows == 0) {
            return [];
        }
        $row = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getQuery($filter, $input, $args) {
        if (isset($args["custom"]["function"])) {
            $func = $args["custom"]["function"];
            switch ($func) {
                case "monhoc":
                    $query = "SELECT * FROM `monhoc` WHERE trangthai = 1";
                    if ($input) {
                        $query .= " AND (monhoc.tenmonhoc LIKE N'%${input}%' OR monhoc.mamonhoc LIKE '%${input}%')";
                    }
                    return $query;
                    break;
                default:
            }
        }
        $query = "SELECT pc.mamonhoc, pc.manguoidung, ng.hoten, mh.tenmonhoc FROM phancong as pc JOIN monhoc as mh on pc.mamonhoc=mh.mamonhoc JOIN nguoidung as ng on pc.manguoidung=ng.id";
        if ($input) {
            $query .= " AND (mh.tenmonhoc LIKE N'%${input}%' OR ng.hoten LIKE '%${input}%')";
        }
        return $query;
    }
}
?>