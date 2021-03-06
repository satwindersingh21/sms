<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * SentMessages Controller
 *
 * @property \App\Model\Table\SentMessagesTable $SentMessages
 *
 * @method \App\Model\Entity\SentMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SentMessagesController extends AppController {
    
    public function initialize() {
        parent::initialize();
        if(!$this->Auth->user('has_plan')){
            return $this->redirect(['controller'=>'Users','action' => 'index']);
        }
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $sentMessages = $this->paginate($this->SentMessages->find()->where(['SentMessages.user_id'=>$this->Auth->user('id')]));
        
        $this->earningStats($this->Auth->user('id'));
        
        $this->set(compact('sentMessages'));
        
    }
    
    /**
     * View method
     *
     * @param string|null $id Sent Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $sentMessage = $this->SentMessages->get($id, [
            'contain' => ['Users']
        ]);
        
        $this->set('sentMessage', $sentMessage);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $sentMessage = $this->SentMessages->newEntity();
        
        $this->set(compact('sentMessage'));
    }
    
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function send() {
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        $sentMessage = $this->SentMessages->newEntity();
        sleep(rand(2,10));
        if ($this->request->is('post')) {
            $sentMessage = $this->SentMessages->patchEntity($sentMessage, $this->request->getData());
            if ($this->SentMessages->save($sentMessage)) {
                $this->responseMessage = "Successfully Sent";
                $this->responseCode = SUCCESS_CODE;
            } else {
                $this->getErrorMessage($sentMessage->errors());
                $this->responseCode = CODE_BAD_REQUEST;
            }
        }
        echo $this->responseFormat();
    }
    
    
    
    /**
     * Edit method
     *
     * @param string|null $id Sent Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $sentMessage = $this->SentMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sentMessage = $this->SentMessages->patchEntity($sentMessage, $this->request->getData());
            if ($this->SentMessages->save($sentMessage)) {
                $this->Flash->success(__('The sent message has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sent message could not be saved. Please, try again.'));
        }
        $users = $this->SentMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('sentMessage', 'users'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Sent Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        return $this->redirect(['controller'=>'Users','action' => 'index']);
        $this->request->allowMethod(['post', 'delete']);
        $sentMessage = $this->SentMessages->get($id);
        if ($this->SentMessages->delete($sentMessage)) {
            $this->Flash->success(__('The sent message has been deleted.'));
        } else {
            $this->Flash->error(__('The sent message could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
