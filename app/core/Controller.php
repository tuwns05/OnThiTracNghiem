<?php
namespace App\Core;
use Exception;


class Controller
{
    // Load a model using autoloading (expects proper namespace declaration in model file)
    protected function model($model)
    {
        $modelClass = 'App\\Models\\' . $model;
        if (class_exists($modelClass)) {
            return new $modelClass;
        } else {
            throw new Exception("Model class not found: " . $modelClass);
        }
    }

    // Load a view file located in the BASE_VIEWS_DIR directory
    protected function view($view, $data = [])
    {
        $viewPath = BASE_DIR . '/app/views/' . $view; 
        if (file_exists($viewPath)) {
            extract($data);
            require_once $viewPath;
        } else {
            echo $viewPath;
            throw new Exception("View file not found: " . $view);
        }
    }
}
