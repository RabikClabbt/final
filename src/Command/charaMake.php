<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャラクターシート登録</title>
</head>
<body>

<?php
// dbConnect.php ファイルをインクルード
include 'dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからのデータ取得
    $versionID = $_POST['versionID'];
    $name = $_POST['name'];
    $img = $_FILES['img']['tmp_name']; // 画像の一時的な保存場所
    $strength = $_POST['strength'];
    $constitution = $_POST['constitution'];
    $power = $_POST['power'];
    $dexterity = $_POST['dexterity'];
    $appearance = $_POST['appearance'];
    $size = $_POST['size'];
    $intelligence = $_POST['intelligence'];
    $education = $_POST['education'];
    $skilltxt = $_POST['skilltxt'];

    // 画像のバイナリデータを取得
    $imgData = file_get_contents($img);
    $imgData = $pdo->quote($imgData);

    // トランザクション開始
    $pdo->beginTransaction();

    try {
        // charaSeatテーブルにデータ挿入
        $sql = "INSERT INTO charaSeat (versionID, name, img) VALUES ('$versionID', '$name', $imgData)";
        $pdo->exec($sql);

        // 最後に挿入されたseatIDを取得
        $seatID = $pdo->lastInsertId();

        // abilityテーブルにデータ挿入
        $sql = "INSERT INTO ability (seatID, strength, constitution, power, dexterity, appearance, size, intelligence, education) 
                VALUES ('$seatID', '$strength', '$constitution', '$power', '$dexterity', '$appearance', '$size', '$intelligence', '$education')";
        $pdo->exec($sql);

        // skillテーブルにデータ挿入
        $sql = "INSERT INTO skill (seatID, skilltxt) VALUES ('$seatID', '$skilltxt')";
        $pdo->exec($sql);

        // トランザクションのコミット
        $pdo->commit();

        echo "キャラクターが正常に登録されました。";
    } catch (Exception $e) {
        // トランザクションのロールバック
        $pdo->rollBack();
        echo "エラー: " . $e->getMessage();
    }
}
?>

<!-- キャラクターシート入力フォーム -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <!-- フォームの各項目を追加 -->

    <button type="submit">キャラクター登録</button>
</form>

</body>
</html>