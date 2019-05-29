<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MkUpdatelogFile Entity
 *
 * @property int $id
 * @property string $release_ymd
 * @property string $version
 * @property string|null $note
 */
class MkUpdatelogFile extends Entity
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
        'release_ymd' => true,
        'version' => true,
        'note' => true
    ];
}
