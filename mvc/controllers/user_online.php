<?php  
class User_Online extends Controller {
    public function default()
    {
        $session_dir = session_save_path();
        $session_files = glob("$session_dir/sess_*");

        $online_users = 0;

        foreach ($session_files as $session_file) {
            if (time() - filemtime($session_file) < 300) {
                $online_users++;
            }
        }
        echo "Số người dùng đang trực tuyến: $online_users";
    }
}
?>