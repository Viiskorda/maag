const form_app = new Vue ({
    el: '#proov',
    data: {
        trenn: true,
        suletud: false,
        isActiveE: true,
        isActiveC: false,
        loggedin: false
    },
    methods: {
        exer: function() {
            this.trenn = true;
            this.suletud = false;
            this.isActiveE = true;
            this.isActiveC = false;
        },
        closed: function() {
            this.trenn = false;
            this.suletud = true;
            this.isActiveE = false;
            this.isActiveC = true;
        }
    }
})