<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MkCategory Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property string|null $name
 *
 * @property \App\Model\Entity\ParentMkCategory $parent_mk_category
 * @property \App\Model\Entity\ChildMkCategory[] $child_mk_categories
 */
class MkCategory extends Entity
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
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'name' => true,
        'parent_mk_category' => true,
        'child_mk_categories' => true
    ];
}
