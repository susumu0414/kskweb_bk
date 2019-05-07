<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MTanto Entity
 *
 * @property string $tan_cd
 * @property string|null $tan_nm
 * @property string|null $user_pass
 * @property int|null $auth_kbn
 * @property int $del_flg
 * @property string|null $cre_id
 * @property \Cake\I18n\FrozenTime|null $cre_time
 * @property string|null $upd_id
 * @property \Cake\I18n\FrozenTime|null $upd_time
 *
 * @property \App\Model\Entity\Cre $cre
 * @property \App\Model\Entity\Upd $upd
 */
class MTanto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tan_nm' => true,
        'user_pass' => true,
        'auth_kbn' => true,
        'del_flg' => true,
        'cre_id' => true,
        'cre_time' => true,
        'upd_id' => true,
        'upd_time' => true,
        'cre' => true,
        'upd' => true
    ];
}
