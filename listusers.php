<?php 
// hàm include để nhập nội dung file header vào đây
// hàm này có thể nhập được các mã PHP để xử lý trên file này
include('header.php');
include('connectdb.php');
 ?>
<article>
    <?php
        if (isset($_SESSION['user'])) {
            echo 'Bạn đã đăng nhập';
        }
        ?>
    <div class="wrapper">
        <table>
            <tr>
                <td>STT</td>
                <td>Username</td>
                <td>Email</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Birthday</td>
                <td>Gender</td>
                <td>Address</td>
            </tr>
            <?php
            //lấy tất cả các user có trong bảng users
            //câu query để lấy
            $sql = 'select * from users'; // không có where vì mình cần lấy tất cả
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
                $i = 1;
                while($user = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>'.($i++).'</td>';
                    echo '<td>'.$user['username'].'</td>';
                    echo '<td>'.$user['email'].'</td>';
                    echo '<td>'.$user['name'].'</td>';
                    echo '<td>'.$user['phone'].'</td>';
                    echo '<td>'.$user['birthday'].'</td>';
                    echo '<td>'.$user['gender'].'</td>';
                    echo '<td>'.$user['address'].'</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</article>
<?php include('footer.php'); ?>