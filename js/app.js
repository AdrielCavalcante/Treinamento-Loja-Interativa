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
                postsDia: [],
                postsFiltrados: [],
                currentpage: 1,
                maxpages: 1,
                pressed: false,
                filtered: false,
                active: 0,
                day: 0,
                message: "",
                localizacao: "",
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

            filterPosts(search, local) {
                if(search != "" || local != "") {
                    this.postsFiltrados = [];
                    if(this.postsDia.length != 0 && this.pressed) {
                        this.postsDia.forEach((item, index) => {
                            if(search != "" && local == ""){
                                let titulo = item.titulo.toLowerCase();
                                if(titulo.includes(search.toLowerCase())) {
                                    this.postsFiltrados.push(item);
                                }
                            } else if(local != "" && search == "") {
                                let localizacao = item.localizacao.toLowerCase();
                                if(localizacao.includes(local.toLowerCase())) {
                                    this.postsFiltrados.push(item);
                                }
                            } else {
                                let titulo = item.titulo.toLowerCase();
                                let localizacao = item.localizacao.toLowerCase();

                                if(titulo.includes(search.toLowerCase()) && localizacao.includes(local.toLowerCase())) {
                                    this.postsFiltrados.push(item);
                                }
                            }
                        });
                    } else if (this.day >= 17 && this.day <= 21){
                        this.filtered = false;
                    }
                    else {
                        this.posts.forEach((item, index) => {
                            if(search != "" && local == ""){
                                let titulo = item.titulo.toLowerCase();
                                if(titulo.includes(search.toLowerCase())) {
                                    this.postsFiltrados.push(item);
                                }
                            } else if(local != "" && search == "") {
                                let localizacao = item.localizacao.toLowerCase();
                                if(localizacao.includes(local.toLowerCase())) {
                                    this.postsFiltrados.push(item);
                                }
                            } else {
                                let titulo = item.titulo.toLowerCase();
                                let localizacao = item.localizacao.toLowerCase();

                                if(titulo.includes(search.toLowerCase()) && localizacao.includes(local.toLowerCase())) {
                                    this.postsFiltrados.push(item);
                                }
                            }
                        });
                    }
                    
                    this.filtered = true;
                } else {
                    this.filtered = false;
                }
            },

            selectedPost(id) {
                this.posts.forEach((item) => {
                    if(id === item.id) {
                        this.evento = item;
                    }
                });
            }, 

            getDayProgramacao(day) {
                // Resetando ao mudar o dia 
                this.postsDia = [];
                this.message = "";
                this.localizacao = "";
                this.filterPosts(this.message, this.localizacao);

                this.posts.forEach((item) => {
                    if(day == item.dataHora.substr(0, 2)) { // Pegando o dia 17/12/2000 = 17
                        this.postsDia.push(item);
                    }
                });

                this.pressed = true;

                if(day == this.day) {
                    this.pressed = false;
                    this.day = 0;
                    this.active = 0;
                } else {
                    this.day = day;
                    this.active = day;
                }
            },

            search(message) {
                this.message = message;
                this.filterPosts(this.message, this.localizacao);
            },

            select(local) {
                this.localizacao = local;
                this.filterPosts(this.message, this.localizacao);
            }
            
        },

        watch: {
            message: (value) => {
                if(value == ""){
                    this.filtered = false;
                }
            },

            localizacao: (value) => {
                if(value == ""){
                    this.filtered = false;
                }
            }
        },

        mounted() {
            this.loadPosts();
        }
    }).mount('#programacao');

});


    