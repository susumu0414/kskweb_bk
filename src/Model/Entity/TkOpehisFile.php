<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TkOpehisFile Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $ymd
 * @property string $tan_cd
 * @property string $tan_nm
 * @property string $page_nm
 * @property string $ope_cat
 * @property string $key1
 * @property string $key2
 * @property string $key3
 * @property string $key4
 * @property string $value1
 * @property string $value2
 * @property string $value3
 * @property string $value4
 */
class TkOpehisFile extends Entity
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
        'ymd' => true,
        'tan_cd' => true,
        'tan_nm' => true,
        'page_nm' => true,
        'ope_cat' => true,
        'key1' => true,
        'key2' => true,
        'key3' => true,
        'key4' => true,
        'value1' => true,
        'value2' => true,
        'value3' => true,
        'value4' => true
    ];
}
