<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    // public function initialize()
    // {
    //     $this->loadComponent('Flash');
    //     $this->loadComponent('Auth', [
    //         'loginRedirect' => [
    //             'controller' => 'Articles',
    //             'action' => 'index'
    //         ],
    //         'logoutRedirect' => [
    //             'controller' => 'Pages',
    //             'action' => 'display',
    //             'home'
    //         ]
    //     ]);
    // }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view', 'display']);
    }
    //...

    public function initialize()
    {
	$this->loadComponent('Flash');
	$this->loadComponent('Auth', [
				      'authorize' => ['Controller'], // Added this line
				      'loginRedirect' => [
							  'controller' => 'Articles',
							  'action' => 'index'
							  ],
				      'logoutRedirect' => [
							   'controller' => 'Pages',
							   'action' => 'display',
							   'home'
							   ]
				      ]);
    }

    public function isAuthorized($user)
    {
	// Admin can access every action
	if (isset($user['role']) && $user['role'] === 'admin') {
	    return true;
	}

	// Default deny
	return false;
    }
    
    // public function initialize()
    // {
    //     parent::initialize();
    //     $this->loadComponent('Flash');
    // }
}
