<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkPages Controller
 *
 * @property \App\Model\Table\MkPagesTable $MkPages
 *
 * @method \App\Model\Entity\MkPage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkPagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Pages', 'Categories']
        // ];
        $mkPages = $this->paginate($this->MkPages);

        $this->set(compact('mkPages'));
        // $mkPages = $this->MkPages->find('all')->limit(10);
    }

    /**
     * View method
     *
     * @param string|null $id Mk Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkPage = $this->MkPages->get($id, [
            'contain' => ['Pages', 'Categories']
        ]);

        $this->set('mkPage', $mkPage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkPage = $this->MkPages->newEntity();
        if ($this->request->is('post')) {
            $mkPage = $this->MkPages->patchEntity($mkPage, $this->request->getData());
            if ($this->MkPages->save($mkPage)) {
                $this->Flash->success(__('The mk page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk page could not be saved. Please, try again.'));
        }
        // $pages = $this->MkPages->Pages->find('list', ['limit' => 200]);
        // $categories = $this->MkPages->Categories->find('list', ['limit' => 200]);
        // $this->set(compact('mkPage', 'pages', 'categories'));
        $this->set(compact('mkPage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkPage = $this->MkPages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkPage = $this->MkPages->patchEntity($mkPage, $this->request->getData());
            if ($this->MkPages->save($mkPage)) {
                $this->Flash->success(__('The mk page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk page could not be saved. Please, try again.'));
        }
        $pages = $this->MkPages->Pages->find('list', ['limit' => 200]);
        $categories = $this->MkPages->Categories->find('list', ['limit' => 200]);
        $this->set(compact('mkPage', 'pages', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkPage = $this->MkPages->get($id);
        if ($this->MkPages->delete($mkPage)) {
            $this->Flash->success(__('The mk page has been deleted.'));
        } else {
            $this->Flash->error(__('The mk page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
