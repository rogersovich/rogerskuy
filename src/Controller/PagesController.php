<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use Cake\ORM\Query;


class PagesController extends AppController
{

     public function initialize()
    {
       parent::initialize();
       $this->Auth->allow([
            'index',
            'category',
            'about',
            'shop'
       ]);
    }

    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function index() {

        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Carts');
        $this->loadModel('Customers');

        $products = $this->Products->find('all');

        $message = [];

        if ($this->request->is('post')) {
            
            $data = $this->request->getData();

            $productCategory = $this->Products->find('all')
                ->contain(['Categories'])
                ->where([
                    'name LIKE' => '%'.$data['text_search'].'%'
                ]);

            $sr = [];
            foreach ($productCategory as $pc) {
                $sr[]  = $pc;
            }

            if($sr == null){
                $message = "No products were found matching your selection.";
            }


            $sr = $data['text_search'];

        }else{

            $productCategory = $this->Products->find('all', [
                'contain' => ['Categories']
            ]);

            $sr = null;

        }

        $cartTot = $this->Carts->find('all')
            ->select(['qty']);

        $res = [];

        foreach($cartTot as $c){
            $res[] = $c->qty;
        }

        if($this->Auth->user('id') == null){
            $member = [];
        }else{
            $id = $this->Auth->user('id');
                
            $user = $this->Users->get($id);
            
            $member = $this->Customers->find('all')
                ->contain(['Users'])
                ->where([
                    'user_id' => $user->id
                ])
                ->first();
        }

        //dd($productCategory->all());

        $this->set(compact('products','productCategory','res','member','message','sr'));
    }

    public function addSaldo($id = null){

        $this->loadModel('Customers');

        $customer = $this->Customers->get($id);
        //dd($customer);

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $data = $this->request->getData();
            //dd($data);

            $query = $this->Customers->query();
            $query->update()
                ->set(['saldo' => $customer->saldo + $data['saldo'] ])
                ->where(['id' => $id])
                ->execute();

            $this->Flash->success(__('Saldo Telah Ter-Update'));

            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('customer'));
    }

    public function category($param = null)
    {
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Carts');
        $this->loadModel('Customers');

        if($this->Auth->user('id') == null){
            $member = [];
        }else{
            $id = $this->Auth->user('id');
                
            $user = $this->Users->get($id);
            
            $member = $this->Customers->find('all')
                ->contain(['Users'])
                ->where([
                    'user_id' => $user->id
                ])
                ->first();
        }

        //dd($member);

        $carts = $this->Carts->find('all')
            ->select(['qty']);

        $res = [];

        foreach($carts as $c){
            $res[] = $c->qty;
        }

        if($param == 'all'){
            $productCategory = $this->Products->find('all', [
                'contain' => ['Categories']
            ]);
            
        }else{
            $productCategory = $this->Products->find('all', [
            'contain' => ['Categories']
        ])
                ->where([
                    'name LIKE' => '%'. $param .'%' 
                ]); 
        }

        //dd($productCategory->all());

        $this->set(compact('productCategory','res','member'));

        //dd($productCategory->all());
    }

    public function shop($param,$params){

        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Carts');
        $this->loadModel('Customers');

        if($this->Auth->user('id') == null){
            $member = [];
        }else{
            $id = $this->Auth->user('id');
                
            $user = $this->Users->get($id);
            
            $member = $this->Customers->find('all')
                ->contain(['Users'])
                ->where([
                    'user_id' => $user->id
                ])
                ->first();
        }

        $carts = $this->Carts->find('all')
            ->select(['qty']);

        $res = [];

        foreach($carts as $c){
            $res[] = $c->qty;
        }
        
        $products = $this->Products->find('all');

        if($param == 't-shirts'){

            $slug = str_replace('t-shirt-', '', $params);
            $slug1 = str_replace('t-shirts', 't-shirt', $param);

            $titleSlug = $slug1.' '.$slug; 


        }else if($param == 'shirts'){

            $titleSlug = str_replace('-', ' ', $params); 
            //dd($titleSlug);
        }else{
            $titleSlug = str_replace('-', ' ', $params); 
        }   

        //dd($titleSlug);

        $productCategory = $this->Products->find('all')
            ->where([
                'name = ' => $titleSlug 
            ]);

        $id_product = [];
        foreach($productCategory as $pc => $key){
            $id_product = $key->id;
        }

        //dd($id_product);

        $cart = $this->Carts->find('all')
            ->select([
                'qty'
            ])
            ->where([
                'product_id' => $id_product
            ]);

        $resCart = [];

        foreach($cart as $c){
            $resCart[] = $c->qty;
        }

        $rc = array_sum($resCart);

        //dd($rc);

        $this->set(compact('productCategory','products','res','rc','member'));

    }

    public function about(){

        $this->loadModel('Carts');
        $this->loadModel('Customers');

        if($this->Auth->user('id') == null){
            $member = [];
        }else{
            $id = $this->Auth->user('id');
                
            $user = $this->Users->get($id);
            
            $member = $this->Customers->find('all')
                ->contain(['Users'])
                ->where([
                    'user_id' => $user->id
                ])
                ->first();
        }

        $carts = $this->Carts->find('all')
            ->select(['qty']);

        $res = [];

        foreach($carts as $c){
            $res[] = $c->qty;
        }


        $this->set(compact('member','res'));
    }

    public function report(){

        $this->loadModel('Orders');
        $this->loadModel('OrderDetails');

        if($this->request->is('post')){

            $cek = $this->request->getData();
            
            if(!empty($cek['month'])){

                $bulan = date('m',strtotime($cek['month']));
                $tahun = date('Y',strtotime($cek['month']));

                //dd($bulan);

                 $data = $this->Orders->find('all', [
                    'contain' => [
                        'OrderDetails.Products'
                        ],
                    'conditions' => [
                        'MONTH(date)' => $bulan,
                        'YEAR(date)' => $tahun
                    ]
                            
                ]);



            }elseif(!empty($cek['year'])) {

                $tahun = $cek['year'];
                
                $data = $this->Orders->find('all', [
                    'contain' => [
                        'OrderDetails.Products'
                        ],
                    'conditions' => [
                        'YEAR(date)' => $tahun
                    ]
                            
                ]);

            }else{

                $from = $cek['from'];
                $to = $cek['to'];
                // dd($from);

                $data = $this->Orders->find('all', [
                    'contain' => [
                        'OrderDetails.Products'
                        ],
                    'conditions' => [
                        'date >=' => $from,
                        'date <=' => $to 
                    ]
                            
                ]);
            }

            //dd($data->all());

            $this->set(compact('data'));

            Configure::write('CakePdf', [
                        'engine' => [
                            'className' => 'CakePdf.WkHtmlToPdf',
                            'binary'    => 'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe',
                            'options'   => [
                                'print-media-type' => false,
                                'outline'          => true,
                                'dpi'              => 96
                            ],
                        ],
                        'margin' => [
                            'bottom' => 30,
                            'left'   => 25,
                            'right'  => 25,
                            'top'    => 30
                        ],

                        'pageSize' => 'A4',
                        'download' => false
                    ]);


                    $cek = $this->viewBuilder()->layout('report');
                    //dd($cek);
                    $this->RequestHandler->renderAs($this, 'pdf');

        }
    }

    public function invoice($id = null){

        $this->loadModel('Products');
        $this->loadModel('OrderDetails');
        $this->loadModel('Orders');
        $this->loadModel('Customers');

        $customer = $this->Customers->find('all')
            ->where([
                'user_id' => $id
            ])
            ->first();

        $saldoAkhir = $customer->saldo;

        //dd($saldoAkhir);

        $orderAja = $this->Orders
            ->find()
            ->order(['code' => 'DESC'])
            ->first();

        $order = $this->Orders
            ->find()
            ->where([
                'id' => $orderAja->id
            ])
            ->first();

        //dd($order);

        $idOrder = $orderAja->id;

        $orderDetails = $this->OrderDetails
            ->find()
            ->contain('Products')
            ->where([
                'order_id' => $idOrder
        ]);

        
        if($this->request->is('post')){

            Configure::write('CakePdf', [
                        'engine' => [
                            'className' => 'CakePdf.WkHtmlToPdf',
                            'binary'    => 'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe',
                            'options'   => [
                                'print-media-type' => false,
                                'outline'          => true,
                                'dpi'              => 96
                            ],
                        ],
                        'margin' => [
                            'bottom' => 30,
                            'left'   => 25,
                            'right'  => 25,
                            'top'    => 30
                        ],

                        'pageSize' => 'A4',
                        'download' => false
                    ]);


                    $cek = $this->viewBuilder()->layout('index');
                    //dd($cek);
                    $this->RequestHandler->renderAs($this, 'pdf');
            
        }


        $this->set(compact('orderDetails','order','saldoAkhir','customer'));



    }

}
