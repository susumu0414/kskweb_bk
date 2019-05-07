<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MTanto Model
 *
 * @property \App\Model\Table\CresTable|\Cake\ORM\Association\BelongsTo $Cres
 * @property \App\Model\Table\UpdsTable|\Cake\ORM\Association\BelongsTo $Upds
 *
 * @method \App\Model\Entity\MTanto get($primaryKey, $options = [])
 * @method \App\Model\Entity\MTanto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MTanto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MTanto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MTanto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MTanto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MTanto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MTanto findOrCreate($search, callable $callback = null, $options = [])
 */
class MTantoTable extends Table
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

        $this->setTable('m_tanto');
        $this->setDisplayField('tan_cd');
        $this->setPrimaryKey('tan_cd');

        $this->belongsTo('Cres', [
            'foreignKey' => 'cre_id'
        ]);
        $this->belongsTo('Upds', [
            'foreignKey' => 'upd_id'
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
            ->scalar('tan_cd')
            ->maxLength('tan_cd', 6)
            ->allowEmptyString('tan_cd', 'create');

        $validator
            ->scalar('tan_nm')
            ->maxLength('tan_nm', 32)
            ->allowEmptyString('tan_nm');

        $validator
            ->scalar('user_pass')
            ->maxLength('user_pass', 16)
            ->allowEmptyString('user_pass');

        $validator
            ->integer('auth_kbn')
            ->allowEmptyString('auth_kbn');

        $validator
            ->requirePresence('del_flg', 'create')
            ->allowEmptyString('del_flg', false);

        $validator
            ->dateTime('cre_time')
            ->allowEmptyDateTime('cre_time');

        $validator
            ->dateTime('upd_time')
            ->allowEmptyDateTime('upd_time');

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
        $rules->add($rules->existsIn(['cre_id'], 'Cres'));
        $rules->add($rules->existsIn(['upd_id'], 'Upds'));

        return $rules;
    }
}
