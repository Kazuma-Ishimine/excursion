document.addEventListener("DOMContentLoaded", function(){
    // 削除ボタンを定数に格納
    const delete_button = document.getElementById('delete-button');
	delete_button.addEventListener('click', function(){
	    // ダイアログボックスの表示
        var dialog_bool_comment = window.confirm('削除すると復元できません。\n本当に削除しますか?');
        console.log(dialog_bool_comment);
		if(dialog_bool_comment){
		    // OKを選択したとき、ブログ投稿編集画面のURLでDELETEリクエストを実行
            document.getElementById('form_delete').submit();
		}else{
			// キャンセルを選択した場合、何も行われない
            return false;
		}           
	});
}, false);