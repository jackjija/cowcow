<?php
$customer_id = $_REQUEST['customer_id'];
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "cowcow";

// เชื่อมต่อกับ MySQL
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// เช็คว่าการเชื่อมต่อสำเร็จหรือไม่
if (!$conn) {
    die("ไม่สามารถติดต่อกับ MySQL ได้: " . mysqli_connect_error());
}

// ลบข้อมูลจากตาราง cow ด้วยคำสั่ง SQL
$sql = "DELETE FROM customer WHERE customer_id = '$customer_id'";
$result = mysqli_query($conn, $sql);

// เช็คว่าการลบข้อมูลสำเร็จหรือไม่
if (!$result) {
    die("DELETE จากตาราง cow มีข้อผิดพลาดเกิดขึ้น: " . mysqli_error($conn));
}

// ปิดการเชื่อมต่อกับ MySQL
mysqli_close($conn);

// ส่งกลับไปยังหน้า cow.php
header("Location: customer.php");
?>
