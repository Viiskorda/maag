const form_app = new Vue ({
    el: '#proov',
    data: {
        trenn: true,
        suletud: false,
        isActiveE: true,
        isActiveC: false,
        loggedin: true
    },
    methods: {
        tabSwitch: function() {
            this.trenn = !this.trenn;
            this.suletud = !this.suletud;
            this.isActiveE = !this.isActiveE;
            this.isActiveC = !this.isActiveC;
        }
    }
});