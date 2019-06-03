<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkMenueKbnFiles Model
 *
 * @property \App\Model\Table\MkMenueFilesTable|\Cake\ORM\Association\HasMany $MkMenueFiles
 *
 * @method \App\Model\Entity\MkMenueKbnFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\MkMenueKbnFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MkMenueKbnFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MkMenueKbnFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkMenueKbnFile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkMenueKbnFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MkMenueKbnFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MkMenueKbnFile findOrCreate($search, callable $callback = null, $options = [])
 */
class MkMenueKbnFilesTable extends Table
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

        $this->setTable('mk_menue_kbn_files');
        $this->setDisplayField('menue_kbn');
        $this->setPrimaryKey('id');

        $this->hasMany('MkMenueFiles', [
            'foreignKey' => 'mk_menue_kbn_file_id'
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('menue_kbn')
            ->maxLength('menue_kbn', 20)
            ->requirePresence('menue_kbn', 'create')
            ->allowEmptyString('menue_kbn', false)
            ->add('menue_kbn', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('menue_kbn_nm')
            ->maxLength('menue_kbn_nm', 30)
            ->requirePresence('menue_kbn_nm', 'create')
            ->allowEmptyString('menue_kbn_nm', false);

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
        $rules->add($rules->isUnique(['menue_kbn']));

        return $rules;
    }
}
