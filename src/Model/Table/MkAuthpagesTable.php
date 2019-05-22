<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkAuthpages Model
 *
 * @property \App\Model\Table\MkPagesTable|\Cake\ORM\Association\BelongsTo $MkPages
 *
 * @method \App\Model\Entity\MkAuthpage get($primaryKey, $options = [])
 * @method \App\Model\Entity\MkAuthpage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MkAuthpage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MkAuthpage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkAuthpage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkAuthpage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MkAuthpage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MkAuthpage findOrCreate($search, callable $callback = null, $options = [])
 */
class MkAuthpagesTable extends Table
{
  
    public static function defaultConnectionName()
    {
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

        $this->setTable('mk_authpages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MkPages', [
            'foreignKey' => 'mk_pages_id',
            'joinType' => 'INNER'
        ]);
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('auth_kbn')
            ->maxLength('auth_kbn', 10)
            ->requirePresence('auth_kbn', 'create')
            ->allowEmptyString('auth_kbn', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['mk_pages_id'], 'MkPages'));

        return $rules;
    }
}
