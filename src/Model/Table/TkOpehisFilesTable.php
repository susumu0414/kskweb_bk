<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TkOpehisFiles Model
 *
 * @method \App\Model\Entity\TkOpehisFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\TkOpehisFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TkOpehisFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TkOpehisFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TkOpehisFile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TkOpehisFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TkOpehisFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TkOpehisFile findOrCreate($search, callable $callback = null, $options = [])
 */
class TkOpehisFilesTable extends Table
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

        $this->setTable('tk_opehis_files');
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
            ->dateTime('ymd')
            ->requirePresence('ymd', 'create')
            ->allowEmptyDateTime('ymd', false);

        $validator
            ->scalar('tan_cd')
            ->maxLength('tan_cd', 6)
            ->requirePresence('tan_cd', 'create')
            ->allowEmptyString('tan_cd', false);

        $validator
            ->scalar('tan_nm')
            ->maxLength('tan_nm', 32)
            ->requirePresence('tan_nm', 'create')
            ->allowEmptyString('tan_nm', false);

        $validator
            ->scalar('page_nm')
            ->maxLength('page_nm', 50)
            ->requirePresence('page_nm', 'create')
            ->allowEmptyString('page_nm', false);

        $validator
            ->scalar('param')
            ->maxLength('param', 1000)
            ->allowEmptyString('param');

        $validator
            ->scalar('query')
            ->maxLength('query', 4000)
            ->allowEmptyString('query');

        return $validator;
    }
}
