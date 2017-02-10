<?php

namespace App\Controller\User;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Cache\Cache;

use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Session;
use Flash;
use Cake\Controller\Component\FlashComponent;

class UserController extends Controller {
	public function initialize()
	{
	    parent::initialize();
	    $this->loadComponent('Flash');
	}
	public function index(){
		$session = $this->request->session();
		$session->write('Name.defaults', 'php');
		$session->write(['Name.a'=>'133','Name.b'=>'342']);
		// $session->delete('Name'); //delete session
		// $this->Flash->success('The user has been saved', [
		//     'key' => 'positive',
		    
		// ]);

		// print_r($session->read('Name'));die;
		$user = TableRegistry::get('user')->find();
		// $this->set('users', $user);
		$this->viewBuilder()->layout('user');
		$limit = 5;
		$this->User->recursive = 0; 
		$this->paginate = array( 
			'limit' => $limit,
			'order' => array(
	            'User.id' => 'DESC'
	        )
        ); 	
		$this->set('users',$this->paginate());
		$paginate = 0;
		if($user->count() > $limit){
			$paginate = 1;
		}
		$this->set('showPaginate',$paginate);
		$this->render('/User/list');
	}

	public function getCreate(){
		$this->set('action', 'create');
		$this->viewBuilder()->layout('user');
		$this->render('/User/form');
	}

	public function postCreate(){
		$user = TableRegistry::get('user');
		$query = $user->query();
		$does =  'img/uploads/users/';

		$_POST = $this->request->data;
		$file = $_POST['file'];	
		$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
		$arr_ext = array('jpg', 'jpg', 'gif','png'); 
		if(in_array($ext, $arr_ext)){
		  	move_uploaded_file($file['tmp_name'], WWW_ROOT . $does . $file['name']);
		}
		$query->insert(['name', 'email','note','image','birthday',])->values([
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'note' => $_POST['note'],
			'image'=> $file['name'],
			'birthday' => date('Y-m-d H:i:s', strtotime($_POST['birthday']))
		])->execute();
		$this->Flash->success('Success !The user has been saved.', [
		    'key' => 'positive',
		    
		]);
		return $this->redirect('/user');
	}

	public function getUpdate($id){
		$user = TableRegistry::get('user')->find()->where(['id' => $id])->first();
		$this->set('user', $user);
		$this->set('action', 'update');
		$this->viewBuilder()->layout('user');
		$this->render('/User/form');
	}

	public function postUpdate($id){
		$user = TableRegistry::get('user')->query();
		$_POST = $this->request->data;
		$file = $this->request->data('file');
		$image = null;
		if($file['error'] == 0){

			$does =  'img/uploads/users/';
			$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
			$arr_ext = array('jpg', 'jpg', 'gif','png'); 
			if(in_array($ext, $arr_ext)){
			  	move_uploaded_file($file['tmp_name'], WWW_ROOT . $does . $file['name']);
			}
			$image = ['image' => $file['name']];
			// print_r($image);die;
		}
		$user->update()->set([
			'name' => $this->request->data('name'),
			'email' => $this->request->data('email'),
			'note' => $this->request->data('note'),
			$image,
			'birthday' => date('Y-m-d H:i:s', strtotime($_POST['birthday']))
		])->where(['id' => $id])->execute();
		$this->Flash->success('Success ! The user has been updated.', [
		    'key' => 'positive',
		    
		]);
		return $this->redirect('/user');
	}

	public function delete($id){
		$user = TableRegistry::get('user')->query()->delete()->where(['id' => $id])->execute();
		return $this->redirect('/user');
	}

}