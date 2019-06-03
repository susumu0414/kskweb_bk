<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkMenueFiles Controller
 *
 * @property \App\Model\Table\MkMenueFilesTable $MkMenueFiles
 *
 * @method \App\Model\Entity\MkMenueFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkMenueFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MkPageFiles','MkMenueKbnFiles']
        ];
        $mkMenueFiles = $this->paginate($this->MkMenueFiles);

        $this->set(compact('mkMenueFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Mk Menue File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkMenueFile = $this->MkMenueFiles->get($id, [
            'contain' => ['MkPageFiles']
        ]);

        $this->set('mkMenueFile', $mkMenueFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkMenueFile = $this->MkMenueFiles->newEntity();
        if ($this->request->is('post')) {
            $mkMenueFile = $this->MkMenueFiles->patchEntity($mkMenueFile, $this->request->getData());
            if ($this->MkMenueFiles->save($mkMenueFile)) {
                $this->Flash->success(__('The mk menue file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk menue file could not be saved. Please, try again.'));
        }
        $mkPageFiles = $this->MkMenueFiles->MkPageFiles->find('list', ['limit' => 200]);
        $mkMenueKbnFiles = $this->MkMenueFiles->MkMenueKbnFiles->find('list', ['limit' => 200]);
        $this->set(compact('mkMenueFile', 'mkMenueKbnFiles','mkPageFiles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Menue File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkMenueFile = $this->MkMenueFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkMenueFile = $this->MkMenueFiles->patchEntity($mkMenueFile, $this->request->getData());
            if ($this->MkMenueFiles->save($mkMenueFile)) {
                $this->Flash->success(__('The mk menue file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk menue file could not be saved. Please, try again.'));
        }
        $mkPageFiles = $this->MkMenueFiles->MkPageFiles->find('list', ['limit' => 200]);
        $this->set(compact('mkMenueFile', 'mkPageFiles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Menue File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkMenueFile = $this->MkMenueFiles->get($id);
        if ($this->MkMenueFiles->delete($mkMenueFile)) {
            $this->Flash->success(__('The mk menue file has been deleted.'));
        } else {
            $this->Flash->error(__('The mk menue file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
