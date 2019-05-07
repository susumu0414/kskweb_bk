<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

/**
 * MkCategories Controller
 *
 * @property \App\Model\Table\MkCategoriesTable $MkCategories
 *
 * @method \App\Model\Entity\MkCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MkCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['ParentMkCategories']
        // ];
        // $mkCategories = $this->paginate($this->MkCategories);
        //
        // $this->set(compact('mkCategories'));
        $mkCategories = TableRegistry::getTableLocator()->get('mkCategories');
        $this->set('mkCategories',$mkCategories);

    }

    /**
     * View method
     *
     * @param string|null $id Mk Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mkCategory = $this->MkCategories->get($id, [
            'contain' => ['ParentMkCategories', 'ChildMkCategories']
        ]);

        $this->set('mkCategory', $mkCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mkCategory = $this->MkCategories->newEntity();
        if ($this->request->is('post')) {
            $mkCategory = $this->MkCategories->patchEntity($mkCategory, $this->request->getData());
            if ($this->MkCategories->save($mkCategory)) {
                $this->Flash->success(__('The mk category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk category could not be saved. Please, try again.'));
        }
        $parentMkCategories = $this->MkCategories->ParentMkCategories->find('list', ['limit' => 200]);
        $this->set(compact('mkCategory', 'parentMkCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mk Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mkCategory = $this->MkCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mkCategory = $this->MkCategories->patchEntity($mkCategory, $this->request->getData());
            if ($this->MkCategories->save($mkCategory)) {
                $this->Flash->success(__('The mk category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mk category could not be saved. Please, try again.'));
        }
        $parentMkCategories = $this->MkCategories->ParentMkCategories->find('list', ['limit' => 200]);
        $this->set(compact('mkCategory', 'parentMkCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mk Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mkCategory = $this->MkCategories->get($id);
        if ($this->MkCategories->delete($mkCategory)) {
            $this->Flash->success(__('The mk category has been deleted.'));
        } else {
            $this->Flash->error(__('The mk category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
