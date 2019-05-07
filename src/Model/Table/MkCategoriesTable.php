<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkCategories Model
 *
 * @property \App\Model\Table\MkCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentMkCategories
 * @property \App\Model\Table\MkCategoriesTable|\Cake\ORM\Association\HasMany $ChildMkCategories
 *
 * @method \App\Model\Entity\MkCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\MkCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MkCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MkCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MkCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MkCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class MkCategoriesTable extends Table
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

        $this->setTable('mk_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Tree');

        $this->belongsTo('ParentMkCategories', [
            'className' => 'MkCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildMkCategories', [
            'className' => 'MkCategories',
            'foreignKey' => 'parent_id'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentMkCategories'));

        return $rules;
    }
}
