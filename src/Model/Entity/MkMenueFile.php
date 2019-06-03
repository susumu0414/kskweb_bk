<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MkMenueFile Entity
 *
 * @property int $id
 * @property int $mk_menue_kbn_file_id
 * @property int $mk_page_file_id
 *
 * @property \App\Model\Entity\MkPageFile $mk_page_file
 */
class MkMenueFile extends Entity
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
        'mk_menue_kbn_file_id' => true,
        'mk_page_file_id' => true,
        'mk_page_file' => true
    ];
}
