<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class AdminController extends AppController
{
	public function index()
    {	
    	$this->set('active', 'element');
    	$this->viewBuilder()->layout('admin');
    	$this->render('../index');
    }
    public function dashboard()
    {
    	$this->set('title', 'Dashboard | Admin'); 
    	$this->set('active', 'dashboard');
    	$this->viewBuilder()->layout('admin');
    	$this->render('../dashboard');
    }
    public function error404()
    {
        $this->set('active', 'other-pages');
    	$this->set('title','Error 404 ! | Admin');
        $this->viewBuilder()->layout('admin');
        $this->render('../404');
    }
    public function faq()
    {
        $this->set('active', 'other-pages');
        $this->set('title','FAQ ! | Admin');
        $this->viewBuilder()->layout('admin');
        $this->render('../faq');
    }
    public function profile()
    {
        $this->set('active', 'more-pages');
        $this->set('title','Profile ! | Admin');
        $this->viewBuilder()->layout('admin');
        $this->render('../profile');
    }
    public function calendar()
    {
        $this->set('active', 'calendar');
        $this->set('title','Calendar ! | Admin');
        $this->viewBuilder()->layout('admin');
        $this->render('../calendar');
    }
    public function formElement()
    {
        $this->set('active', 'forms');
        $this->set('title','formElement ! | Admin');
        // $this->viewBuilder()->layout('admin');
        $this->render('../formelement');
    }
}