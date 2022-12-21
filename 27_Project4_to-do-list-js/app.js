function todo(){
    return {
        tasks: [],
        task: '',

        taskNameExists: function(){
            return this.tasks.find(task => {
                return task.name === this.task
            });
        },

        addTask: function(){
            
            if(this.taskNameExists()){
                alert('Task already exists');
                return;
            }
            
            if(this.task === ''){
                alert('Digit something');
                return;
            }

            this.tasks.push({
                id: Math.floor(Math.random() * new Date().getTime()),
                name: this.task,
                completed: false
            });

            this.task = '';
        },

        checkTask: function(index){
            this.tasks[index]['completed'] = !this.tasks[index]['completed'];
        },
        
        removeTask: function(task){
            console.log(task.name);
        },
    }
}