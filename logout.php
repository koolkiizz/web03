<?php
session_start();//khởi tạo sử dụng session

session_destroy(); //xóa tất cả các session hiện có

//chuyển hướng về login
header('Location: login.php');