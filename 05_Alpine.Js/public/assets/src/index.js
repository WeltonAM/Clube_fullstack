function app(){
    return{
        show: true,
        users:[],
        data(){
            this.users = [
                {
                    clienteID: 1,
                    nomecompleto: 'Juliana',
                    cidade: 'FSA'
                },
                {
                    clienteID: 2,
                    nomecompleto: 'Karla',
                    cidade: "Welton's heart"
                },
                {
                    clienteID: 3,
                    nomecompleto: 'Frô',
                    cidade: 'Serra'
                },
                {
                    clienteID: 4,
                    nomecompleto: 'Flormosura',
                    cidade: "God's garden"
                },
            ]
        }
    }
}