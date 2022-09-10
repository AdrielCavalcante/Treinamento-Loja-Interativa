document.addEventListener("DOMContentLoaded", function () {

    const {createApp} = Vue;

    let contador = 6;

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
                mensagem: 'Bem vindo a pokedex',
                post: null,
            }
        },
        methods: {
            // Onde posso criar diversas funções Vue
            salvar() {
                axios.get("https://pokeapi.co/api/v2/pokemon/?limit="+contador).then(result =>{
                    this.post = result.data.results;
                });
            },

            carregarMais() {
                contador = contador + 6;
                this.salvar();
            }
        },
        mounted() {
            this.salvar();
        },

    }).mount('#app-hello');

});
