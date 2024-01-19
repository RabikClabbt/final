<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>CoCキャラクターシート保管所</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="header">
            <div></div>
        </div>
        <div class="body">
            <h2>CoCキャラクターシート保管所</h2>
            <div class="Command">
                    <div class="Command-1">
                        <button onclick="location.href='./listView.php'">一覧表示</button>
                    </div>
                    <div class="Command-2">
                        <button onclick="location.href='./Command/charaMake.php'">キャラクターシート作成</button>
                    </div>
            </div>
            <div class="notice">
                <?php require './notice/getNotice.php' ?>
            </div>
        </div>
        <div class="footer">
            <div></div>
        </div>
    </body>
</html>