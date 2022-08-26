function app(){
    return{

        // refs
        // changeImage(){
        //     const random = Math.floor(Math.random() * this.images.length);
        //     const image = this.$refs['image'];
        //     image.src = this.images[random];
        //     console.log(this.$el);
        // },
        
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