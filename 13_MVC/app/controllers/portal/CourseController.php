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
            'course' => 'PHP MVC',
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