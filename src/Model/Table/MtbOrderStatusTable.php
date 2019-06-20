<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MtbOrderStatus Model
 *
 * @method \App\Model\Entity\MtbOrderStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\MtbOrderStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MtbOrderStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MtbOrderStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MtbOrderStatus|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MtbOrderStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MtbOrderStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MtbOrderStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class MtbOrderStatusTable extends Table
{
  public static function defaultConnectionName() {
          return 'ecdb';
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

        $this->setTable('mtb_order_status');
        $this->setDisplayField('name');
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->allowEmptyString('name');

        $validator
            ->requirePresence('rank', 'create')
            ->allowEmptyString('rank', false);

        return $validator;
    }
}
