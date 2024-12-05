<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'idad_duaat';

// إنشاء الاتصال بقاعدة البيانات باستخدام MySQLi
$connect = new mysqli($host, $user, $pass, $dbname);

// التحقق من نجاح الاتصال
if ($connect->connect_error) { die("فشل الاتصال: " . $connect->connect_error); }
else { } if ($_SERVER['REQUEST_METHOD'] == 'POST') { // استلام البيانات من
النموذج /* $id = intval($_POST['id']); */ $admin_number =
$_POST['admin_number']; $teacher_name = $_POST['teacher_name']; $gender =
$_POST['gender']; $phone = $_POST['phone']; $teacher_number =
$_POST['teacher_number']; $private_number = $_POST['private_number'];
$serial_number = $_POST['serial_number']; $has_kimlik = $_POST['has_kimlik'];
$bank_name = $_POST['bank_name']; $account_holder_name =
$_POST['account_holder_name']; $bank_account = $_POST['bank_account'];
$job_title = $_POST['job_title']; $hifz_code = $_POST['hifz_code']; $telave_code
= $_POST['telave_code']; $reshid_code = $_POST['reshid_code'];
$halakat_kurb_code = $_POST['halakat_kurb_code']; $muwajih_code =
$_POST['muwajih_code']; $shariaa_code = $_POST['shariaa_code']; $aytam_code =
$_POST['aytam_code']; $kuran_titsh_code = $_POST['kuran_titsh_code'];
$teaching_hours = $_POST['teaching_hours']; $supervision_hours =
$_POST['supervision_hours']; $additional_work = $_POST['additional_work'];
$total_hours = $_POST['total_hours']; $halaka_count = $_POST['halaka_count'];
$halaka_1 = isset($_POST['halaka_1']) /* ? 1 : 0 */; $halaka_2 =
isset($_POST['halaka_2']) /* ? 1 : 0 */; $halaka_3 = isset($_POST['halaka_3'])/*
? 1 : 0 */; $halaka_4 = isset($_POST['halaka_4']) /* ? 1 : 0 */; // تعيين القيم
الافتراضية $salary_1 = isset($_POST['salary_1']) ? floatval($_POST['salary_1'])
: 0; $sebeb = $_POST['sebeb']; $salary_2 = isset($_POST['salary_2']) ?
floatval($_POST['salary_2']) : 0; $sebeb2 = $_POST['sebeb2']; $salary_3 =
isset($_POST['salary_3']) ? floatval($_POST['salary_3']) : 0; $sebeb3 =
$_POST['sebeb3']; $salary_4 = isset($_POST['salary_4']) ?
floatval($_POST['salary_4']) : 0; $sebeb4 = $_POST['sebeb4']; $salary_5 =
isset($_POST['salary_5']) ? floatval($_POST['salary_5']) : 0; $sebeb5 =
$_POST['sebeb5']; $salary_6 = isset($_POST['salary_6']) ?
floatval($_POST['salary_6']) : 0; $sebeb6 = $_POST['sebeb6']; $deduction =
isset($_POST['deduction']) ? floatval($_POST['deduction']) : 0; $final_total =
$salary_1 + $salary_2 + $salary_3 + $salary_4 + $salary_5 + $salary_6 -
$deduction; $supervisor_notes = $_POST['supervisor_notes']; // كتابة الاستعلام
لإدخال البيانات $sql = "INSERT INTO teacher (admin_number, teacher_name, gender,
phone, teacher_number, private_number, serial_number, has_kimlik, bank_name,
account_holder_name, bank_account, job_title, hifz_code, telave_code,
reshid_code, halakat_kurb_code, muwajih_code, shariaa_code, aytam_code,
kuran_titsh_code, teaching_hours, supervision_hours, additional_work,
total_hours, halaka_count, halaka_1, halaka_2, halaka_3, halaka_4,
salary_1,sebeb,
salary_2,sebeb2,salary_3,sebeb3,salary_4,sebeb4,salary_5,sebeb5,salary_6,sebeb6,deduction,
final_total, supervisor_notes) VALUES ('$admin_number', '$teacher_name',
'$gender', '$phone', '$teacher_number', '$private_number', '$serial_number',
'$has_kimlik', '$bank_name', '$account_holder_name', '$bank_account',
'$job_title', '$hifz_code', '$telave_code', '$reshid_code',
'$halakat_kurb_code', '$muwajih_code', '$shariaa_code', '$aytam_code',
'$kuran_titsh_code', '$teaching_hours', '$supervision_hours',
'$additional_work', '$total_hours', '$halaka_count', '$halaka_1', '$halaka_2',
'$halaka_3', '$halaka_4', '$salary_1','$sebeb','$salary_2',
'$sebeb2','$salary_3','$sebeb3', '$salary_4','$sebeb4', '$salary_5','$sebeb5',
'$salary_6','$sebeb6', '$deduction', '$final_total', '$supervisor_notes')"; //
تنفيذ الاستعلام if ($connect->query($sql) === TRUE) {
header("Location:http://localhost/idad_duaat/admin-page.php"); exit; } else {
echo "خطأ: " . $sql . "" . $connect->error; } } // إغلاق الاتصال بقاعدة البيانات
$connect->close(); ?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <title>إضافة معلومات المدرس</title>
    <link rel="stylesheet" href="admin-page.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css"
      integrity="sha512-VNBisELNHh6+nfDjsFXDA6WgXEZm8cfTEcMtfOZdx0XTRoRbr/6Eqb2BjqxF4sNFzdvGIt+WqxKgn0DSfh2kcA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400..800&family=Cairo:wght@200..1000&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <h1 class="title">إضافة معلومات المدرس</h1>

    <!-- نموذج لإدخال البيانات -->
    <div class="container">
      <form action="" method="POST" class="row mx-auto">
        <!-- الرقم الإداري -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="admin_number"
            >الرقم الإداري:</label
          >
          <select id="admin_number" name="admin_number" required>
            <option value="30">30</option>
            <option value="20">20</option>
          </select>
        </div>

        <!-- اسم المدرس -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="teacher_name"
            >اسم المدرس:</label
          >
          <input
            class="m-0"
            type="text"
            id="teacher_name"
            name="teacher_name"
            value=""
            required
          />
        </div>

        <!-- الجنس -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="gender">الجنس:</label>
          <select id="gender" name="gender" required>
            <option value="ذكر">ذكر</option>
            <option value="أنثى">أنثى</option>
          </select>
        </div>

        <!-- الهاتف -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="phone">الهاتف:</label>
          <input class="m-0" type="text" id="phone" name="phone" />
        </div>

        <!-- رقم المدرس -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="teacher_number"
            >رقم المدرس:</label
          >
          <input
            class="m-0"
            type="text"
            id="teacher_number"
            name="teacher_number"
          />
        </div>

        <!-- الرقم الخاص -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="private_number"
            >الرقم الخاص:</label
          >
          <input
            class="m-0"
            type="text"
            id="private_number"
            name="private_number"
          />
        </div>

        <!-- الرقم التسلسلي -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="serial_number"
            >الرقم التسلسلي:</label
          >
          <input
            class="m-0"
            type="text"
            id="serial_number"
            name="serial_number"
          />
        </div>

        <!-- هل يوجد كملك؟ -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="has_kimlik"
            >هل يوجد كملك؟</label
          >
          <select id="has_kimlik" name="has_kimlik">
            <option value=" ">-</option>
            <option value="نعم">نعم</option>
            <option value="لا">لا</option>
          </select>
        </div>

        <!-- اسم البنك -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="bank_name"
            >اسم البنك:</label
          >
          <input class="m-0" type="text" id="bank_name" name="bank_name" />
        </div>

        <!-- اسم صاحب الحساب -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="account_holder_name"
            >اسم صاحب الحساب:</label
          >
          <input
            class="m-0"
            type="text"
            id="account_holder_name"
            name="account_holder_name"
          />
        </div>

        <!-- حساب البنك -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="bank_account"
            >حساب البنك:</label
          >
          <input
            class="m-0"
            type="text"
            id="bank_account"
            name="bank_account"
          />
        </div>

        <!-- المسمى الوظيفي -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="job_title"
            >المسمى الوظيفي:</label
          >
          <input class="m-0" type="text" id="job_title" name="job_title" />
        </div>

        <!-- رمز الحفظ -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="hifz_code"
            >رمز الحفظ:</label
          >
          <input class="m-0" type="text" id="hifz_code" name="hifz_code" />
        </div>

        <!-- رمز التلاوة -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="telave_code"
            >رمز التلاوة:</label
          >
          <input class="m-0" type="text" id="telave_code" name="telave_code" />
        </div>

        <!-- رمز الرشيدي -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="reshid_code"
            >رمز الرشيدي:</label
          >
          <input class="m-0" type="text" id="reshid_code" name="reshid_code" />
        </div>

        <!-- رمز حلقات عن قرب -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="halakat_kurb_code"
            >رمز حلقات عن قرب:</label
          >
          <input
            class="m-0"
            type="text"
            id="halakat_kurb_code"
            name="halakat_kurb_code"
          />
        </div>

        <!-- رمز الموجه -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="muwajih_code"
            >رمز الموجه:</label
          >
          <input
            class="m-0"
            type="text"
            id="muwajih_code"
            name="muwajih_code"
          />
        </div>

        <!-- رمز الشريعة -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="shariaa_code"
            >رمز الشريعة:</label
          >
          <input
            class="m-0"
            type="text"
            id="shariaa_code"
            name="shariaa_code"
          />
        </div>

        <!-- رمز الايتام -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="aytam_code"
            >رمز الايتام:</label
          >
          <input class="m-0" type="text" id="aytam_code" name="aytam_code" />
        </div>

        <!-- رمز علمني القرآن -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="kuran_titsh_code"
            >رمز علمني القرآن:</label
          >
          <input
            class="m-0"
            type="text"
            id="kuran_titsh_code"
            name="kuran_titsh_code"
          />
        </div>

        <!-- ساعات التدريس -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="teaching_hours"
            >ساعات التدريس:</label
          >
          <input
            class="m-0"
            type="text"
            id="teaching_hours"
            name="teaching_hours"
          />
        </div>

        <!-- ساعات الاشراف -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="supervision_hours"
            >ساعات الاشراف:</label
          >
          <input
            class="m-0"
            type="text"
            id="supervision_hours"
            name="supervision_hours"
          />
        </div>

        <!-- عمل اضافي -->
        <div
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
          data-aos="fade-left"
        >
          <label class="flex-shrink-0 text-start" for="additional_work"
            >عمل اضافي:</label
          >
          <select id="additional_work" name="additional_work">
            <option value="0">لا</option>
            <option value="1">نعم</option>
          </select>
        </div>

        <!-- مجموع الساعات -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="total_hours"
            >مجموع الساعات:</label
          >
          <input class="m-0" type="text" id="total_hours" name="total_hours" />
        </div>

        <!-- عدد الحلقات -->
        <div data-aos="fade-left">
          <label class="flex-shrink-0 text-start" for="halaka_count"
            >عدد الحلقات:</label
          >
          <input
            class="m-0"
            type="number"
            id="halaka_count"
            name="halaka_count"
          />
        </div>

        <!-- اتم واجب الحلقة الأولى -->
        <div
          data-aos="fade-down-left"
          class="text-white flex-row-reverse text-center p-3 col-lg-6 d-flex gap-2 align-items-center justify-content-end text-star"
        >
          <label class="flex-shrink-0 text-start mb-0" for="halaka_1"
            >اتم واجب الحلقة الأولى:</label
          >
          <input
            class="m-0"
            type="checkbox"
            id="halaka_1"
            name="halaka_1"
            value="1"
          />
        </div>

        <!-- اتم واجب الحلقة الثانية -->
        <div
          data-aos="fade-down-right"
          class="text-white flex-row-reverse text-center p-3 col-lg-6 d-flex gap-2 align-items-center justify-content-end text-star"
        >
          <label class="flex-shrink-0 text-start mb-0" for="halaka_2"
            >اتم واجب الحلقة الثانية:</label
          >
          <input
            class="m-0"
            type="checkbox"
            id="halaka_2"
            name="halaka_2"
            value="1"
          />
        </div>

        <!-- اتم واجب الحلقة الثالثة -->
        <div
          data-aos="fade-up-left"
          class="text-white flex-row-reverse text-center p-3 col-lg-6 d-flex gap-2 align-items-center justify-content-end text-star"
        >
          <label class="flex-shrink-0 text-start mb-0" for="halaka_3"
            >اتم واجب الحلقة الثالثة:</label
          >
          <input
            class="m-0"
            type="checkbox"
            id="halaka_3"
            name="halaka_3"
            value="1"
          />
        </div>

        <!-- اتم واجب الحلقة الرابعة -->
        <div
          data-aos="fade-up-right"
          class="text-white flex-row-reverse text-center p-3 col-lg-6 d-flex gap-2 align-items-center justify-content-end text-star"
        >
          <label class="flex-shrink-0 text-start mb-0" for="halaka_4"
            >اتم واجب الحلقة الرابعة:</label
          >
          <input
            class="m-0"
            type="checkbox"
            id="halaka_4"
            name="halaka_4"
            value="1"
          />
        </div>

        <!-- الرواتب -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="salary_1"
            >الراتب الأول:</label
          >
          <input class="m-0" type="text" id="salary_1" name="salary_1" />
        </div>

        <!-- السبب -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="sebeb"> السبب:</label>
          <input class="m-0" type="text" id="sebeb" name="sebeb" />
        </div>

        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="salary_2"
            >الراتب الثاني:</label
          >
          <input class="m-0" type="text" id="salary_2" name="salary_2" />
        </div>

        <!-- السبب 2 -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="sebeb2"> السبب:</label>
          <input class="m-0" type="text" id="sebeb2" name="sebeb2" />
        </div>

        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="salary_3"
            >الراتب الثالث:</label
          >
          <input class="m-0" type="text" id="salary_3" name="salary_3" />
        </div>

        <!-- السبب 3 -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="sebeb3"> السبب:</label>
          <input class="m-0" type="text" id="sebeb3" name="sebeb3" />
        </div>

        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="salary_4"
            >الراتب الرابع:</label
          >
          <input class="m-0" type="text" id="salary_4" name="salary_4" />
        </div>

        <!-- السبب 4 -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="sebeb4"> السبب:</label>
          <input class="m-0" type="text" id="sebeb4" name="sebeb4" />
        </div>

        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="salary_5"
            >الراتب الخامس:</label
          >
          <input class="m-0" type="text" id="salary_5" name="salary_5" />
        </div>

        <!-- السبب 5 -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="sebeb5"> السبب:</label>
          <input class="m-0" type="text" id="sebeb5" name="sebeb5" />
        </div>

        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="salary_6"
            >الراتب السادس:</label
          >
          <input class="m-0" type="text" id="salary_6" name="salary_6" />
        </div>

        <!-- السبب 6 -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="sebeb6"> السبب:</label>
          <input class="m-0" type="text" id="sebeb6" name="sebeb6" />
        </div>

        <!-- الخصم -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="deduction">الخصم:</label>
          <input class="m-0" type="text" id="deduction" name="deduction" />
        </div>

        <!-- المجموع النهائي -->
        <div
          data-aos="fade-right"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="final_total"
            >المجموع النهائي:</label
          >
          <input
            class="m-0"
            type="text"
            id="final_total"
            name="final_total"
            value=""
            readonly
          />
        </div>

        <!-- ملاحظات الموجه -->
        <div
          data-aos="fade-left"
          class="text-white text-center p-3 col-lg-6 d-flex gap-2 flex-column text-star"
        >
          <label class="flex-shrink-0 text-start" for="supervisor_notes"
            >ملاحظات الموجه:</label
          >
          <textarea id="supervisor_notes" name="supervisor_notes"></textarea>
        </div>

        <div class="buttons-container justify-content-end">
          <button class="btn btn-primary" type="submit">إضافة البيانات</button>
        </div>
      </form>
    </div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
      integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('alertButton');
        button.addEventListener('click', () => {
          Swal.fire({
            title: 'هل تريد الاستمرار بالحذف؟',
            icon: 'question',
            iconHtml: '؟',
            confirmButtonText: 'نعم',
            cancelButtonText: 'لا',
            showCancelButton: true,
            showCloseButton: true,
          });
        });
      });
    </script>
  </body>
</html>
