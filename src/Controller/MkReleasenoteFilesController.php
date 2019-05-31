<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkReleasenoteFiles Controller
 *
 * @property \App\Model\Table\MkReleasenoteFilesTable $MkReleasenoteFiles
 *
 * @method \App\Model\Entity\MkReleasenoteFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkReleasenoteFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mkReleasenoteFiles = $this->paginate($this->MkReleasenoteFiles);

        $this->set(compact('mkReleasenoteFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Mk Releasenote File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkReleasenoteFile = $this->MkReleasenoteFiles->get($id, [
            'contain' => []
        ]);

        $this->set('mkReleasenoteFile', $mkReleasenoteFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkReleasenoteFile = $this->MkReleasenoteFiles->newEntity();
        if ($this->request->is('post')) {
            $mkReleasenoteFile = $this->MkReleasenoteFiles->patchEntity($mkReleasenoteFile, $this->request->getData());
            if ($this->MkReleasenoteFiles->save($mkReleasenoteFile)) {
                $this->Flash->success(__('The mk releasenote file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk releasenote file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkReleasenoteFile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Releasenote File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkReleasenoteFile = $this->MkReleasenoteFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkReleasenoteFile = $this->MkReleasenoteFiles->patchEntity($mkReleasenoteFile, $this->request->getData());
            if ($this->MkReleasenoteFiles->save($mkReleasenoteFile)) {
                $this->Flash->success(__('The mk releasenote file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk releasenote file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkReleasenoteFile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Releasenote File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkReleasenoteFile = $this->MkReleasenoteFiles->get($id);
        if ($this->MkReleasenoteFiles->delete($mkReleasenoteFile)) {
            $this->Flash->success(__('The mk releasenote file has been deleted.'));
        } else {
            $this->Flash->error(__('The mk releasenote file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
