<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MkMenueKbnFiles Controller
 *
 * @property \App\Model\Table\MkMenueKbnFilesTable $MkMenueKbnFiles
 *
 * @method \App\Model\Entity\MkMenueKbnFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkMenueKbnFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mkMenueKbnFiles = $this->paginate($this->MkMenueKbnFiles);

        $this->set(compact('mkMenueKbnFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Mk Menue Kbn File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkMenueKbnFile = $this->MkMenueKbnFiles->get($id, [
            'contain' => ['MkMenueFiles']
        ]);

        $this->set('mkMenueKbnFile', $mkMenueKbnFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkMenueKbnFile = $this->MkMenueKbnFiles->newEntity();
        if ($this->request->is('post')) {
            $mkMenueKbnFile = $this->MkMenueKbnFiles->patchEntity($mkMenueKbnFile, $this->request->getData());
            if ($this->MkMenueKbnFiles->save($mkMenueKbnFile)) {
                $this->Flash->success(__('The mk menue kbn file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk menue kbn file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkMenueKbnFile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Menue Kbn File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkMenueKbnFile = $this->MkMenueKbnFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkMenueKbnFile = $this->MkMenueKbnFiles->patchEntity($mkMenueKbnFile, $this->request->getData());
            if ($this->MkMenueKbnFiles->save($mkMenueKbnFile)) {
                $this->Flash->success(__('The mk menue kbn file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk menue kbn file could not be saved. Please, try again.'));
        }
        $this->set(compact('mkMenueKbnFile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Menue Kbn File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkMenueKbnFile = $this->MkMenueKbnFiles->get($id);
        if ($this->MkMenueKbnFiles->delete($mkMenueKbnFile)) {
            $this->Flash->success(__('The mk menue kbn file has been deleted.'));
        } else {
            $this->Flash->error(__('The mk menue kbn file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
