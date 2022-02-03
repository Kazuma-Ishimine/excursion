function logout_check(e){
    if (confirm('本当にログアウトしますか?')) {
        document.getElementById('logout-form').submit();
        console.log('fire');
    }
}