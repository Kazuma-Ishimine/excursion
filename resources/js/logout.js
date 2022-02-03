// 削除ボタンを定数に格納
const logout_dialog = document.getElementById('logout-dialog');

// 削除ボタンをクリックしたときのイベントを設定
logout_dialog.addEventListener('click', function() {
    // ダイアログボックスの表示
    var dialog_bool = window.confirm('本当にログアウトしますか?');
    if (dialog_bool === true) {
        // OKを選択したとき、ログアウトする
        document.getElementById('logout-form').submit();
    } else {
        // キャンセルを選択した場合、何も行われない
        return false;
    }
});