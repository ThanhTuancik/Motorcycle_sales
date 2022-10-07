               
<div class="sidebar ">
    <div class="logo-details">
        <a href="./admin.php">
        <i class='bx bxs-user-circle'></i>
            <div class="logo_name">Moto</div>
        </a>
    </div>
    <ul class="nav-links" style="padding-left: 0;">
    <li>
            <a href="./admin.php">
            <i class='bx bxs-home'></i>
                <span class="link_name">Trang chủ</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="./admin.php">Trang chủ</a></li>
            </ul>
        </li>
    <li>
            <a href="./giaodien.php">
            <i class='bx bxs-layout'></i>
                <span class="link_name">Giao diện</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="./giaodien.php">Giao diện</a></li>
            </ul>
        </li>
    <li>
            <a href="./hang.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Hãng Xe</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="./hang.php">Hãng xe</a></li>
            </ul>
        </li>

        <li>
            <div class="icon-link">
                <a>
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Sản phẩm</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <a>
                <li><span class="link_name">Sản phẩm</span></li>
                </a>
                <?php
                // lấy dữ liệu hãng ra
                $SQL = 'SELECT * FROM hang';
                $categoryList = executeResult($SQL);
                $index = 1;
                foreach ($categoryList as $item) {
                    echo '<li><a href="sanpham.php?TenHang=' . $item['TenHang'] . '">' . $item['TenHang'] . '</a></li>';
                }
                ?>
            </ul>
        </li>
        <li>
            <a href="./donhang.php">
                <i class='bx bx-notepad'></i>
                <span class="link_name">Đơn Hàng</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="./donhang.php">Đơn hàng</a></li>
            </ul>
        </li>
        
        
        <li>
            <a href="#">
            <i class='bx bxs-user-account'></i>
                <span class="link_name">Tài khoản</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Tài khoản</a></li>
            </ul>
        </li>

        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="../image/Home/logo.jpg" alt="">
                </div>

                <div class="name-job">
                    <div class="profile_name">
                    <?php
                                //nếu có session tên dangnhap thì ta thực hiện lệnh dưới
                                if(isset($_SESSION['USER']) && $_SESSION['USER'] != NULL)
                                {
                                    echo $_SESSION['USER'];
                                                    
                                }
                            ?> 
                    </div>
                    <div class="job">Web Designer</div>
                </div>
                <a href="./logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </div>
        </li>
    </ul>
</div>

