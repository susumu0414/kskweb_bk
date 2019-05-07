<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TkUpdatelogs Model
 *
 * @method \App\Model\Entity\TkUpdatelog get($primaryKey, $options = [])
 * @method \App\Model\Entity\TkUpdatelog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TkUpdatelog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TkUpdatelog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TkUpdatelog|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TkUpdatelog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TkUpdatelog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TkUpdatelog findOrCreate($search, callable $callback = null, $options = [])
 */
class TkUpdatelogsTable extends Table
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

        $this->setTable('tk_updatelogs');
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('release_ymd')
            ->maxLength('release_ymd', 8)
            ->requirePresence('release_ymd', 'create')
            ->allowEmptyString('release_ymd', false);

        $validator
            ->scalar('version')
            ->maxLength('version', 8)
            ->requirePresence('version', 'create')
            ->allowEmptyString('version', false);

        $validator
            ->scalar('note')
            ->maxLength('note', 255)
            ->allowEmptyString('note');

        return $validator;
    }
}
