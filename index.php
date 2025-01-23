<?php
// إعداد الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "your_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// تحقق من نوع الطلب لتحديد العملية
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action']; // نوع العملية (update, reset, get)

    if ($action === 'update') {
        // زيادة العداد
        $class = $_POST['class'];
        $conn->query("UPDATE detection_counter SET count = count + 1 WHERE id = 1");
        echo "Counter updated.";
    } elseif ($action === 'reset') {
        // إعادة تعيين العداد
        $conn->query("UPDATE detection_counter SET count = 0 WHERE id = 1");
        echo "Counter reset.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // عرض العداد
    $result = $conn->query("SELECT count FROM detection_counter WHERE id = 1");
    $row = $result->fetch_assoc();
    echo $row['count'];
}

$conn->close();
?>
