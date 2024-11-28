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
        <form>
            <div class="form-group">
                <label for="teacher-name">اسم المدرس</label>
                <input type="text" id="teacher-name" name="teacher-name" placeholder="أدخل اسم المدرس" required>
            </div>
            <div class="form-group">
                <label for="admin-number">الرقم الإداري</label>
                <input type="number" id="admin-number" name="admin-number" placeholder="أدخل الرقم الإداري" required>
            </div>
            <div class="form-group">
                <label for="department">القسم</label>
                <input type="text" id="department" name="department" placeholder="أدخل القسم" required>
            </div>
            <div class="form-group">
                <button type="submit">بحث</button>
            </div>
        </form>
    </div>
</body>
</html>
