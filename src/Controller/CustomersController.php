<?php
namespace App\Controller;

use App\Controller\AppController;

class CustomersController extends AppController
{
    public function initialize()
    {
       parent::initialize();
       $this->Auth->allow('register');
    }

    public function index()
    {
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
    }

    public function register()
    {
        $this->loadModel('Customers');

        $customer = $this->Customers->newEntity();
        $user = $this->Users->newEntity();
        //dd($users);
        if ($this->request->is('post')) {

            $request = $this->request->getData();
            $username = $request['username'];

            $reqUser =  [
                            ['username' => $request['username'] ],
                            ['password' => $request['password'] ],
                            ['group_id' => $request['group_id'] ]
                        ];

            $reqCus = [];
            $reqCus['nama_depan'] = $request['nama_depan'];
            $reqCus['nama_belakang'] = $request['nama_belakang'];
            $reqCus['address'] = $request['address'];
            $reqCus['email'] = $request['email'];
            $reqCus['saldo'] = 100000;

            //dd($reqCus);

            // user add

            $user = $this->Users->patchEntity($user, $this->request->getData());
            //dd($user);
            if ($this->Users->save($user)) {
                
                $userDesc = $this->Users->find('all')
                    ->where([
                        'username' => $username
                    ])
                    ->first();

                $reqCus['user_id'] = $userDesc->id;

                //customer add

                $customer = $this->Customers->patchEntity($customer, $reqCus);
                //dd($customer);
                if ($this->Customers->save($customer)) {
                    $this->Flash->success(__('And Berhasil Menambahkan Akun'));

                    return $this->redirect([
                        'controller' => 'Pages',
                        'action' => 'index'
                    ]);
                }

            }

            
            $this->Flash->error(__('Gagal Menambahkan'));
        }
        $this->set(compact('customer'));
        
    }

     public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            
            if ($user) {
                //dd($user);
                $this->Auth->setUser($user);
                $this->Flash->success(__('Kamu Berhasil Login.'));
                //dd($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password was incorrect.'));
        }
    }

    public function logout() {
        
        $this->loadModel('Carts');

        $carts = $this->Carts->find('list')
            ->first();
        
        if($carts == null){

        }else{
            //Truncate Table Carts
            $truncate = $this->Carts->connection()->transactional(function ($conn) {
            $sqls = $this->Carts->schema()->truncateSql($this->Carts->connection());
            foreach ($sqls as $sql) {
                    $this->Carts->connection()->execute($sql)->execute();
                }
            });
        }

        $this->Flash->success(__('Good-Bye'));
        $this->redirect($this->Auth->logout());
    }

    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);

        $this->set('customer', $customer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            //dd($customer);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
