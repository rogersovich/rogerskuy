<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{   

    public $components = [
        'Acl' => [
            'className' => 'Acl.Acl'
        ]
    ];

    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Customers');
        $this->loadModel('Products');
        $this->loadModel('Categories');

        if($this->request->prefix == 'admin'){

            $this->loadComponent('Auth', [
                'authorize' => [
                    'Acl.Actions' => ['actionPath' => 'controllers/']
                ],
                'loginAction' => [
                    'controller' => 'Users',
                    'action' => 'login',
                    'prefix' => 'admin'
                ],
                'loginRedirect' => [
                    'prefix' => 'admin',
                    'controller' => 'Products',
                    'action' => 'index'
                ],
                'logoutRedirect' => [
                    'prefix' => false,
                    'controller' => 'Pages',
                    'action' => 'index'
                ],
                'unauthorizedRedirect' => [
                    'controller' => 'Users',
                    'action' => 'login',
                    'prefix' => 'admin'
                ],
                'authError' => 'You are not authorized to access that location.',
                'flash' => [
                    'element' => 'error'
                ]
            ]);

            if($this->Auth->user('id') == null){

            }else{
                $id = $this->Auth->user('id');
                
                $user = $this->Users->get($id);
                //dd($id);

                $this->set(compact('user'));
            }

        }else{

           $this->loadComponent('Auth', [
                    'authenticate' => [
                        'Form' => [
                            'userModel' => 'Users',
                            'fields' => ['username' => 'username', 'password' => 'password'],
                        ]
                    ],
                    'loginAction' => [
                        'controller' => 'Customers',
                        'action' => 'login'
                    ],
                    'loginRedirect' => [
                        'controller' => 'Pages',
                        'action' => 'index'
                    ],
                    'logoutRedirect' => [
                        'prefix' => false,
                        'controller' => 'Pages',
                        'action' => 'index'
                    ],
                    'unauthorizedRedirect' => [
                        'controller' => 'Customers',
                        'action' => 'login',
                    ],
                    'authError' => 'You are not authorized to access that location.',
                    'flash' => [
                        'element' => 'error'
                    ]
                ]);

            if($this->Auth->user('id') == null){

            }else{
                $id = $this->Auth->user('id');
                
                $user = $this->Users->get($id);
                //dd($id);

                $this->set(compact('user'));
            }

        }


        // $products = $this->Products->find('all');
        // $productCategory = $this->Products->find('all', [
        //     'contain' => ['Categories']
        // ]);

        //dd($productCategory->all());

        //$this->set(compact('products','productCategory'));
             
    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->getType(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
