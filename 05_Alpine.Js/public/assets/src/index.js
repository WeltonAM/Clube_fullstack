function app(){
    return{

        isVisible:false,

        showModal(){
            const modal = this.$refs['modal'];
            modal.classList.add('is-active');
        },
        closeModal(){
            const modal = this.$refs['modal'];
            modal.classList.remove('is-active');
        },

        // refs
        // changeImage(){
        //     const random = Math.floor(Math.random() * this.images.length);
        //     const image = this.$refs['image'];
        //     image.src = this.images[random];
        //     console.log(this.$el);
        // },

        // two way data bind
        // firstName: 'Alexandre',
        // send(){
        //     console.log('send');
        // },
       
        // Multiple Events 
        // isVisible: false,
        // show:{
        //     ['@click'](){
        //         this.isVisible = !this.isVisible;
        //     },
        //     ['@click.away'](){
        //         this.isVisible = !this.isVisible;
        //     },
        // },
        
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