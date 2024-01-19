<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>CoCキャラクターシート保管所 - キャラクターシート一覧</title>
</head>
<body>
    <div class="header">
        <!-- ヘッダーコンテンツ -->
    </div>
    <div class="body">
        <?php
        require_once 'dbConnect.php';

        try {
            $sql = $pdo->prepare("SELECT charaSeat.seatID, charaSeat.name, ability.strength, ability.constitution, ability.power,
                    ability.dexterity, ability.appearance, ability.size, ability.intelligence, ability.education, GROUP_CONCAT(skill.skilltxt SEPARATOR ', ') AS skills,
                    version.versionName
                FROM charaSeat
                LEFT JOIN ability ON charaSeat.seatID = ability.seatID
                LEFT JOIN skill ON charaSeat.seatID = skill.seatID
                LEFT JOIN version ON charaSeat.versionID = version.versionID
                GROUP BY charaSeat.seatID
            ");
            $sql->execute();

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                echo '<div class="listItem">';
                echo '<div class="listContents">';
                echo '<p>キャラクター名: ' . htmlspecialchars($row['name']) . '</p>';

                echo '<div class="ability">';
                echo '<p>STR : ' . htmlspecialchars($row['strength']) . '</p>';
                echo '<p>CON : ' . htmlspecialchars($row['constitution']) . '</p>';
                echo '<p>POW : ' . htmlspecialchars($row['power']) . '</p>';
                echo '<p>DEX : ' . htmlspecialchars($row['dexterity']) . '</p>';
                echo '<p>APP : ' . htmlspecialchars($row['appearance']) . '</p>';
                echo '<p>SIZ : ' . htmlspecialchars($row['size']) . '</p>';
                echo '<p>INT : ' . htmlspecialchars($row['intelligence']) . '</p>';
                echo '<p>EDU : ' . htmlspecialchars($row['education']) . '</p>';
                echo '<p>Skills: ' . htmlspecialchars($row['skills']) . '</p>';
                echo '<p>Version: ' . htmlspecialchars($row['versionName']) . '</p>';
                echo '</div>';

                echo '</div>';

                echo '<div class="listCommand">';
                echo '<button onclick="location.href=\'./Command/charaDetail.php\'">詳細閲覧</button>';
                echo '<button onclick="location.href=\'./Command/charaEdit.php\'">編集</button>';
                echo '<button onclick="charaDelete(' . $row['seatID'] . ')">削除</button>';
                echo '</div>';                

                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        <script src="./Command/js/charaDelete.js"></script>
    </div>
    <div class="footer">
        <!-- フッターコンテンツ -->
    </div>
</body>
</html>
