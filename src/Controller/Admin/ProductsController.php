<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('Categories');

        $products = $this->paginate($this->Products, [
            'contain' => ['Categories']
        ]);

        //dd($products);

        $this->set(compact('products'));
    }

    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['OrderDetails']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Categories');
        
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $request = $this->request->getData();
            $request['date'] = date('Y-m-d');
            //dd($request);
            $product = $this->Products->patchEntity($product, $request);
            //dd($product);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        //dd($categories);
        $this->set(compact('product','categories'));
    }

    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);

        $fl = str_replace('.jpg', '', $product->file);

        //dd($flThumbnail);

        $dirAja = str_replace('\\src', '', APP).$product->file_dir;
        $dir = new Folder($dirAja);
        $files = [];
        $files = $dir->find('.*'.$fl.'\.jpg');

        if ($this->request->is(['patch', 'post', 'put'])) {

            foreach ($files as $file) {
                $file = new File($dir->pwd() . DS . $file);
                //dd($file);
                $file->delete();
            } 
            
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product','categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
