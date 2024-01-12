<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>CoCキャラクターシート保管所</title>
    </head>
    <body>
        <div class="header">
            <div></div>
        </div>
        <div class="body">
            <h2>CoCキャラクターシート保管所</h2>
            <div class="Command">
                <ul>
                    <li>
                        <button onclick="location.href='./listView.php'">一覧表示</button>
                    </li>
                    <li>
                        <button onclick="location.href='./register.php'">キャラクターシート作成</button>
                    </li>
                </ul>
            </div>
            <div class="notice">
                <?php require './getNotice.php' ?>
            </div>
        </div>
        <div class="footer">
            <div></div>
        </div>
    </body>
</html>