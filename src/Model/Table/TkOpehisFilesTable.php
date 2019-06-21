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
            ->scalar('ope_cat')
            ->maxLength('ope_cat', 2)
            ->requirePresence('ope_cat', 'create')
            ->allowEmptyString('ope_cat', false);

        $validator
            ->scalar('key1')
            ->maxLength('key1', 10)
            ->requirePresence('key1', 'create')
            ->allowEmptyString('key1', false);

        $validator
            ->scalar('key2')
            ->maxLength('key2', 10)
            ->requirePresence('key2', 'create')
            ->allowEmptyString('key2', false);

        $validator
            ->scalar('key3')
            ->maxLength('key3', 10)
            ->requirePresence('key3', 'create')
            ->allowEmptyString('key3', false);

        $validator
            ->scalar('key4')
            ->maxLength('key4', 10)
            ->requirePresence('key4', 'create')
            ->allowEmptyString('key4', false);

        $validator
            ->scalar('value1')
            ->maxLength('value1', 256)
            ->requirePresence('value1', 'create')
            ->allowEmptyString('value1', false);

        $validator
            ->scalar('value2')
            ->maxLength('value2', 256)
            ->requirePresence('value2', 'create')
            ->allowEmptyString('value2', false);

        $validator
            ->scalar('value3')
            ->maxLength('value3', 256)
            ->requirePresence('value3', 'create')
            ->allowEmptyString('value3', false);

        $validator
            ->scalar('value4')
            ->maxLength('value4', 256)
            ->requirePresence('value4', 'create')
            ->allowEmptyString('value4', false);

        return $validator;
    }
}
