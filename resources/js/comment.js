// 削除ボタンを定数に格納
const delete_button = document.getElementById('delete-button');

// 削除ボタンをクリックしたときのイベントを設定
delete_button.addEventListener('click', function() {
    // ダイアログボックスの表示
    var dialog_bool = window.confirm('削除すると復元できません。\n本当に削除しますか?');
    if (dialog_bool === true) {
        // OKを選択したとき、ブログ投稿編集画面のURLでDELETEリクエストを実行
        document.getElementById('form_delete').submit();
    } else {
        // キャンセルを選択した場合、何も行われない
        return false;
    }
});