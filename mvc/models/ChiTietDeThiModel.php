<?php
class ChiTietDeThiModel extends DB{
    public function create($made, $macauhoi, $thutu)
    {
        $valid = true;
        $sql = "INSERT INTO `chitietdethi`(`made`, `macauhoi`, `thutu`) VALUES ('$made','$macauhoi','$thutu')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function createMultiple($made, $cauhoi)
    {
        $valid = true;
        $result = $this->deleteMultiple($made,$cauhoi);
        if($result) {
            foreach($cauhoi as $key => $macauhoi) {
                $result = $this->create($made,$macauhoi['macauhoi'],$key + 1);
                if(!$result) {
                    $valid = false;
                    break;
                }
            }
        } else $valid = false;
        return $valid;
    }

    public function delete($made, $macauhoi)
    {
        $valid = true;
        $sql = "DELETE FROM `chitietdethi` WHERE `made` = '$made' AND `macauhoi` = '$macauhoi'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function deleteMultiple($made, $cauhoi)
    {
        $valid = true;
        foreach($cauhoi as $macauhoi) {
            $result = $this->delete($made,$macauhoi['macauhoi']);
            if(!$result) {
                $valid = false;
                break;
            }
        }
        return $valid;
    }
}
?>