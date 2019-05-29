<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MkUpdatelogFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MkUpdatelogFilesTable Test Case
 */
class MkUpdatelogFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MkUpdatelogFilesTable
     */
    public $MkUpdatelogFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MkUpdatelogFiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MkUpdatelogFiles') ? [] : ['className' => MkUpdatelogFilesTable::class];
        $this->MkUpdatelogFiles = TableRegistry::getTableLocator()->get('MkUpdatelogFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MkUpdatelogFiles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
