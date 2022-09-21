<?php

class User
{
    public function info(string $name, bool $isAdmin)
    {
        if($isAdmin){
            return 'is admin';
        }

        return 'is not admin';
    }
}

$user = new User();
echo $user->info(name:'Juliana', isAdmin:true);