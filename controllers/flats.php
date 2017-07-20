<?php
class Flats extends Controller{
    protected function Index(){
        $viewmodel = new FlatModel();
        $this->returnView($viewmodel->Index(), true);
    }
}
