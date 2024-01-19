<?php
require 'dbConnect.php';

try {
    $stmt = $pdo->prepare("SELECT title, content, created_at FROM notifications");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 取得した通知データを表示
    echo '<div>';
    foreach ($result as $row) {
        echo '<div>';
        echo '<strong>タイトル:</strong> ' . $row['title'] . '<br>';
        echo '<strong>内容:</strong> ' . $row['content'] . '<br>';
        echo '<strong>日時:</strong> ' . $row['created_at'] . '<br><br>';
        echo '</div>';
    }
    echo '</div>';

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>