<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TkUpdatelogs Controller
 *
 * @property \App\Model\Table\TkUpdatelogsTable $TkUpdatelogs
 *
 * @method \App\Model\Entity\TkUpdatelog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TkUpdatelogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tkUpdatelogs = $this->paginate($this->TkUpdatelogs);

        $this->set(compact('tkUpdatelogs'));
    }

    public function test()
    {
        if ($this->request->is(['post', 'put'])) {
          $this->log("エンティティ2：".$this->request->data('sample'), LOG_DEBUG);
          $entity = $this->TkUpdatelogs->newEntity();
          $entity = $this->TkUpdatelogs->patchEntity($entity, $this->request->data);
          $this->log("エンティティ3：".$entity, LOG_DEBUG);
        }
        else{
          $tkUpdatelogs = $this->TkUpdatelogs->find(all);
          $this->set(compact('tkUpdatelogs'));
          $entity = $this->TkUpdatelogs->newEntity();
          $this->set('entity',$entity);
          $this->log("エンティティ1：".$entity, LOG_DEBUG);
        }
    }


    /**
     * View method
     *
     * @param string|null $id Tk Updatelog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tkUpdatelog = $this->TkUpdatelogs->get($id, [
            'contain' => []
        ]);

        $this->set('tkUpdatelog', $tkUpdatelog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tkUpdatelog = $this->TkUpdatelogs->newEntity();
        if ($this->request->is('post')) {
            $tkUpdatelog = $this->TkUpdatelogs->patchEntity($tkUpdatelog, $this->request->getData());
            if ($this->TkUpdatelogs->save($tkUpdatelog)) {
                $this->Flash->success(__('The tk updatelog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tk updatelog could not be saved. Please, try again.'));
        }
        $this->set(compact('tkUpdatelog'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tk Updatelog id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tkUpdatelog = $this->TkUpdatelogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tkUpdatelog = $this->TkUpdatelogs->patchEntity($tkUpdatelog, $this->request->getData());
            if ($this->TkUpdatelogs->save($tkUpdatelog)) {
                $this->Flash->success(__('The tk updatelog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tk updatelog could not be saved. Please, try again.'));
        }
        $this->set(compact('tkUpdatelog'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tk Updatelog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tkUpdatelog = $this->TkUpdatelogs->get($id);
        if ($this->TkUpdatelogs->delete($tkUpdatelog)) {
            $this->Flash->success(__('The tk updatelog has been deleted.'));
        } else {
            $this->Flash->error(__('The tk updatelog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
