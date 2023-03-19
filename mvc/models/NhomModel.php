<?php
class NhomModel extends DB{
    public function create($tennhom, $ghichu, $namhoc, $hocky, $giangvien, $mamonhoc)
    {
        $valid = true;
        $sql = "INSERT INTO `nhom`(`tennhom`, `ghichu`, `namhoc`, `hocky`, `giangvien`, `mamonhoc`) VALUES ('$tennhom','$ghichu','$namhoc','$hocky','$giangvien','$mamonhoc')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function update($manhom, $tennhom, $ghichu, $namhoc, $hocky, $mamonhoc)
    {
        $valid = true;
        $sql = "UPDATE `nhom` SET `tennhom`='$tennhom',`ghichu`='$ghichu',`namhoc`='$namhoc',`hocky`='$hocky',`mamonhoc`='$mamonhoc' WHERE `manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete($manhom)
    {
        $valid = true;
        $sql = "UPDATE `nhom` SET `trangthai`='0' WHERE `manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function hide($manhom, $giatri)
    {
        $valid = true;
        $sql = "UPDATE `nhom` SET `hienthi`=' $giatri' WHERE `manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `nhom` WHERE trangthai = 1";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($manhom)
    {
        $sql = "SELECT * FROM `nhom` WHERE `manhom` = $manhom";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function getBySubject($hienthi)
    {
        $sht = $hienthi == 2 ? "" : "AND nhom.hienthi = $hienthi";
        $sql = "SELECT monhoc.mamonhoc, monhoc.tenmonhoc, nhom.namhoc, nhom.hocky, nhom.manhom, nhom.tennhom, nhom.ghichu, nhom.siso, nhom.hienthi
        FROM nhom, monhoc
        WHERE nhom.mamonhoc = monhoc.mamonhoc AND nhom.giangvien = 1 AND nhom.trangthai = 1 $sht";
        $result = mysqli_query($this->con, $sql);
        $final_result = array();
        while($row = mysqli_fetch_assoc($result)) {
            $index = array_search($row['mamonhoc'], array_column($final_result, 'mamonhoc'));
            if ($index === false) {
                $temp = array(
                    'mamonhoc' => $row['mamonhoc'],
                    'tenmonhoc' => $row['tenmonhoc'],
                    'namhoc' => $row['namhoc'],
                    'hocky' => $row['hocky'],
                    'nhom' => array(
                        array(
                            'manhom' => $row['manhom'],
                            'tennhom' => $row['tennhom'],
                            'ghichu' => $row['ghichu'],
                            'siso' => $row['siso'],
                            'hienthi' => $row['hienthi']
                        )
                    )
                );
                array_push($final_result, $temp);
            } else {
                $temp = array(
                    'manhom' => $row['manhom'],
                    'tennhom' => $row['tennhom'],
                    'ghichu' => $row['ghichu'],
                    'siso' => $row['siso'],
                    'hienthi' => $row['hienthi']
                );
                array_push($final_result[$index]['nhom'], $temp);
            }
        }
        return $final_result;
    }
}
?>