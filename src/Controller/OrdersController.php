<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Core\Configure;


class OrdersController extends AppController
{
    
    public function index()
    {
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

   
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['OrderDetails']
        ]);

        $this->set('order', $order);
    }

    public function transaksi() {

        $this->loadModel('Products');
        $this->loadModel('OrderDetails');
        $this->loadModel('Carts');
        $this->loadModel('Customers');

        $order = $this->Orders->newEntity();
        
        if ($this->request->is('post')) {
            $request = $this->request->getData();
            
            $request['date'] = date('Y-m-d');
            //dd($request);

            $user_id = $request['id_user'];

            $order = $this->Orders->patchEntity($order, $request,[
                'associated' => [
                    'OrderDetails'
                ]
            ]);

            $customer = $this->Customers->find('all')
                ->where([
                    'user_id' => $user_id
                ])
                ->first();
            $saldoLama = $customer->saldo;
            $saldoBaru = $saldoLama - $order->saldo_terpakai;

            //dd($saldoLama);

            if ($this->Orders->save($order)) {
                
                $orderAja = $this->Orders
                    ->find()
                    ->order(['code' => 'DESC'])
                    ->first();

                $idOrder = $orderAja->id;

                $orderDetails = $this->OrderDetails
                    ->find()
                    ->contain('Products')
                    ->where([
                        'order_id' => $idOrder
                    ]);

                $querySaldo = $this->Customers->query();
                $querySaldo->update()
                    ->set(['saldo' => $saldoBaru ])
                    ->where(['user_id' => $user_id])
                    ->execute();

                foreach($orderDetails as $od){
                    //dd($od);
                    $query = $this->Products->query();
                    $query->update()
                        ->set(['stock' => $od->product->stock - $od->qty ])
                        ->where(['id' => $od->product_id])
                        ->execute();
                }

                //In Coupons Controller
                $truncate = $this->Carts->connection()->transactional(function ($conn) {
                    $sqls = $this->Carts->schema()->truncateSql($this->Carts->connection());
                    foreach ($sqls as $sql) {
                        $this->Carts->connection()->execute($sql)->execute();
                    }
                });

                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['controller' => 'Pages', 'action' => 'invoice',$user_id]);
            }

            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }

    }

    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
