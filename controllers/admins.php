<?php
class Admins extends Controller{
    protected function Index(){
        $viewmodel = new AdminModel();
        $this->returnView($viewmodel->Index(), true);
    }

    protected function addMonthAll(){
        $viewmodel = new AdminModel();
        $this->returnView($viewmodel->addMonthAll(), true);
    }

    protected function editParticular(){
        $viewmodel = new AdminModel();
        $this->returnView($viewmodel->editParticular(), true);
    }
}
