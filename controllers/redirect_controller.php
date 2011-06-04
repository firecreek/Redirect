<?php

  /**
   * Redirect Controller
   *
   * PHP version 5
   *
   * @category Controller
   * @package  Croogo
   * @version  1.0
   * @author   Darren Moore <darren.m@firecreek.co.uk>
   * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
   * @link     http://www.firecreek.co.uk
   */
  class RedirectController extends RedirectAppController {
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Redirect';
      
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array();

    public function admin_index()
    {
      $this->set('title_for_layout', __('Redirect', true));
    }
    
    
    /**
     * Read routes and put into array
     * 
     * @access private
     * @return array
     */
    private function _read()
    {
    }
    


  }
?>