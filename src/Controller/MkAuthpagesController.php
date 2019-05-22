<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkAuthpages Controller
 *
 * @property \App\Model\Table\MkAuthpagesTable $MkAuthpages
 *
 * @method \App\Model\Entity\MkAuthpage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkAuthpagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MkPages']
        ];
        $mkAuthpages = $this->paginate($this->MkAuthpages);

        $this->set(compact('mkAuthpages'));
    }

    /**
     * View method
     *
     * @param string|null $id Mk Authpage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkAuthpage = $this->MkAuthpages->get($id, [
            'contain' => ['MkPages']
        ]);

        $this->set('mkAuthpage', $mkAuthpage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkAuthpage = $this->MkAuthpages->newEntity();
        if ($this->request->is('post')) {
            $mkAuthpage = $this->MkAuthpages->patchEntity($mkAuthpage, $this->request->getData());
            if ($this->MkAuthpages->save($mkAuthpage)) {
                $this->Flash->success(__('The mk authpage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk authpage could not be saved. Please, try again.'));
        }
        $mkPages = $this->MkAuthpages->MkPages->find('list', ['limit' => 200]);
        $this->set(compact('mkAuthpage', 'mkPages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Authpage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkAuthpage = $this->MkAuthpages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkAuthpage = $this->MkAuthpages->patchEntity($mkAuthpage, $this->request->getData());
            if ($this->MkAuthpages->save($mkAuthpage)) {
                $this->Flash->success(__('The mk authpage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk authpage could not be saved. Please, try again.'));
        }
        $mkPages = $this->MkAuthpages->MkPages->find('list', ['limit' => 200]);
        $this->set(compact('mkAuthpage', 'mkPages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Authpage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkAuthpage = $this->MkAuthpages->get($id);
        if ($this->MkAuthpages->delete($mkAuthpage)) {
            $this->Flash->success(__('The mk authpage has been deleted.'));
        } else {
            $this->Flash->error(__('The mk authpage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
