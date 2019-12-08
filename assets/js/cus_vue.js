const form_app = new Vue ({
    el: '#proov',
    data: {
        trenn: true,
        hooajaline: false,
        suletud: false,
        isActiveE: true,
        isActiveH: false,
        isActiveC: false,
        loggedin: true
    },
    methods: {
        tabSwitchT: function() {
            this.trenn = true;
            this.hooajaline = false;
            this.suletud = false;
            this.isActiveE = true;
            this.isActiveH = false;
            this.isActiveC = false;
        },
        tabSwitchH: function() {
            this.trenn = false;
            this.hooajaline = true;
            this.suletud = false;
            this.isActiveE = false;
            this.isActiveH = true;
            this.isActiveC = false;
        },
        tabSwitchS: function() {
            this.trenn = false;
            this.hooajaline = false;
            this.suletud = true;
            this.isActiveE = false;
            this.isActiveH = false;
            this.isActiveC = true;
        }
    }
});