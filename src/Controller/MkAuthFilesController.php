<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkAuthFiles Controller
 *
 * @property \App\Model\Table\MkAuthFilesTable $MkAuthFiles
 *
 * @method \App\Model\Entity\MkAuthFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkAuthFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MkPageFiles']
        ];
        $mkAuthFiles = $this->paginate($this->MkAuthFiles);

        $this->set(compact('mkAuthFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Mk Auth File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkAuthFile = $this->MkAuthFiles->get($id, [
            'contain' => ['MkPageFiles']
        ]);

        $this->set('mkAuthFile', $mkAuthFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkAuthFile = $this->MkAuthFiles->newEntity();
        if ($this->request->is('post')) {
            $mkAuthFile = $this->MkAuthFiles->patchEntity($mkAuthFile, $this->request->getData());
            if ($this->MkAuthFiles->save($mkAuthFile)) {
                $this->Flash->success(__('The mk auth file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk auth file could not be saved. Please, try again.'));
        }
        $mkPageFiles = $this->MkAuthFiles->MkPageFiles->find('list', ['limit' => 200]);
        $this->set(compact('mkAuthFile', 'mkPageFiles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Auth File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkAuthFile = $this->MkAuthFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkAuthFile = $this->MkAuthFiles->patchEntity($mkAuthFile, $this->request->getData());
            if ($this->MkAuthFiles->save($mkAuthFile)) {
                $this->Flash->success(__('The mk auth file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk auth file could not be saved. Please, try again.'));
        }
        $mkPageFiles = $this->MkAuthFiles->MkPageFiles->find('list', ['limit' => 200]);
        $this->set(compact('mkAuthFile', 'mkPageFiles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Auth File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkAuthFile = $this->MkAuthFiles->get($id);
        if ($this->MkAuthFiles->delete($mkAuthFile)) {
            $this->Flash->success(__('The mk auth file has been deleted.'));
        } else {
            $this->Flash->error(__('The mk auth file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
