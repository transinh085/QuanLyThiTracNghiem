<?php
class CauHoiModel extends DB{
    public function create($noidung, $dokho, $mamonhoc, $machuong, $nguoitao)
    {
        $sql = "INSERT INTO `cauhoi`(`noidung`, `dokho`, `mamonhoc`, `machuong`, `nguoitao`) VALUES ('$noidung','$dokho','$mamonhoc','$machuong','$nguoitao')";
        $result = mysqli_query($this->con, $sql);
        return $this->con;
    }

    public function update($macauhoi, $noidung, $dokho, $mamonhoc, $machuong, $nguoitao)
    {
        $valid = true;
        $sql = "UPDATE `cauhoi` SET `noidung`='$noidung',`dokho`='$dokho',`mamonhoc`='$mamonhoc',`machuong`='$machuong',`nguoitao`='$nguoitao' WHERE `macauhoi`=$macauhoi";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete($macauhoi)
    {
        $valid = true;
        $sql = "DELETE FROM `cauhoi` WHERE `macauhoi`= $macauhoi";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM cauhoi JOIN monhoc on  cauhoi.mamonhoc = monhoc.mamonhoc limit 5";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($macauhoi)
    {
        $sql = "SELECT * FROM `cauhoi` WHERE `macauhoi` = $macauhoi";
        $result = mysqli_query($this->con,$sql);
        return mysqli_fetch_assoc($result);
    }

    public function getAllBySubject($mamonhoc)
    {
        $sql = "SELECT * FROM `cauhoi` WHERE `mamonhoc` = $mamonhoc";
        $result = mysqli_query($this->con,$sql);
        return mysqli_fetch_assoc($result);
    }

    public function getTotalPage($content,$selected){
        switch($selected){
            case "Tất cả": $sql = "SELECT * FROM cauhoi where noidung like '%$content%'"; 
            break;
            case "Môn học": $sql = "SELECT * FROM cauhoi where noidung like '%$content%'"; 
            break;
            case "Mức độ": $sql = "SELECT * FROM cauhoi where noidung like '%$content%'"; 
            break;
        }
        $result = mysqli_query($this->con,$sql);
        $count =mysqli_num_rows($result);
        $data = $count%5==0?$count/5:floor($count/5)+1;
        echo $data;
    }

    public function getQuestionBySubject($mamonhoc, $machuong, $dokho, $content, $page)
    {
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT macauhoi, noidung, dokho, machuong FROM cauhoi WHERE mamonhoc = '$mamonhoc'";
        $sql .= $machuong == 0 ? "" : " AND machuong = $machuong";
        $sql .= $dokho == 0 ? "" : " AND dokho = $dokho";
        $sql .= $content == '' ? "" : " AND noidung LIKE '%$content%'";
        $sql .= " ORDER BY macauhoi DESC limit $offset,$limit";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getTotalPageQuestionBySubject($mamonhoc, $machuong, $dokho, $content)
    {
        $limit = 10;
        $sql = "SELECT macauhoi, noidung, dokho, machuong FROM cauhoi WHERE mamonhoc = '$mamonhoc'";
        $sql .= $machuong == 0 ? "" : " AND machuong = $machuong";
        $sql .= $dokho == 0 ? "" : " AND dokho = $dokho";
        $sql .= $content == '' ? "" : " AND noidung LIKE '%$content%'";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return count($rows)/$limit;
    }

    public function getQueryWithInput($filter, $input, $args) {
        $input_entity_encode = htmlentities($input);
        $query = "SELECT *, fnStripTags(noidung) FROM cauhoi JOIN monhoc on cauhoi.mamonhoc = monhoc.mamonhoc WHERE (noidung LIKE N'%${input}%' OR fnStripTags(noidung) LIKE N'%${input_entity_encode}%')";
        if (isset($filter)) {
            if (isset($filter['mamonhoc'])) {
                $query .= " AND monhoc.mamonhoc = ".$filter['mamonhoc'];
            }
            if (isset($filter['machuong'])) {
                $query .= " AND machuong = ".$filter['machuong'];
            }
            if (isset($filter['dokho']) && $filter['dokho'] != 0) {
                $query .= " AND dokho = ".$filter['dokho'];
            }
        }
        return $query;
    }

    public function getQuery($filter, $input, $args) {
        if ($input) {
            return $this->getQueryWithInput($filter, $input, $args);
        }
        $query = "SELECT * FROM cauhoi JOIN monhoc on cauhoi.mamonhoc = monhoc.mamonhoc WHERE 1";
        if (isset($filter)) {
            if (isset($filter['mamonhoc'])) {
                $query .= " AND monhoc.mamonhoc = ".$filter['mamonhoc'];
            }
            if (isset($filter['machuong'])) {
                $query .= " AND machuong = ".$filter['machuong'];
            }
            if (isset($filter['dokho']) && $filter['dokho'] != 0) {
                $query .= " AND dokho = ".$filter['dokho'];
            }
        }
        return $query;
    }
}
?>
