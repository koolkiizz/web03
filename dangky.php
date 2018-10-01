<?php 
// hàm include để nhập nội dung file header vào đây
// hàm này có thể nhập được các mã PHP để xử lý trên file này
include('header.php'); 
include('connectdb.php');
?>
<article>
    <div class="wrapper">
        <?php
        //đặt đoạn mã xử lý đăng ký ở đây để tiện cho việc hiển thị thông báo sau này
        //kiểm tra người dùng đã submit form hay chưa
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $birthday_day = $_POST['birthday_day'];
            $birthday_month = $_POST['birthday_month'];
            $birthday_year = $_POST['birthday_year'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            //kiểm tra các thông tin đã nhập đã đầy đủ hay chưa, ở đây cần thiết phải có 4 thông tin đầu tiên
            if (!$username || !$password || !$email || !$name) {
                echo 'Bạn nhập thiếu thông tin!';
            } else {
                //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
                $sql = 'insert into users(username, password, email, name, phone, birthday, gender, address) values ("'
                    .$username.'", "'
                    .md5($password).'", "' //mã hóa password trước khi chèn vào CSDL để tăng bảo mật
                    .$email.'", "'
                    .$name.'", "'
                    .$phone.'", "'
                    .$birthday_year.'-'.$birthday_month.'-'.$birthday_day.'", "' //định dạng Y-m-d cho kiểu date
                    .$gender.'", "'
                    .$address.'")';
                //thực thi câu lệnh SQL
                if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
                    echo 'Đăng ký thành công!';
                }
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
                    <div class="form-left">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-right">
                        <input type="email" class="input-text" name="email" id="email" />
                    </div>
                </div>
                <div class="form-block">
                    <div class="form-left">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-right">
                        <input type="text" class="input-text" name="name" id="name" />
                    </div>
                </div>
                <div class="form-block">
                    <div class="form-left">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="form-right">
                        <input type="text" class="input-text" name="phone" id="phone" />
                    </div>
                </div>
                <div class="form-block">
                    <div class="form-left">
                        <label for="birthday">Birthday</label>
                    </div>
                    <div class="form-right">
                        <select name="birthday_day" class="input-text input-select">
                            <option value="" hidden></option>
                            <?php
                            for($i = 1; $i < 32; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                        <select name="birthday_month" class="input-text input-select">
                            <option value="" hidden></option>
                            <?php
                            for($i = 1; $i < 13; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                        <select name="birthday_year" class="input-text input-select">
                            <option value="" hidden></option>
                            <?php
                            for($i = 1950; $i < 2015; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-block">
                    <div class="form-left">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="form-right">
                        <label for="gmale"><input type="radio" name="gender" value="Nam" id="gmale"/>Nam</label>
                        <label for="gfemale"><input type="radio" name="gender" value="Nữ" id="gfemale"/>Nữ</label>
                    </div>
                </div>
                <div class="form-block">
                    <div class="form-left">
                        <label for="address">Address</label>
                    </div>
                    <div class="form-right">
                        <textarea name="address" id="address" cols="30" rows="10" class="input-text"></textarea>
                    </div>
                </div>
                <div class="form-block">
                    <button type="submit" name="submit" class="smb-button">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</article>
<?php include('footer.php'); ?>