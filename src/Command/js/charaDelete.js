// deleteConfirmation.js
function charaDelete(seatID) {
    if (confirm("本当に削除しますか？")) {
        // Fetch APIを使用して削除リクエストを送信
        fetch('./Command/deleteCharacter.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ seatID: seatID }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('削除が失敗しました');
            }
            return response.json();
        })
        .then(data => {
            // レスポンスが成功の場合の処理
            console.log(data.message);
            // ここで必要な更新処理やリダイレクトなどを行う
        })
        .catch(error => {
            // レスポンスがエラーの場合の処理
            console.error(error.message);
        });
    }
}