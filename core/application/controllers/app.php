<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app extends CI_Controller {


  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -  
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in 
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  
    function index() {
    
    try {
      $arrPerfiles = array("2");      
      $this->auth->isLoggedIn($arrPerfiles);

    } catch ( Exception $e ){
      $objView->Msg = $e->getMessage();
      $this->load->view('login',$objView);
      return;
    }
     $data['page_title'] = 'View Shopping Cart';

        // Load data view into layout with extra data
    $this->layout->view('index.php', $data);
    //$objView->URL_Frame = site_url("main/app_main");
    //$this->load->view("home",null);
    
  }


}
