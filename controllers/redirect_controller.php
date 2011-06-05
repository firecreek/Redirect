<?php

  /**
   * Redirect Controller
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
    public $uses = array('Redirect.Redirect');


    /**
     * Before filter
     *
     * @access public
     * @return void
     */
    public function beforeFilter() {
      parent::beforeFilter();

      // CSRF Protection
      if (in_array($this->params['action'], array('admin_index'))) {
        $this->Security->validatePost = false;
      }
    }


    /**
     * Admin index
     *
     * List existing redirect routes
     *
     * @access public
     * @return void
     */
    public function admin_index()
    {
      $this->set('title_for_layout', __('Redirect', true));
      
      if(!empty($this->data))
      {
        // CSRF Protection
        if($this->params['_Token']['key'] != $this->data['Redirect']['token_key']) {
          $blackHoleCallback = $this->Security->blackHoleCallback;
          $this->$blackHoleCallback();
        }
        
        $this->Redirect->set($this->data);
        
        if($this->Redirect->save())
        {
          $this->Session->setFlash(__('Routes saved', true), 'default', array('class' => 'success'));
          $this->redirect($this->here);
        }
        else
        {
          $this->Session->setFlash(__('Routes could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
        }
      }
      
      $routes = $this->Redirect->find();
      $this->set(compact('routes'));
    }


    /**
     * Admin add field
     *
     * @access public
     * @return void
     */
    public function admin_add_field()
    {
    }


    /**
     * Go to a forward URL using headers
     *
     * @access public
     * @return void
     */
    public function go()
    {
      $this->redirect($this->params['forward'],$this->params['code']);
    }

  }
?>