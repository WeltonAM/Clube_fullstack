<?php

namespace app\controllers\portal;

use app\controllers\ContainerController;

class CourseController extends ContainerController
{
    public function index()
    {
        
    }

    public function show($req)
    {
        $this->view([
            'title' => 'Course',
            'course' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus ex est incidunt obcaecati laboriosam maxime esse, ab, quod, sed nam necessitatibus quibusdam sequi! Voluptates sapiente fugiat ipsa, enim maiores nihil.',
        ], 'portal.course');
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update($id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}