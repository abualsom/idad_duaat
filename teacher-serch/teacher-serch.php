<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'idad_duaat';

// إنشاء الاتصال بقاعدة البيانات باستخدام MySQLi
$connect = new mysqli($host, $user, $pass, $dbname);

// التحقق من نجاح الاتصال
if ($connect->connect_error) {
    die("فشل الاتصال: " . $connect->connect_error);
} else {
    /* echo "تم الاتصال بنجاح "; */
}

// التحقق من طريقة الطلب وتعيين القيم
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $teacher_name = trim($_POST['teacher-name']);
    $admin_number = (int) $_POST['admin-number'];

    // استعلام البحث
    $sql = "SELECT * FROM teacher 
            WHERE teacher_name COLLATE UTF8_GENERAL_CI = '$teacher_name' 
            AND admin_number = $admin_number";

    // تنفيذ الاستعلام
    $result = $connect->query($sql);

    // التحقق من النتائج
    if ($result->num_rows > 0) {
        $teacher_data = $result->fetch_assoc();

        // تخزين البيانات في الجلسة
        $_SESSION['teacher_data'] = $teacher_data;

        // إعادة التوجيه إلى صفحة البحث للعرض
        header("Location: http://localhost/idad_duaat/admin-serch.php");
        exit;
    } else {
        $messeg = "هذا الاسم غير مسجل ";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-login.css">
    <title>نموذج المدرس</title>
</head>

<body>
    <div class="form-container">
        <h2>نموذج المدرس</h2>
        <form action="" method="POST">
            <div style="text-align: center; color: red; font-weight: bold; font-size: 1.5em;">
                <?php if (isset($messeg)) echo $messeg; ?>
            </div>


            <div class="form-group">
                <label for="teacher-name">اسم المدرس</label>
                <input type="text" 
                        id="teacher-name" name="teacher-name" placeholder="أدخل اسم المدرس" required
                        autocomplete="off">
            </div>
            <div class="form-group">
                <label for="admin-number">الرقم الخاص</label>
                <input type="text" id="private_number" name="private_number" placeholder="أدخل الرقم الخاص" required>
            </div>
            <div class="form-group">
                <button type="submit" name="search">بحث</button>
            </div>
        </form>
    </div>
</body>

</html>