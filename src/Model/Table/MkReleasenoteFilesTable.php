<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkReleasenoteFiles Model
 *
 * @method \App\Model\Entity\MkReleasenoteFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\MkReleasenoteFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MkReleasenoteFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MkReleasenoteFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkReleasenoteFile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkReleasenoteFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MkReleasenoteFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MkReleasenoteFile findOrCreate($search, callable $callback = null, $options = [])
 */
class MkReleasenoteFilesTable extends Table
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

        $this->setTable('mk_releasenote_files');
        $this->setDisplayField('title');
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
            ->allowEmptyString('release_ymd');

        $validator
            ->scalar('version')
            ->maxLength('version', 8)
            ->allowEmptyString('version');

        $validator
            ->scalar('title')
            ->maxLength('title', 50)
            ->allowEmptyString('title');

        $validator
            ->scalar('note')
            ->maxLength('note', 255)
            ->allowEmptyString('note');

        return $validator;
    }
}
