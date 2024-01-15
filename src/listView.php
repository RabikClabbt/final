<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>CoCキャラクターシート保管所 - キャラクターシート一覧</title>
    </head>
    <body>
        <div class="header">
            <div></div>
        </div>
        <div class="body">
        <?php
            require_once 'dbConnect.php';

            try {
                $sql = $pdo->prepare("SELECT * FROM ");
                $sql->execute();

                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                // 取得した通知データを表示
                echo '<div>';
                foreach ($result as $row) {
                    echo '<div>';
                    echo '</div>';
                }
                echo '</div>';

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
        </div>
        <div class="footer">
            <div></div>
        </div>
    </body>
</html>