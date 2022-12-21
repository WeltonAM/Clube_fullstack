function todo(){
    return {
        tasks: [],
        task: '',

        taskStatus: {
            completed: 0,
            uncompleted: 0,
        },

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

            this.statusTasks();
        },

        statusTasks: function(){
            this.taskStatus = this.tasks.reduce((acc, task) => {
                if(task.completed){
                    acc['completed']+=1;
                } else {
                    acc['uncompleted']+=1;
                }
                return acc;
            }, {completed: 0, uncompleted: 0});
        },

        checkTask: function(index){
            this.tasks[index]['completed'] = !this.tasks[index]['completed'];

            this.statusTasks();
        },
        
        removeTask: function(index){
            this.tasks.splice(index, 1);

            this.statusTasks();
        },
    }
}