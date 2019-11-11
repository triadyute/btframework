<?php

/*App Core class
Creates  URL & loads core controller
URL FORMAT - /Controller/method/params */

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
      // print_r($this->getUrl());
      $url = $this->getUrl();
      // Look for first value in controllers
      if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
        //Set as current controller if exists
        $this->currentController = ucwords($url[0]);
        //Unset 0 index
        unset($url[0]);
      }
      //Require controller
      require_once '../app/controllers/' . $this->currentController . '.php';
      //Instantiate Contriller class
      $this->currentController = new $this->currentController;
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}