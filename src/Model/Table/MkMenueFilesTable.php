<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkMenueFiles Model
 *
 * @property \App\Model\Table\MkMenueKbnFilesTable|\Cake\ORM\Association\BelongsTo $MkMenueKbnFiles
 * @property \App\Model\Table\MkPageFilesTable|\Cake\ORM\Association\BelongsTo $MkPageFiles
 *
 * @method \App\Model\Entity\MkMenueFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\MkMenueFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MkMenueFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MkMenueFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkMenueFile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkMenueFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MkMenueFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MkMenueFile findOrCreate($search, callable $callback = null, $options = [])
 */
class MkMenueFilesTable extends Table
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

        $this->setTable('mk_menue_files');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MkMenueKbnFiles', [
            'foreignKey' => 'mk_menue_kbn_file_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MkPageFiles', [
            'foreignKey' => 'mk_page_file_id',
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

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
        $rules->add($rules->existsIn(['mk_menue_kbn_file_id'], 'MkMenueKbnFiles'));
        $rules->add($rules->existsIn(['mk_page_file_id'], 'MkPageFiles'));

        return $rules;
    }
}
