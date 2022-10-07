<header>
    <div>
      <ul>
        <!--Phần thăm dò ý kiến khách hàng -->
        <li>
          <a href="javascript:void(0)">Thăm dò ý kiến Khách hàng</a>
        </li>
        <li>|</li>
        <!--Phần Câu hỏi thường gặp -->
        <li>
          <a href="javascript:void(0)">Câu hỏi thường gặp</a>
        </li>
        <li>|</li>
        <!-- Phần Liên hệ -->
        <li>
          <a href="javascript:void(0)">Liên hệ</a>
        </li>
        <li>|</li>
        <!-- Phần tuyển dụng -->
        <li>
          <a href="javascript:void(0)">Tuyển dụng</a>
        </li>
        <li>
          <div class="social-pc">
            <div class="b-social" id="btn-social-pc">
              <div class="btn-social">
                <img src="https://www.honda.com.vn/images/social/ico-facebook-red.png">
                <img src="https://www.honda.com.vn/images/social/ico-ig-red.png">
                <img src="https://www.honda.com.vn/images/social/ico-youtube-red.png">
              </div>
            </div>
          </div>
        </li>
      </ul>
      <div>
        <!-- nút menu cho mobile -->
        <button>
          <i class="fa fa-bars"></i>
        </button>
        <!-- Logo -->
        <a href="./index.php">
          <!-- <img src="https://www.honda.com.vn/images/logo.svg" alt="HONDA Việt Nam"> -->
          <span>Motorcycle</span>
        </a>
      </div>
    </div>

    <nav>
      <div class="social-mobile">
        <div class="b-social" id="btn-social-pc">
          <div class="btn-social">
            <img src="https://www.honda.com.vn/images/social/ico-facebook-red.png">
            <img src="https://www.honda.com.vn/images/social/ico-ig-red.png">
            <img src="https://www.honda.com.vn/images/social/ico-youtube-red.png">
          </div>
        </div>
      </div>
      </div>
      <ul>
        <li>
          <a href="./index.php">Trang chủ</a>
        </li>

        <li class="">
          <a href="./index.php">Trang chủ</a>
        </li>

        <li class="arrow ">
          <a href="#">Sản phẩm</a>
          <ul>
          <?php
                // lấy dữ liệu hãng ra
                $SQL = 'SELECT * FROM hang';
                $categoryList = executeResult($SQL);
                $index = 1;
                foreach ($categoryList as $item) {
                    echo '<li><a href="sanpham.php?TenHang=' . $item['TenHang'] . '">' . $item['TenHang'] . '</a></li>';
                }
                ?>
            
            <li class="arrow">
              <a href="#">Phụ kiện</a>
              <ul>
                <li>
                  <a href="">Phụ kiện xe</a>
                </li>
                <li>
                  <a href="">Mũ bảo hiểm</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>



        <li class="">
          <a href="#">Giới thiệu</a>
        </li>

        <li class="">
          <a href="#">Liên hệ</a>
        </li>

        <li class="">
        </li>

        <li class="">
        </li>

        <li class="">
          <a href="#">Tin tức</a>
        </li>
        <li>
        </li>
        <li>
          <a>Thăm dò ý kiến Khách hàng</a>
        </li>

        <li><a>Câu hỏi thường gặp</a></li>
        <li>
          <a>Liên hệ</a>
        </li>
        <li>
          <a>Tuyển dụng</a>
        </li>

        <li>
          <a href="#"><i class="fa fa-ellipsis-h"></i></a>
          <ul>
            <li>

            </li>
            <li>
            </li>
            <li>
            </li>
            <li>
              <a>Tin tức</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>