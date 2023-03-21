<?php
class NhomQuyenModel extends DB {
    public function create($tennhomquyen,$chitietquyen)
    {
        $valid = true;
        $sql = "INSERT INTO `nhomquyen`(`manhomquyen`, `tennhomquyen`) VALUES (NULL,'$tennhomquyen')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) {
            $valid = false;
        } else {
            $manhomquyen = mysqli_insert_id($this->con);
            foreach($chitietquyen as $ct) {
                $hanhdong = $ct['action'];
                $chucnang = $ct['name'];
                $sql = "INSERT INTO `chitietquyen`(`manhomquyen`, `chucnang`, `hanhdong`) VALUES ('$manhomquyen','$chucnang','$hanhdong')";
                $result = mysqli_query($this->con, $sql);
                if(!$result) return false;
            }
        }
        return $valid;
    }

    public function update($manhomquyen,$tennhomquyen,$chitietquyen)
    {
        $valid = true;
        $sql = "UPDATE `nhomquyen` SET `tennhomquyen`='$tennhomquyen' WHERE `manhomquyen` = '$manhomquyen'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) {
            $valid = false;
        } else {
            $sql_del = "DELETE FROM `chitietquyen` WHERE `manhomquyen`= $manhomquyen";
            $result = mysqli_query($this->con, $sql_del);
            if($result) {
                foreach($chitietquyen as $ct) {
                    $hanhdong = $ct['action'];
                    $chucnang = $ct['name'];
                    $sql = "INSERT INTO `chitietquyen`(`manhomquyen`, `chucnang`, `hanhdong`) VALUES ('$manhomquyen','$chucnang','$hanhdong')";
                    $result = mysqli_query($this->con, $sql);
                    if(!$result) return false;
                }
            }
        }
        return $result;
    }

    public function getAll()
    { 
        $sql = "SELECT * FROM `nhomquyen`";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getAllSl()
    {
        $sql = "SELECT nhomquyen.manhomquyen, nhomquyen.tennhomquyen, COUNT(id) AS soluong FROM nhomquyen LEFT JOIN nguoidung ON nhomquyen.manhomquyen = nguoidung.manhomquyen
        GROUP BY nhomquyen.manhomquyen";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($manhomquyen)
    {
        $query_name = "SELECT tennhomquyen FROM nhomquyen WHERE manhomquyen = $manhomquyen";
        $query_detail = "SELECT chucnang,hanhdong FROM nhomquyen, chitietquyen WHERE nhomquyen.manhomquyen = chitietquyen.manhomquyen AND nhomquyen.manhomquyen = $manhomquyen";
        $result_name = mysqli_query($this->con,$query_name);
        $result_detail = mysqli_query($this->con,$query_detail);
        $result = array();
        $result['name'] = mysqli_fetch_assoc($result_name)['tennhomquyen'];
        $result['detail'] = array();
        while($row = mysqli_fetch_assoc($result_detail)) {
            $result['detail'][] = $row;
        }
        return $result;
    }
}
?>