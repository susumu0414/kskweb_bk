<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MkPages Model
 *
 * @property \App\Model\Table\PagesTable|\Cake\ORM\Association\BelongsTo $Pages
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\MkPage get($primaryKey, $options = [])
 * @method \App\Model\Entity\MkPage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MkPage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MkPage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkPage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MkPage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MkPage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MkPage findOrCreate($search, callable $callback = null, $options = [])
 */
class MkPagesTable extends Table
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

        $this->setTable('mk_pages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        // $this->belongsTo('Pages', [
        //     'foreignKey' => 'page_id',
        //     'joinType' => 'INNER'
        // ]);
        // $this->belongsTo('Categories', [
        //     'foreignKey' => 'category_id',
        //     'joinType' => 'INNER'
        // ]);
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
        // $rules->add($rules->existsIn(['page_id'], 'Pages'));
        // $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
