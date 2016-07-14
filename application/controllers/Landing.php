<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

  public function index()
  {
    redirect(site_url('shop'));
  }
}
