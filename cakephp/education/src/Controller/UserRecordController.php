<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserRecord Controller
 *
 * @property \App\Model\Table\UserRecordTable $UserRecord
 */
class UserRecordController extends AppController
{

    public function isAuthorized($user)
    {
	// All registered users can add articles
	if ($this->request->action === 'add') {
	    return true;
	}

	// The owner of an article can edit and delete it
	if (in_array($this->request->action, ['edit', 'delete'])) {
	    $articleId = (int)$this->request->params['pass'][0];
	    if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
		return true;
	    }
	}

	return parent::isAuthorized($user);
    }

    public function add()
    {
	$article = $this->Articles->newEntity();
	if ($this->request->is('post')) {
	    $article = $this->Articles->patchEntity($article, $this->request->data);
	    // Added this line
	    $article->user_id = $this->Auth->user('id');
	    // You could also do the following
	    //$newData = ['user_id' => $this->Auth->user('id')];
	    //$article = $this->Articles->patchEntity($article, $newData);
	    if ($this->Articles->save($article)) {
		$this->Flash->success(__('Your article has been saved.'));
		return $this->redirect(['action' => 'index']);
	    }
	    $this->Flash->error(__('Unable to add your article.'));
	}
	$this->set('article', $article);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('userRecord', $this->paginate($this->UserRecord));
        $this->set('_serialize', ['userRecord']);
    }

    /**
     * View method
     *
     * @param string|null $id User Record id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userRecord = $this->UserRecord->get($id, [
            'contain' => []
        ]);
        $this->set('userRecord', $userRecord);
        $this->set('_serialize', ['userRecord']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $userRecord = $this->UserRecord->newEntity();
    //     if ($this->request->is('post')) {
    //         $userRecord = $this->UserRecord->patchEntity($userRecord, $this->request->data);
    //         if ($this->UserRecord->save($userRecord)) {
    //             $this->Flash->success(__('The user record has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The user record could not be saved. Please, try again.'));
    //         }
    //     }
    //     $this->set(compact('userRecord'));
    //     $this->set('_serialize', ['userRecord']);
    // }

    /**
     * Edit method
     *
     * @param string|null $id User Record id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRecord = $this->UserRecord->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRecord = $this->UserRecord->patchEntity($userRecord, $this->request->data);
            if ($this->UserRecord->save($userRecord)) {
                $this->Flash->success(__('The user record has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user record could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('userRecord'));
        $this->set('_serialize', ['userRecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Record id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userRecord = $this->UserRecord->get($id);
        if ($this->UserRecord->delete($userRecord)) {
            $this->Flash->success(__('The user record has been deleted.'));
        } else {
            $this->Flash->error(__('The user record could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
