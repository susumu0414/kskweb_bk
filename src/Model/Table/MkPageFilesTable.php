<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkPageFiles Model
 *
 * @property \App\Model\Table\MkAuthFilesTable|\Cake\ORM\Association\HasMany $MkAuthFiles
 * @property \App\Model\Table\MkMenueFilesTable|\Cake\ORM\Association\HasMany $MkMenueFiles
 *
 * @method \App\Model\Entity\MkPageFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\MkPageFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MkPageFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MkPageFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkPageFile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkPageFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MkPageFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MkPageFile findOrCreate($search, callable $callback = null, $options = [])
 */
class MkPageFilesTable extends Table
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

        $this->setTable('mk_page_files');
        $this->setDisplayField('page_nm');
        $this->setPrimaryKey('id');

        $this->hasMany('MkAuthFiles', [
            'foreignKey' => 'mk_page_file_id'
        ]);
        $this->hasMany('MkMenueFiles', [
            'foreignKey' => 'mk_page_file_id'
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
            ->scalar('id_page')
            ->maxLength('id_page', 30)
            ->requirePresence('id_page', 'create')
            ->allowEmptyString('id_page', false)
            ->add('id_page', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('page_nm')
            ->maxLength('page_nm', 50)
            ->allowEmptyString('page_nm');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmptyString('url');

        $validator
            ->scalar('file_nm')
            ->maxLength('file_nm', 50)
            ->requirePresence('file_nm', 'create')
            ->allowEmptyFile('file_nm', false);

        $validator
            ->integer('sort')
            ->allowEmptyString('sort');

        $validator
            ->scalar('del_flg')
            ->maxLength('del_flg', 1)
            ->allowEmptyString('del_flg');

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
        $rules->add($rules->isUnique(['id_page']));

        return $rules;
    }
}
