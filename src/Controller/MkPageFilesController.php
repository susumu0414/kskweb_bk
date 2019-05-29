<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkPageFiles Controller
 *
 * @property \App\Model\Table\MkPageFilesTable $MkPageFiles
 *
 * @method \App\Model\Entity\MkPageFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkPageFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mkPageFiles = $this->paginate($this->MkPageFiles);

        $this->set(compact('mkPageFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Mk Page File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkPageFile = $this->MkPageFiles->get($id, [
            'contain' => ['MkAuthFiles']
        ]);

        $this->set('mkPageFile', $mkPageFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkPageFile = $this->MkPageFiles->newEntity();
        if ($this->request->is('post')) {
            $mkPageFile = $this->MkPageFiles->patchEntity($mkPageFile, $this->request->getData());
            if ($this->MkPageFiles->save($mkPageFile)) {
                $this->Flash->success(__('The mk page file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk page file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkPageFile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Page File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkPageFile = $this->MkPageFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkPageFile = $this->MkPageFiles->patchEntity($mkPageFile, $this->request->getData());
            if ($this->MkPageFiles->save($mkPageFile)) {
                $this->Flash->success(__('The mk page file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk page file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkPageFile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Page File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkPageFile = $this->MkPageFiles->get($id);
        if ($this->MkPageFiles->delete($mkPageFile)) {
            $this->Flash->success(__('The mk page file has been deleted.'));
        } else {
            $this->Flash->error(__('The mk page file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
