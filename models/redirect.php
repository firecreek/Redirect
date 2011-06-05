<?php

  /**
   * Redirect Model
   *
   * @category Model
   * @package  Croogo
   * @version  1.0
   * @author   Darren Moore <darren.m@firecreek.co.uk>
   * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
   * @link     http://www.firecreek.co.uk
   */
  class Redirect extends RedirectAppModel
  {
    /**
     * Use table
     *
     * @access public
     * @var boolean
     */
    public $useTable = false;
    
    /**
     * PHP for route
     *
     * @access private
     * @var string
     */
    private $_routeCode = "Router::connect(':url', array('plugin'=>'redirect', 'controller'=>'redirect', 'action'=>'go', 'forward'=>':forward', 'code'=>':code'));";
    
    /**
     * Plugin route file location
     *
     * @access private
     * @var string
     */
    private $_routeFile = null;
    
    /**
     * Fake fields
     *
     * @access private
     * @var array
     */
    public $fields = array(
      'url' => array('type' => 'string', 'length' => 255),
      'forward' => array('type' => 'string', 'length' => 255),
      'status' => array('type' => 'int')
    );

    
    /**
     * Construct model
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
      $this->_routeFile = APP.'plugins'.DS.'redirect'.DS.'config'.DS.'redirect_routes.php';
      parent::__construct();
    }

    
    /**
     * Find routes
     *
     * @access public
     * @return array List of routes from Router
     */
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

    
    /**
     * Save routes, write to file
     *
     * @access public
     * @return boolean Success
     */
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