<?php

  class Redirect extends RedirectAppModel
  {
  
    public $useTable = false;
    
    private $_routeCode = "Router::connect(':url', array('plugin'=>'redirect', 'controller'=>'redirect', 'action'=>'go', 'forward'=>':forward', 'code'=>':code'));";
    
    private $_routeFile = null;
    
    public $fields = array(
      'url' => array('type' => 'string', 'length' => 255),
      'forward' => array('type' => 'string', 'length' => 255),
      'status' => array('type' => 'int')
    );

    
    public function __construct()
    {
      $this->_routeFile = APP.'plugins'.DS.'redirect'.DS.'config'.DS.'redirect_routes.php';
      
      parent::__construct();
    }
    
    
    public function find()
    {
      $results = array();
      $router = Router::getInstance();
      
      foreach($router->routes as $route)
      {
        if($route->defaults['plugin'] == 'redirect' && $route->defaults['controller'] == 'redirect' && $route->defaults['action'] == 'go')
        {
          $results[] = array(
            'url' => $route->template,
            'forward' => $route->defaults['forward'],
            'code' => $route->defaults['code']
          );
        }
      }
      
      return $results;
    }
    
    
    public function save()
    {
      $output = '';
      
      foreach($this->data['Route'] as $route)
      {
        $output .= String::insert($this->_routeCode,$route)."\n";
      }
      
      $output = "<?php\n\n".$output."\n?>";
    
      $this->File = new File($this->_routeFile);
      return $this->File->write($output,'w',true);
    }
  
  
  }

?>