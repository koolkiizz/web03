<?php
// hàm include để nhập nội dung file header vào đây
// hàm này có thể nhập được các mã PHP để xử lý trên file này
include('header.php');
include('connectdb.php');
 ?>
<article>
    <div class="wrapper">
    <?php
    if (isset($_SESSION['dang_nhap']) && $_SESSION['dang_nhap'] == 1) {
    	echo 'Bạn đã đăng nhập';
    }
    ?>
    <?php
        //đặt đoạn mã xử lý đăng ký ở đây để tiện cho việc hiển thị thông báo sau này
        //kiểm tra người dùng đã submit form hay chưa
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $username = $_POST['username'];
            $password = $_POST['password'];
            //kiểm tra các thông tin đã nhập đã đầy đủ hay chưa
            if (!$username || !$password) {
                echo 'Bạn nhập thiếu thông tin!';
            } elseif (!isset($_SESSION['user'])) {
                //nếu đã đầy đủ thông tin cần thiết, tiến hành tìm kiếm người dùng trong CSDL
                $sql = 'select * from users where username="'.$username.'" and password = "'.md5($password).'"';
                //sử dụng mã hóa MD5 trước khi tìm kiếm để tăng tính bảo mật cho ứng dụng web
                //thực thi câu lệnh SQL
                $result = mysqli_query($conn, $sql); //biến $conn được khai báo trong file connectdb
                if (mysqli_num_rows($result)) {
                    echo 'Đăng nhập thành công!';
                    $user = mysqli_fetch_array($result);
                    //var_dump($user);
                    $_SESSION['dang_nhap'] = 1;
                }
            } else {
            	echo 'Bạn đã đăng nhập và không thể đăng nhập lại';
            }
        }
        ?>
        <div id="form">
            <form action="" method="post">
                <div class="form-block">
                    <div class="form-left">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-right">
                        <input type="text" class="input-text" name="username" id="username" />
                    </div>
                </div>
                <div class="form-block">
                    <div class="form-left">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-right">
                        <input type="password" class="input-text" name="password" id="password" />
                    </div>
                </div>
                <div class="form-block">
                    <button type="submit" name="submit" class="smb-button">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
</article>
<?php include('footer.php'); ?>