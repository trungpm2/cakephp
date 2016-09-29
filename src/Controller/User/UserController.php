<?php

namespace App\Controller\User;

use Cake\Controller\Controller;

use Cake\ORM\TableRegistry;

class UserController extends Controller {

	public function index(){
		$user = TableRegistry::get('user')->find();
		$this->set('users', $user);
		$this->viewBuilder()->layout('user');
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
		$query->insert(['name', 'email'])->values([
			'name' => $this->request->data('name'),
			'email' => $this->request->data('email')
		])->execute();
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
		$user->update()->set([
			'name' => $this->request->data('name'),
			'email' => $this->request->data('email')
		])->where(['id' => $id])->execute();
		return $this->redirect('/user');
	}

	public function delete($id){
		$user = TableRegistry::get('user')->query()->delete()->where(['id' => $id])->execute();
		return $this->redirect('/user');
	}
}