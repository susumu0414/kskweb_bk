<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MkAuthpage Entity
 *
 * @property int $id
 * @property string $auth_kbn
 * @property int $mk_pages_id
 *
 * @property \App\Model\Entity\MkPage $mk_page
 */
class MkAuthpage extends Entity
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
        'auth_kbn' => true,
        'mk_pages_id' => true,
        'mk_page' => true
    ];
}
