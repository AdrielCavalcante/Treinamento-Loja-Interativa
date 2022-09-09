document.addEventListener("DOMContentLoaded", function () {

    const {createApp} = Vue;

    let contador = 0;

    createApp({
        data() {
            return {
                mensagem: 'Hello Vue',
            }
        },
        methods: {
            // Onde posso criar diversas funções Vue
            salvar() {
                this.mensagem = 'Hello Vue '+(contador++);
            }
        },
        mounted() {
            // Carregar inicialmente sem ação predefinida
        },

    }).mount('#app-hello');

});