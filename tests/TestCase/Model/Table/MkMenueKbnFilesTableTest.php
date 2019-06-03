<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MkMenueKbnFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MkMenueKbnFilesTable Test Case
 */
class MkMenueKbnFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MkMenueKbnFilesTable
     */
    public $MkMenueKbnFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MkMenueKbnFiles',
        'app.MkMenueFiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MkMenueKbnFiles') ? [] : ['className' => MkMenueKbnFilesTable::class];
        $this->MkMenueKbnFiles = TableRegistry::getTableLocator()->get('MkMenueKbnFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MkMenueKbnFiles);

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
