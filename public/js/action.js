new Vue({
    el: "#app",
    data: {
        menus: {
            dash: {link:'../home', name: 'Dashboard'},
            tests: [
                {link: '#', name: 'Gestion ambiental'},
                {link: '#', name: 'Gestion recurso humano'},
                {link: '#', name: 'Gestion del conocimiento'},
                {link: '#', name: 'Gestion de conocimiento'},
                {link: '#', name: 'Gestion etica empresarial'},
                {link: '#', name: 'Gestion con la comunidad'},
                {link: '#', name: 'Gestion tecnológica'},
                {link: '#', name: 'Gestion de mercadeo'}
            ],
            report: {link: '#', name: 'Resportes'}
        }
    }
});