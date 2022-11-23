<?php

namespace app\controllers;

use app\classes\Flash;
use app\classes\Validate;
use app\database\models\User as ModelUser;

class User extends Base
{
    private $validate;
    private $user;

    public function __construct()
    {
        $this->validate = new Validate;
        $this->user = new ModelUser;
    }

    public function create($request, $response, $args)
    {
        $messages = FLash::getAll();

        return $this->getTwig()->render($response, $this->setView('site/user_create'), [
            'title' => 'Sign up',
            'messages' => $messages,
        ]);
    }

    public function edit($request, $response, $args)
    {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);

        $user = $this->user->findBy('id', $id);

        if(!$user){
            Flash::set('message', "User doesn't exist", 'danger');

            return redirect('/', $response);
        }

        $messages = Flash::getAll();

        return $this->getTwig()->render($response, $this->setView('site/user_edit'), [
            'title' => 'User edit',
            'user' => $user,
            'messages' => $messages,
        ]);
    }

    public function store($request, $response, $args)
    {
        $firstName = strip_tags($_POST['firstName']);
        $lastName = strip_tags($_POST['lastName']);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = strip_tags($_POST['password']);

        $this->validate->required(['firstName', 'lastName', 'email', 'password'])->exist($this->user, 'email', $email);

        $errors = $this->validate->getErrors();

        if($errors){
            FLash::flashes($errors);
            return redirect('/user/create', $response);
        }
        
        $created = $this->user->create(['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

        if($created){
            Flash::set('message', 'Sing up successfully');
            return redirect('/', $response);
        }
        
        Flash::set('message', 'Something went wrong');
        return redirect('/user/create', $response);
    }

    public function update($request, $response, $args)
    {
        $firstName = strip_tags($_POST['firstName']);
        $lastName = strip_tags($_POST['lastName']);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);

        $this->validate->required(['firstName', 'lastName', 'email']);

        $errors = $this->validate->getErrors();

        if($errors){
            FLash::flashes($errors);
            return redirect('/user/edit/' . $id, $response);
        }
        
        $updated = $this->user->update(['fields' => ['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email], 'where' => ['id' => $id]]);
        
        if($updated){
            Flash::set('message', 'Successfully updated!');
            return redirect('/user/edit/' . $id, $response);
        }
        
        Flash::set('message', 'Error to update!');
        return redirect('/user/edit/' . $id, $response);
        
        return $response;
    }

    public function destroy($request, $response, $args)
    {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);

        $user = $this->user->findBy('id', $id);

        if(!$user){
            Flash::set('message', "User doesn't exist", 'danger');

            return redirect('/', $response);
        }

        $deleted = $this->user->delete('id', $id);

        if($deleted){
            Flash::set('message', 'Successfully deleted!');
            return redirect('/', $response);
        }
        
        Flash::set('message', 'Error to delete!');
        return redirect('/' . $id, $response);
    }
}