<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MkMenueKbnFile Entity
 *
 * @property int $id
 * @property string $menue_kbn
 * @property string $menue_kbn_nm
 *
 * @property \App\Model\Entity\MkMenueFile[] $mk_menue_files
 */
class MkMenueKbnFile extends Entity
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
        'menue_kbn' => true,
        'menue_kbn_nm' => true,
        'mk_menue_files' => true
    ];
}
