<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkNewsFiles Model
 *
 * @method \App\Model\Entity\MkNewsFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\MkNewsFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MkNewsFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MkNewsFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkNewsFile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkNewsFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MkNewsFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MkNewsFile findOrCreate($search, callable $callback = null, $options = [])
 */
class MkNewsFilesTable extends Table
{
  public static function defaultConnectionName() {
          return 'kskweb_db';
  }
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('mk_news_files');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('message')
            ->maxLength('message', 256)
            ->requirePresence('message', 'create')
            ->allowEmptyString('message', false);

        return $validator;
    }
}
