<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkPageFiles Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Pages
 * @property \App\Model\Table\MkAuthFilesTable|\Cake\ORM\Association\HasMany $MkAuthFiles
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
            ->scalar('menue_kbn')
            ->maxLength('menue_kbn', 15)
            ->requirePresence('menue_kbn', 'create')
            ->allowEmptyString('menue_kbn', false);

        $validator
            ->scalar('page_nm')
            ->maxLength('page_nm', 40)
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
        return $rules;
    }
}
