<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkNewsFiles Controller
 *
 * @property \App\Model\Table\MkNewsFilesTable $MkNewsFiles
 *
 * @method \App\Model\Entity\MkNewsFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkNewsFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mkNewsFiles = $this->paginate($this->MkNewsFiles);

        $this->set(compact('mkNewsFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Mk News File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkNewsFile = $this->MkNewsFiles->get($id, [
            'contain' => []
        ]);

        $this->set('mkNewsFile', $mkNewsFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkNewsFile = $this->MkNewsFiles->newEntity();
        if ($this->request->is('post')) {
            $mkNewsFile = $this->MkNewsFiles->patchEntity($mkNewsFile, $this->request->getData());
            if ($this->MkNewsFiles->save($mkNewsFile)) {
                $this->Flash->success(__('The mk news file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk news file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkNewsFile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk News File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkNewsFile = $this->MkNewsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkNewsFile = $this->MkNewsFiles->patchEntity($mkNewsFile, $this->request->getData());
            if ($this->MkNewsFiles->save($mkNewsFile)) {
                $this->Flash->success(__('The mk news file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk news file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkNewsFile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk News File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkNewsFile = $this->MkNewsFiles->get($id);
        if ($this->MkNewsFiles->delete($mkNewsFile)) {
            $this->Flash->success(__('The mk news file has been deleted.'));
        } else {
            $this->Flash->error(__('The mk news file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
