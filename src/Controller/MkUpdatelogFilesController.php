<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkUpdatelogFiles Controller
 *
 * @property \App\Model\Table\MkUpdatelogFilesTable $MkUpdatelogFiles
 *
 * @method \App\Model\Entity\MkUpdatelogFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkUpdatelogFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mkUpdatelogFiles = $this->paginate($this->MkUpdatelogFiles);

        $this->set(compact('mkUpdatelogFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Mk Updatelog File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkUpdatelogFile = $this->MkUpdatelogFiles->get($id, [
            'contain' => []
        ]);

        $this->set('mkUpdatelogFile', $mkUpdatelogFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkUpdatelogFile = $this->MkUpdatelogFiles->newEntity();
        if ($this->request->is('post')) {
            $mkUpdatelogFile = $this->MkUpdatelogFiles->patchEntity($mkUpdatelogFile, $this->request->getData());
            if ($this->MkUpdatelogFiles->save($mkUpdatelogFile)) {
                $this->Flash->success(__('The mk updatelog file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk updatelog file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkUpdatelogFile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Updatelog File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkUpdatelogFile = $this->MkUpdatelogFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkUpdatelogFile = $this->MkUpdatelogFiles->patchEntity($mkUpdatelogFile, $this->request->getData());
            if ($this->MkUpdatelogFiles->save($mkUpdatelogFile)) {
                $this->Flash->success(__('The mk updatelog file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk updatelog file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkUpdatelogFile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Updatelog File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkUpdatelogFile = $this->MkUpdatelogFiles->get($id);
        if ($this->MkUpdatelogFiles->delete($mkUpdatelogFile)) {
            $this->Flash->success(__('The mk updatelog file has been deleted.'));
        } else {
            $this->Flash->error(__('The mk updatelog file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
