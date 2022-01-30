// ライブラリのインポート
import InfiniteLoading from 'vue-infinite-loading';

// 無限スクロールの処理内容
methods: {
    // 無限スクロール
    infiniteHandler($state) {
        if (this.totalCount <= this.comments.length > 100) {
            // 全部ロードしたとき
            $state.complete()
        } else {
            this.fetchComments()
            // 全部ロードしていないとき
            $state.loaded()
        }
    },
    fetchComments() {
        axios.get('https://*******').then((responce) => {
            this.comments.push(responce.data.comments)
            this.totalCount = responce.data.total
        });
    };
};