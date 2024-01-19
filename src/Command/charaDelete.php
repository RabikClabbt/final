<?php
// リクエストからJSONデータを取得
$data = json_decode(file_get_contents("php://input"));

// 受け取ったデータからseatIDを取り出す
$seatID = $data->seatID;

// 削除処理
require 'dbCommand.php';
try {
    // 削除処理のSQL文
    $deleteSQL = "DELETE FROM charaSeat WHERE seatID = :seatID";
    
    // SQL文を準備
    $stmt = $pdo->prepare($deleteSQL);
    
    // パラメータをバインド
    $stmt->bindParam(':seatID', $seatID, PDO::PARAM_INT);
    
    // SQL文を実行
    $stmt->execute();

    // レスポンスを返す
    header('Content-Type: application/json');
    echo json_encode(['message' => '削除が成功しました']);
} catch (PDOException $e) {
    // エラーが発生した場合の処理
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['message' => '削除が失敗しました']);
}
?>