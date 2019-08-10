<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Core\Configure;


class CartsController extends AppController
{
    
    public function index()
    {   
        $this->loadModel('Products');

        $products = $this->Products->find('all');

        // get user

        if($this->Auth->user('id') == null){

        }else{
            $id = $this->Auth->user('id');
                
            $user = $this->Users->get($id);
            $saldo = $this->Customers->find('all')
                ->select(['saldo'])
                ->where([
                    'user_id' => $user->id
                ])
                ->first();
            //dd($saldo);

            $this->set(compact('saldo'));
        }

        // end

        $this->paginate = [
            'contain' => ['Products']
        ];

        $carts = $this->Carts->find('all')
            ->contain([
                'Products'
            ]);

        //dd($carts);

        $cartTot = $this->Carts->find('all')
            ->select(['qty']);

        $res = [];
        foreach($cartTot as $c){
            $res[] = $c->qty;
        }

        $price = $this->Carts->find('all')
            ->select(['price','qty']);

        $res1 = [];
        foreach($price as $p){
            $res1[] = $p->price * $p->qty;
        }

        $totals = array_sum($res1);
        //dd($total);


        $this->set(compact('carts','res','totals','products'));
    }


    public function view($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('cart', $cart);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Products');

        $cart = $this->Carts->newEntity();

        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $passing = explode('/', $data['params']);
            $cekQty = (int)$data['stock_dulu'] >= (int)$data['qty'];

            $cart = $this->Carts->patchEntity($cart, $this->request->getData());

            $cartDulu = $this->Carts->find('all')
                ->where([
                    'product_id' => $data['product_id'],
                    'size' => $data['size']
                ])
                ->first();

            $product = $this->Products->get($data['product_id']);
            
            //dd($cartDulu);
            
            
            if($cekQty){

                if($cartDulu == null){
                    if ($this->Carts->save($cart)) {
                        $this->Flash->success(__('Product Berhasil Di Tambahkan'));

                        return $this->redirect(['controller' => 'Pages', 'action' => 'shop',$passing[0], $passing[1] ]);
                    }

                }else{

                    $cekProduct = $product->id == $cart->product_id && $data['size'] == $cartDulu->size;

                    if($cekProduct){
                        $query = $this->Carts->query();
                        //dd($query);
                        $query->update()
                            ->set(['qty' => $data['qty'] + $cartDulu->qty  ])
                            ->where([
                                'product_id' => $data['product_id'],
                                'size' => $data['size']
                            ])
                            ->execute();

                        $this->Flash->success(__('Product Anda Telah Di Update.'));

                        return $this->redirect(['controller' => 'Pages', 'action' => 'shop',$passing[0], $passing[1] ]);

                    }

                }
            

                

            }else{
               $this->Flash->error(__('Jumlah Stok Tidak Cukup.')); 

               return $this->redirect(['controller' => 'Pages', 'action' => 'shop',$passing[0], $passing[1] ]);
            }

            
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }

        //$products = $this->Carts->Products->find('list', ['limit' => 200]);
        //$this->set(compact('cart', 'products'));
    }

    
    public function edit($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $products = $this->Carts->Products->find('list', ['limit' => 200]);
        $this->set(compact('cart', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Carts->get($id);
        if ($this->Carts->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
