document.addEventListener("DOMContentLoaded", function () {

    const {createApp} = Vue;

    createApp({
        created() {
            window.setInterval(() => {
                this.now = Math.trunc((new Date()).getTime() / 1000);
            },1000);
        },

        data() {
            return {
                now: Math.trunc((new Date()).getTime() / 1000),
                date: Math.trunc((new Date("December 25, 2022 00:00:00")).getTime() / 1000),
            }
        },
        
        computed: {
            seconds() {
                return (this.date - this.now) % 60;
            },
            minutes() {
                return Math.trunc((this.date - this.now) / 60) % 60;
            },
            hours() {
                return Math.trunc((this.date - this.now) / 60 / 60) % 24;
            },
            days() {
                return Math.trunc((this.date - this.now) / 60 / 60 / 24);
            }
        }
    }).mount('#contador');

    createApp({
        data() {
            return {
                posts: [],
                evento: {},
                currentpage: 1,
                maxpages: 1,
                show: true,
            }
        },
        methods: {
            loadPosts() {
                axios.get(siteurl + '/wp-json/api/v1/convidados?paged=' + this.currentpage).then((response) => {
                    if (response.data && response.data.posts && response.status === 200) {
                        const posts = response.data.posts;

                        posts.forEach((item, index) => {
                            this.posts.push(item);
                        });

                        this.maxpages = response.data.maxpages;
                    }
                });
            },
            loadMore() {
                if (this.currentpage < this.maxpages) {
                    this.currentpage++;
                    this.loadPosts();
                }
                if (this.currentpage === this.maxpages) {
                    this.show = false;
                }
            },
            EventData(id){
                axios.get(siteurl + '/wp-json/api/v1/eventos').then((response) => {
                    if (response.data && response.data.posts && response.status === 200) {
                        const events = response.data.posts;

                        events.forEach((item) => {
                            if(item.id == id) {
                                this.evento = item;
                            }
                        });
                    }
                });
            }
        },
        mounted() {
            this.loadPosts();
        }
    }).mount('#convidados');

    createApp({
        data() {
            return {
                posts: [],
                evento: {},
                currentpage: 1,
                maxpages: 1,
                show: true,
            }
        },
        methods: {
            loadPosts() {
                axios.get(siteurl + '/wp-json/api/v1/eventos?paged=' + this.currentpage).then((response) => {
                    if (response.data && response.data.posts && response.status === 200) {
                        const posts = response.data.posts;

                        posts.forEach((item, index) => {
                            this.posts.push(item);
                        });

                        this.maxpages = response.data.maxpages;
                    }
                });
            },

            selectedPost(id) {
                this.posts.forEach((item) => {
                    if(id === item.id) {
                        this.evento = item;
                    }
                });
            }
        },
        mounted() {
            this.loadPosts();
        }
    }).mount('#programacao');

});


    