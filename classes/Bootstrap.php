<?php

class Bootstrap
{

    private $request;
    private $controller;
    private $action;

    public function __construct($request)
    { // tu wyląduje $_GET
        $this->request = $request;
        if ($this->request['controller'] === "") {
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        if ($this->request['action'] === "") {
            $this->action = 'index';
        } else {
            $this->action = $this->request['action'];
        }
    }

    public function createController()
    {
        // Check class
        if (class_exists($this->controller)) { //spawdzi czy jest zdefiniowana klasa, powinna ona byc w requireowanych plikach
            $parents = class_parents($this->controller);
            // Check extend
            if (in_array("Controller", $parents)) {
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->action, $this->request);
                } else {
                    // Method doesnt exists
                    echo '<h1>Method does not exists </h1>';
                    return;
                }
            } else {
                // Base controller isnt found
                echo '<h1>Base controller not found</h1>';
                return;
            }
        } else {
            // the Contoller class doesnt exist
            echo '<h1>the Contoller class doesnt exist </h1>';
            return;
        }
    }
}
