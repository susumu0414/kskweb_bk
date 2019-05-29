<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TkUpdatelogFiles Controller
 *
 * @property \App\Model\Table\TkUpdatelogFilesTable $TkUpdatelogFiles
 *
 * @method \App\Model\Entity\TkUpdatelogFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TkUpdatelogFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tkUpdatelogFiles = $this->paginate($this->TkUpdatelogFiles);

        $this->set(compact('tkUpdatelogFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Tk Updatelog File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tkUpdatelogFile = $this->TkUpdatelogFiles->get($id, [
            'contain' => []
        ]);

        $this->set('tkUpdatelogFile', $tkUpdatelogFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tkUpdatelogFile = $this->TkUpdatelogFiles->newEntity();
        if ($this->request->is('post')) {
            $tkUpdatelogFile = $this->TkUpdatelogFiles->patchEntity($tkUpdatelogFile, $this->request->getData());
            if ($this->TkUpdatelogFiles->save($tkUpdatelogFile)) {
                $this->Flash->success(__('The tk updatelog file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tk updatelog file could not be saved. Please, try again.'));
        }
        $this->set(compact('tkUpdatelogFile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tk Updatelog File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tkUpdatelogFile = $this->TkUpdatelogFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tkUpdatelogFile = $this->TkUpdatelogFiles->patchEntity($tkUpdatelogFile, $this->request->getData());
            if ($this->TkUpdatelogFiles->save($tkUpdatelogFile)) {
                $this->Flash->success(__('The tk updatelog file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tk updatelog file could not be saved. Please, try again.'));
        }
        $this->set(compact('tkUpdatelogFile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tk Updatelog File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tkUpdatelogFile = $this->TkUpdatelogFiles->get($id);
        if ($this->TkUpdatelogFiles->delete($tkUpdatelogFile)) {
            $this->Flash->success(__('The tk updatelog file has been deleted.'));
        } else {
            $this->Flash->error(__('The tk updatelog file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
