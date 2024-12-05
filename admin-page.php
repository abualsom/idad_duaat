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

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استلام البيانات من النموذج
    /*     $id = intval($_POST['id']); */
    $admin_number = $_POST['admin_number'];
    $teacher_name = $_POST['teacher_name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $teacher_number = $_POST['teacher_number'];
    $private_number = $_POST['private_number'];
    $serial_number = $_POST['serial_number'];
    $has_kimlik = $_POST['has_kimlik'];
    $bank_name = $_POST['bank_name'];
    $account_holder_name = $_POST['account_holder_name'];
    $bank_account = $_POST['bank_account'];
    $job_title = $_POST['job_title'];
    $hifz_code = $_POST['hifz_code'];
    $telave_code = $_POST['telave_code'];
    $reshid_code = $_POST['reshid_code'];
    $halakat_kurb_code = $_POST['halakat_kurb_code'];
    $muwajih_code = $_POST['muwajih_code'];
    $shariaa_code = $_POST['shariaa_code'];
    $aytam_code = $_POST['aytam_code'];
    $kuran_titsh_code = $_POST['kuran_titsh_code'];
    $teaching_hours = $_POST['teaching_hours'];
    $supervision_hours = $_POST['supervision_hours'];
    $additional_work = $_POST['additional_work'];
    $total_hours = $_POST['total_hours'];
    $halaka_count = $_POST['halaka_count'];
    $halaka_1 = isset($_POST['halaka_1']) /* ? 1 : 0 */;
    $halaka_2 = isset($_POST['halaka_2']) /* ? 1 : 0 */;
    $halaka_3 = isset($_POST['halaka_3'])/*  ? 1 : 0 */;
    $halaka_4 = isset($_POST['halaka_4']) /* ? 1 : 0 */;

    // تعيين القيم الافتراضية
    $salary_1 = isset($_POST['salary_1']) ? floatval($_POST['salary_1']) : 0;
    $sebeb = $_POST['sebeb'];
    $salary_2 = isset($_POST['salary_2']) ? floatval($_POST['salary_2']) : 0;
    $sebeb2 = $_POST['sebeb2'];
    $salary_3 = isset($_POST['salary_3']) ? floatval($_POST['salary_3']) : 0;
    $sebeb3 = $_POST['sebeb3'];
    $salary_4 = isset($_POST['salary_4']) ? floatval($_POST['salary_4']) : 0;
    $sebeb4 = $_POST['sebeb4'];
    $salary_5 = isset($_POST['salary_5']) ? floatval($_POST['salary_5']) : 0;
    $sebeb5 = $_POST['sebeb5'];
    $salary_6 = isset($_POST['salary_6']) ? floatval($_POST['salary_6']) : 0;
    $sebeb6 = $_POST['sebeb6'];
    $deduction = isset($_POST['deduction']) ? floatval($_POST['deduction']) : 0;

    $final_total = $salary_1 + $salary_2 + $salary_3 + $salary_4 + $salary_5 + $salary_6 -  $deduction;
    $supervisor_notes = $_POST['supervisor_notes'];

    // كتابة الاستعلام لإدخال البيانات
    $sql = "INSERT INTO teacher (admin_number, teacher_name, gender, phone, teacher_number, private_number, serial_number, has_kimlik, bank_name, account_holder_name, bank_account, job_title, hifz_code, telave_code, reshid_code, halakat_kurb_code, muwajih_code, shariaa_code, aytam_code, kuran_titsh_code, teaching_hours, supervision_hours, additional_work, total_hours, halaka_count, halaka_1, halaka_2, halaka_3, halaka_4, salary_1,sebeb, salary_2,sebeb2,salary_3,sebeb3,salary_4,sebeb4,salary_5,sebeb5,salary_6,sebeb6,deduction, final_total, supervisor_notes) 
            VALUES ('$admin_number', '$teacher_name', '$gender', '$phone', '$teacher_number', '$private_number', '$serial_number', '$has_kimlik', '$bank_name', '$account_holder_name', '$bank_account', '$job_title', '$hifz_code', '$telave_code', '$reshid_code', '$halakat_kurb_code', '$muwajih_code', '$shariaa_code', '$aytam_code', '$kuran_titsh_code', '$teaching_hours', '$supervision_hours', '$additional_work', '$total_hours', '$halaka_count', '$halaka_1', '$halaka_2', '$halaka_3', '$halaka_4', '$salary_1','$sebeb','$salary_2', '$sebeb2','$salary_3','$sebeb3', '$salary_4','$sebeb4', '$salary_5','$sebeb5', '$salary_6','$sebeb6', '$deduction', '$final_total', '$supervisor_notes')";

    // تنفيذ الاستعلام
    if ($connect->query($sql) === TRUE) {
        header("Location:http://localhost/idad_duaat/admin-page.php");
        exit;
    } else {
        echo "خطأ: " . $sql . "" . $connect->error;
    }
}

// إغلاق الاتصال بقاعدة البيانات
$connect->close();

?>



<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>إضافة معلومات المدرس</title>
    <link rel="stylesheet" href="admin-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css" integrity="sha512-VNBisELNHh6+nfDjsFXDA6WgXEZm8cfTEcMtfOZdx0XTRoRbr/6Eqb2BjqxF4sNFzdvGIt+WqxKgn0DSfh2kcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1 class="nino">إضافة معلومات المدرس</h1>

    <!-- نموذج لإدخال البيانات -->
    <div class="container">
        <form action="" method="POST" class="row mx-auto">

            <!-- الرقم الإداري -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="admin_number">الرقم الإداري:</label>
                <select id="admin_number" name="admin_number" required>
                    <option value="30">30</option>>30</option>
                    <option value="20">20</option>>20</option>
                </select>
            </div>


            <!-- اسم المدرس -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="teacher_name">اسم المدرس:</label>
                <input class="m-0" type="text" id="teacher_name" name="teacher_name" value="" required>
            </div>


            <!-- الجنس -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="gender">الجنس:</label>
                <select id="gender" name="gender" required>
                    <option value="ذكر">ذكر</option>
                    <option value="أنثى">أنثى</option>
                </select>
            </div>

            <!-- الهاتف -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="phone">الهاتف:</label>
                <input class="m-0" type="text" id="phone" name="phone">
            </div>

            <!-- رقم المدرس -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="teacher_number">رقم المدرس:</label>
                <input class="m-0" type="text" id="teacher_number" name="teacher_number">
            </div>

            <!-- الرقم الخاص -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="private_number">الرقم الخاص:</label>
                <input class="m-0" type="text" id="private_number" name="private_number">
            </div>

            <!-- الرقم التسلسلي -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="serial_number">الرقم التسلسلي:</label>
                <input class="m-0" type="text" id="serial_number" name="serial_number">
            </div>

            <!-- هل يوجد كملك؟ -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="has_kimlik">هل يوجد كملك؟</label>
                <select id="has_kimlik" name="has_kimlik">
                    <option value=" ">-</option>
                    <option value="نعم">نعم</option>
                    <option value="لا">لا</option>
                </select>
            </div>

            <!-- اسم البنك -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="bank_name">اسم البنك:</label>
                <input class="m-0" type="text" id="bank_name" name="bank_name">
            </div>

            <!-- اسم صاحب الحساب -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="account_holder_name">اسم صاحب الحساب:</label>
                <input class="m-0" type="text" id="account_holder_name" name="account_holder_name">
            </div>

            <!-- حساب البنك -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="bank_account">حساب البنك:</label>
                <input class="m-0" type="text" id="bank_account" name="bank_account">
            </div>

            <!-- المسمى الوظيفي -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="job_title">المسمى الوظيفي:</label>
                <input class="m-0" type="text" id="job_title" name="job_title">
            </div>

            <!-- رمز الحفظ -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="hifz_code">رمز الحفظ:</label>
                <input class="m-0" type="text" id="hifz_code" name="hifz_code">
            </div>

            <!-- رمز التلاوة -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="telave_code">رمز التلاوة:</label>
                <input class="m-0" type="text" id="telave_code" name="telave_code">
            </div>

            <!-- رمز الرشيدي -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="reshid_code">رمز الرشيدي:</label>
                <input class="m-0" type="text" id="reshid_code" name="reshid_code">
            </div>

            <!-- رمز حلقات عن قرب -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="halakat_kurb_code">رمز حلقات عن قرب:</label>
                <input class="m-0" type="text" id="halakat_kurb_code" name="halakat_kurb_code">
            </div>

            <!-- رمز الموجه -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="muwajih_code">رمز الموجه:</label>
                <input class="m-0" type="text" id="muwajih_code" name="muwajih_code">
            </div>

            <!-- رمز الشريعة -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="shariaa_code">رمز الشريعة:</label>
                <input class="m-0" type="text" id="shariaa_code" name="shariaa_code">
            </div>

            <!-- رمز الايتام -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="aytam_code">رمز الايتام:</label>
                <input class="m-0" type="text" id="aytam_code" name="aytam_code">
            </div>

            <!-- رمز علمني القرآن -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="kuran_titsh_code">رمز علمني القرآن:</label>
                <input class="m-0" type="text" id="kuran_titsh_code" name="kuran_titsh_code">
            </div>

            <!-- ساعات التدريس -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="teaching_hours">ساعات التدريس:</label>
                <input class="m-0" type="text" id="teaching_hours" name="teaching_hours">
            </div>

            <!-- ساعات الاشراف -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="supervision_hours">ساعات الاشراف:</label>
                <input class="m-0" type="text" id="supervision_hours" name="supervision_hours">
            </div>

            <!-- عمل اضافي -->
            <div>
                <label class="flex-shrink-0" for="additional_work">عمل اضافي:</label>
                <select id="additional_work" name="additional_work">
                    <option value="0">لا</option>
                    <option value="1">نعم</option>
                </select>
            </div>

            <!-- مجموع الساعات -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="total_hours">مجموع الساعات:</label>
                <input class="m-0" type="text" id="total_hours" name="total_hours">
            </div>

            <!-- عدد الحلقات -->
            <div>
                <label class="flex-shrink-0" for="halaka_count">عدد الحلقات:</label>
                <input class="m-0" type="number" id="halaka_count" name="halaka_count">
            </div>

            <!-- اتم واجب الحلقة الأولى -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="halaka_1">اتم واجب الحلقة الأولى:</label>
                <input class="m-0" type="checkbox" id="halaka_1" name="halaka_1" value="1">
            </div>

            <!-- اتم واجب الحلقة الثانية -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="halaka_2">اتم واجب الحلقة الثانية:</label>
                <input class="m-0" type="checkbox" id="halaka_2" name="halaka_2" value="1">
            </div>

            <!-- اتم واجب الحلقة الثالثة -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="halaka_3">اتم واجب الحلقة الثالثة:</label>
                <input class="m-0" type="checkbox" id="halaka_3" name="halaka_3" value="1">
            </div>

            <!-- اتم واجب الحلقة الرابعة -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="halaka_4">اتم واجب الحلقة الرابعة:</label>
                <input class="m-0" type="checkbox" id="halaka_4" name="halaka_4" value="1">
            </div>

            <!-- الرواتب -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="salary_1">الراتب الأول:</label>
                <input class="m-0" type="text" id="salary_1" name="salary_1">
            </div>

            <!-- السبب -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="sebeb"> السبب:</label>
                <input class="m-0" type="text" id="sebeb" name="sebeb">
            </div>


            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="salary_2">الراتب الثاني:</label>
                <input class="m-0" type="text" id="salary_2" name="salary_2">
            </div>

            <!-- السبب 2 -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="sebeb2"> السبب:</label>
                <input class="m-0" type="text" id="sebeb2" name="sebeb2">
            </div>

            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="salary_3">الراتب الثالث:</label>
                <input class="m-0" type="text" id="salary_3" name="salary_3">
            </div>

            <!-- السبب 3 -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="sebeb3"> السبب:</label>
                <input class="m-0" type="text" id="sebeb3" name="sebeb3">
            </div>

            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="salary_4">الراتب الرابع:</label>
                <input class="m-0" type="text" id="salary_4" name="salary_4">
            </div>

            <!-- السبب 4 -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="sebeb4"> السبب:</label>
                <input class="m-0" type="text" id="sebeb4" name="sebeb4">
            </div>

            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="salary_5">الراتب الخامس:</label>
                <input class="m-0" type="text" id="salary_5" name="salary_5">
            </div>

            <!-- السبب 5 -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="sebeb5"> السبب:</label>
                <input class="m-0" type="text" id="sebeb5" name="sebeb5">
            </div>

            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="salary_6">الراتب السادس:</label>
                <input class="m-0" type="text" id="salary_6" name="salary_6">
            </div>

            <!-- السبب 6 -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="sebeb6"> السبب:</label>
                <input class="m-0" type="text" id="sebeb6" name="sebeb6">
            </div>

            <!-- الخصم -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="deduction">الخصم:</label>
                <input class="m-0" type="text" id="deduction" name="deduction">
            </div>

            <!-- المجموع النهائي -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="final_total">المجموع النهائي:</label>
                <input class="m-0" type="text" id="final_total" name="final_total" value="" readonly>
            </div>

            <!-- ملاحظات الموجه -->
            <div class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star">
                <label class="flex-shrink-0" for="supervisor_notes">ملاحظات الموجه:</label>
                <textarea id="supervisor_notes" name="supervisor_notes"></textarea>
            </div>


            <div class="buttons-container">
                <button type="submit">إضافة البيانات</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
</body>
</html>