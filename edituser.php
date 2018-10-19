<?php
$page_title = 'Edit user';
include "header.php";
//lấy user theo user id
$id = $_GET['id'];
if (!$id) {
	//nếu id không tồn tại
	header('Location: listusers.php');
}
$sql = 'select * from users where id='.$id;
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result)) {
	//nếu id không tồn tại
	header('Location: listusers.php');
}
$user = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $sql = 'update users set 
		    email="'.$email.'", 
		    name="'.$name.'",
		    phone="'.$phone.'",
		    birthday="'.$birthday.'",
		    gender="'.$gender.'",
		    address="'.$address.'" where id='.$id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo 'Sửa thành công.';
		$user['email'] = $email;
		$user['name'] = $name;
		$user['phone'] = $phone;
		$user['birthday'] = $birthday;
		$user['gender'] = $gender;
		$user['address'] = $address;
	} else {
		echo 'Sửa thất bại.';
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
            <input class="form-control col-md-8" type="text" placeholder="Username" name="username" value="<?php echo $user['username']; ?>" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Email</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="email" placeholder="Enter email address" name="email"  value="<?php echo $user['email']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Name</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="text" placeholder="Name" name="name"  value="<?php echo $user['name']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Phone</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="text" placeholder="Phone" name="phone"  value="<?php echo $user['phone']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Birthday</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="text" placeholder="Birthday" name="birthday"  value="<?php echo $user['birthday']; ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="control-label col-md-3">Gender</label>
          <div class="col-md-9">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" <?php if ($user['gender'] == 'Male') echo 'checked';?> value="Male">Male
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" <?php if ($user['gender'] == 'Female') echo 'checked';?> value="Female">Female
              </label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Address</label>
          <div class="col-md-8">
            <textarea class="form-control" rows="4" placeholder="Address" name="address"><?php echo $user['address'];?></textarea>
          </div>
        </div>
      
    </div>
    <div class="tile-footer">
      <div class="row">
        <div class="col-md-8 col-md-offset-3">
          <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
<?php
include "footer.php";
?>