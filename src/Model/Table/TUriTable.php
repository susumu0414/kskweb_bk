<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TUri Model
 *
 * @property \App\Model\Table\CresTable|\Cake\ORM\Association\BelongsTo $Cres
 * @property \App\Model\Table\UpdsTable|\Cake\ORM\Association\BelongsTo $Upds
 *
 * @method \App\Model\Entity\TUri get($primaryKey, $options = [])
 * @method \App\Model\Entity\TUri newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TUri[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TUri|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TUri|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TUri patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TUri[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TUri findOrCreate($search, callable $callback = null, $options = [])
 */
class TUriTable extends Table
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

        $this->setTable('t_uri');
        $this->setDisplayField('den_no');
        $this->setPrimaryKey('den_no');

        // $this->belongsTo('Cres', [
        //     'foreignKey' => 'cre_id'
        // ]);
        // $this->belongsTo('Upds', [
        //     'foreignKey' => 'upd_id'
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
            ->integer('den_no')
            ->allowEmptyString('den_no', 'create');

        $validator
            ->scalar('den_kbn')
            ->maxLength('den_kbn', 2)
            ->allowEmptyString('den_kbn');

        $validator
            ->allowEmptyString('uri_kbn');

        $validator
            ->scalar('ymd')
            ->maxLength('ymd', 8)
            ->allowEmptyString('ymd');

        $validator
            ->scalar('tk_cd')
            ->maxLength('tk_cd', 10)
            ->allowEmptyString('tk_cd');

        $validator
            ->decimal('tk_eda_cd')
            ->allowEmptyString('tk_eda_cd');

        $validator
            ->scalar('tokusaki_nm')
            ->maxLength('tokusaki_nm', 34)
            ->allowEmptyString('tokusaki_nm');

        $validator
            ->scalar('nonyusaki_nm')
            ->maxLength('nonyusaki_nm', 100)
            ->allowEmptyString('nonyusaki_nm');

        $validator
            ->scalar('tan_cd')
            ->maxLength('tan_cd', 6)
            ->allowEmptyString('tan_cd');

        $validator
            ->allowEmptyString('delive_bin_kbn');

        $validator
            ->decimal('unchin')
            ->allowEmptyString('unchin');

        $validator
            ->decimal('uri_kingaku')
            ->allowEmptyString('uri_kingaku');

        $validator
            ->decimal('zeigaku')
            ->allowEmptyString('zeigaku');

        $validator
            ->decimal('total_gaku')
            ->allowEmptyString('total_gaku');

        $validator
            ->scalar('kazei_kbn')
            ->maxLength('kazei_kbn', 1)
            ->allowEmptyString('kazei_kbn');

        $validator
            ->scalar('xxbiko')
            ->maxLength('xxbiko', 500)
            ->allowEmptyString('xxbiko');

        $validator
            ->scalar('yamaha_kanrensaki')
            ->maxLength('yamaha_kanrensaki', 1)
            ->allowEmptyString('yamaha_kanrensaki');

        $validator
            ->scalar('yamaha_toku_cd')
            ->maxLength('yamaha_toku_cd', 5)
            ->allowEmptyString('yamaha_toku_cd');

        $validator
            ->scalar('yamaha_nonyusaki_cd')
            ->maxLength('yamaha_nonyusaki_cd', 5)
            ->allowEmptyString('yamaha_nonyusaki_cd');

        $validator
            ->allowEmptyString('cyokuso');

        $validator
            ->allowEmptyString('unchin_shiharai_kbn');

        $validator
            ->integer('work_no')
            ->allowEmptyString('work_no');

        $validator
            ->allowEmptyString('seikyu_flg');

        $validator
            ->allowEmptyString('getsuji_flg');

        $validator
            ->scalar('sys_tmd')
            ->maxLength('sys_tmd', 8)
            ->allowEmptyString('sys_tmd');

        $validator
            ->scalar('syusei_ymd')
            ->maxLength('syusei_ymd', 8)
            ->allowEmptyString('syusei_ymd');

        $validator
            ->decimal('arari')
            ->allowEmptyString('arari');

        $validator
            ->allowEmptyString('nohinsyo_hakko');

        $validator
            ->allowEmptyString('unchin_kotei');

        $validator
            ->scalar('biko')
            ->maxLength('biko', 500)
            ->allowEmptyString('biko');

        $validator
            ->scalar('biko2')
            ->maxLength('biko2', 500)
            ->allowEmptyString('biko2');

        $validator
            ->scalar('biko3')
            ->maxLength('biko3', 500)
            ->allowEmptyString('biko3');

        $validator
            ->integer('jyucyu_no')
            ->allowEmptyString('jyucyu_no');

        $validator
            ->requirePresence('del_flg', 'create')
            ->allowEmptyString('del_flg', false);

        $validator
            ->dateTime('cre_time')
            ->allowEmptyDateTime('cre_time');

        $validator
            ->dateTime('upd_time')
            ->allowEmptyDateTime('upd_time');

        $validator
            ->allowEmptyString('mitsumori_flg');

        $validator
            ->allowEmptyString('web_hacyu_kbn');

        $validator
            ->requirePresence('daibiki_kbn', 'create')
            ->allowEmptyString('daibiki_kbn', false);

        $validator
            ->allowEmptyString('addr_hide_flg');

        $validator
            ->allowEmptyString('delive_cd');

        $validator
            ->scalar('syukka_no')
            ->maxLength('syukka_no', 24)
            ->allowEmptyString('syukka_no');

        $validator
            ->scalar('syukka_tan_cd')
            ->maxLength('syukka_tan_cd', 6)
            ->allowEmptyString('syukka_tan_cd');

        $validator
            ->allowEmptyString('henpin_kind');

        $validator
            ->scalar('biko4')
            ->maxLength('biko4', 500)
            ->allowEmptyString('biko4');

        $validator
            ->scalar('biko5')
            ->maxLength('biko5', 500)
            ->allowEmptyString('biko5');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['cre_id'], 'Cres'));
    //     $rules->add($rules->existsIn(['upd_id'], 'Upds'));
    //
    //     return $rules;
    // }
}
