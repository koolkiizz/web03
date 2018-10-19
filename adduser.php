<?php 
// hàm include để nhập nội dung file header vào đây
// hàm này có thể nhập được các mã PHP để xử lý trên file này
$page_title = 'Thêm user';
include('header.php');
?>
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
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    //kiểm tra các thông tin đã nhập đã đầy đủ hay chưa, ở đây cần thiết phải có 4 thông tin đầu tiên
    if (!$username || !$password || !$email || !$name) {
        echo 'Bạn nhập thiếu thông tin!';
    } else {
    	$sql = 'select id from users where username="'.$username.'"';
    	$result = mysqli_query($conn, $sql);
    	if (mysqli_num_rows($result)) {
    		echo 'Tài khoản đã tồn tại.';
    	} else {
	        //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
	        $sql = 'insert into users(username, password, email, name, phone, birthday, gender, address) values ("'
	            .$username.'", "'
	            .md5($password).'", "' //mã hóa password trước khi chèn vào CSDL để tăng bảo mật
	            .$email.'", "'
	            .$name.'", "'
	            .$phone.'", "'
	            .$birthday.'", "' //định dạng Y-m-d cho kiểu date
	            .$gender.'", "'
	            .$address.'")';
	        //thực thi câu lệnh SQL
	        if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
	            echo 'Đăng ký thành công!';
	        }
	        else {
	        	echo 'lỗi';
	        }
	    }
    }
}
?>
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Register</h3>
    <div class="tile-body">
      <form class="form-horizontal" method="post" action="">
        <div class="form-group row">
          <label class="control-label col-md-3">Username</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="text" placeholder="Username" name="username">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Password</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="password" placeholder="Password" name="password">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Email</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="email" placeholder="Enter email address" name="email">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Name</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="text" placeholder="Name" name="name">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Phone</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="text" placeholder="Phone" name="phone">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Birthday</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="text" placeholder="Birthday" name="birthday">
          </div>
        </div>

        <div class="form-group row">
          <label class="control-label col-md-3">Gender</label>
          <div class="col-md-9">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender">Male
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender">Female
              </label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Address</label>
          <div class="col-md-8">
            <textarea class="form-control" rows="4" placeholder="Address" name="address"></textarea>
          </div>
        </div>
      
    </div>
    <div class="tile-footer">
      <div class="row">
        <div class="col-md-8 col-md-offset-3">
          <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
<?php
include('footer.php');
?>