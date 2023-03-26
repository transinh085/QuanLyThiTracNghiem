<?php
$GLOBALS['navbar'] = [
    array(
        'name'  => 'Dashboard',
        'icon'  => 'fa fa-rocket',
        'url'   => 'dashboard'
    ),
    array(
        'name'  => 'Quản lý',
        'type'  => 'heading',
        'navbarItem' => [
            array(
                'name'  => 'Câu hỏi',
                'icon'  => 'fa fa-circle-question',
                'url'   => 'question',
                'role' => 'cauhoi'
            ),
            array(
                'name'  => 'Người dùng',
                'icon'  => 'fa fa-user-friends',
                'url'   => 'user',
                'role' => 'nguoidung'
            ),
            array(
                'name'  => 'Môn học',
                'icon'  => 'fa fa-folder',
                'url'   => 'subject',
                'role' => 'monhoc'
            ),
            array(
                'name'  => 'Phân công',
                'icon'  => 'fa fa-person-harassing',
                'url'   => 'assignment',
                'role' => 'phancong'
            ),
            array(
                'name'  => 'Đề kiểm tra',
                'icon'  => 'fa fa-file',
                'url'   => 'test',
                'role' => 'dethi'
            ),
            array(
                'name'  => 'Nhóm học phần',
                'icon'  => 'fa fa-layer-group',
                'url'   => 'module',
                'role' => 'hocphan'
            )
        ]
    ),
    array(
        'name'  => 'Quản trị',
        'type'  => 'heading',
        'navbarItem' => [
            array(
                'name'  => 'Nhóm quyền',
                'icon'  => 'fa fa-users-gear',
                'url'   => 'roles',
                'role' => 'nhomquyen'
            ),
            array(
                'name'  => 'Cài đặt',
                'icon'  => 'fa fa-gears',
                'url'   => 'setting',
                'role' => 'caidat'
            )
        ]
    )
];

// Xử lý url để active navbar
function getActiveNav() {
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/',$path);
    return $components[2];
}

function build_navbar() {
    // Loại bỏ các navbar item không có trong session nhóm quyền
    foreach($GLOBALS['navbar'] as $key => $nav) {
        if(isset($nav['navbarItem'])) {
            foreach ($nav['navbarItem'] as $key1 => $navItem) {
                if(!array_key_exists($navItem['role'],$_SESSION['user_role'])) {
                    unset($GLOBALS['navbar'][$key]['navbarItem'][$key1]);
                }
            }
        }
    }
    
    // Sau khi xoá các navbar item không có trong session nhóm quyền thì duyệt mảng tạo navbar
    $html = '';
    $current_page = getActiveNav();
    foreach($GLOBALS['navbar'] as $nav) {
        if(isset($nav['navbarItem']) && isset($nav['type']) && count($nav['navbarItem']) > 0) {
            $html .= "<li class=\"nav-main-heading\">".$nav['name']."</li>";
            foreach ($nav['navbarItem'] as $navItem) {
                $link_name = '<span class="nav-main-link-name">' . $navItem['name'] . '</span>' . "\n";
                $link_icon = '<i class="nav-main-link-icon ' . $navItem['icon'] . '"></i>' . "\n";
                $html .= "<li class=\"nav-main-item\">"."\n";
                $html .= "<a class=\"nav-main-link".($current_page == $navItem['url'] ? " active" : "")."\" href=\"./".$navItem['url']."\">";
                $html .= $link_icon;
                $html .= $link_name;
                $html .= "</a></li>\n";
            }
        }
    }
    echo $html;
}
?>