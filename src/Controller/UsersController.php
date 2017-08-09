<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
	public $paginate = [
        'limit' => 25,
        'order' => [
            'id' => 'ASC'
        ]
    ];
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);
    }
	
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->set('title', 'Utilisateurs');
		$this->set('ctitle', 'Utilisateurs');
		$this->set('nav_cative', '2');
		
		$cond = [];
		if(isset($this->request->query['qs']) && trim($this->request->query['qs'])){
			$cond['OR']['id '] = '' . trim($this->request->query['qs']) . '';
			$cond['OR']['nom LIKE'] = '%' . trim($this->request->query['qs']) . '%';
			$cond['OR']['pnom LIKE'] = '%' . trim($this->request->query['qs']) . '%';
			$cond['OR']['username LIKE'] = '%' . trim($this->request->query['qs']) . '%';
			$cond['OR']['email LIKE'] = '%' . trim($this->request->query['qs']) . '%';
			$cond['OR']['atype LIKE'] = '%' . trim($this->request->query['qs']) . '%';
			$this->set( '_qs_', trim($this->request->query['qs']) );
		}else{
			$this->set( '_qs_', '' );
		}
		
		$q = $this->Users
				->find()
				->where($cond);
		
        $users = $this->paginate($q);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('title', 'Utilisateur');
		$this->set('ctitle', 'Utilisateur');
		$this->set('nav_cative', '2');
		
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('title', 'Utilisateurs');
		$this->set('ctitle', 'Ajouter un utilisateur');
		$this->set('nav_cative', '2');
		
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			if(isset($this->request->data['password']) && trim($this->request->data['password'])){
				$this->request->data['password'] = md5($this->request->data['password']);
			}
			
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('title', 'Utilisateurs');
		$this->set('ctitle', 'Modifier un utilisateur');
		$this->set('nav_cative', '2');
		
		$user = $this->Users->get($id, [
            'contain' => []
        ]);
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			if(isset($this->request->data['password']) && trim($this->request->data['password'])){
				$this->request->data['password'] = md5($this->request->data['password']);
			}
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
		
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function login(){
		if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Nom d\'utilisateur et/ou mot de passe invalide'));
        }
	}
	
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}
}
