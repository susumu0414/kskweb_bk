<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MkAuthFile Entity
 *
 * @property int $id
 * @property string $auth_kbn
 * @property int $mk_page_file_id
 *
 * @property \App\Model\Entity\MkPageFile $mk_page_file
 */
class MkAuthFile extends Entity
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
        'mk_page_file_id' => true,
        'mk_page_file' => true
    ];
}
