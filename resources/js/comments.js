// 定義
const Vue = require('vue');
const axios = require('axios');
const loaded = require('loaded');
// ライブラリの読み込み
import InfiniteLoading from 'vue-infinite-loading';
// コンポーネント化
Vue.component('infinite-loading', InfiniteLoading);

new Vue({
    el: '#tweet',
    data: {
        // commentsテーブルのOffsetを指定するための変数
        page: 0,
        // 意見を格納
        comments: [],
    },
    methods: {
        fetchTweets($state) {
            // 既に取得した意見のIDリストを取得
            let fetchedTweetIdList = this.fetchedTweetIdList();
            axios.get('/comment', {
                params: {
                    fetchedTweetIdList: JSON.stringify(fetchedTweetIdList),
                    page: this.page
                }
            })
            .then(response => {
                if (response.data.comments.length) {
                    this.page++;
                    response.data.comments.forEach (value => {
                        this.comments.push(value);
                    });
                    $state,loaded();
                } else {
                    $state.complete();
                }
            })
            .catch(error => {
                console.log(error);
            })
        },
        
        fetchedTweetIdList() {
            let fetchedTweetIdList = [];
            for (let i = 0; i < this.comments.length; i++) {
                fetchedTweetIdList.push(this.comments[i].id);
            }
            return fetchedTweetIdList;
        }
    }
});