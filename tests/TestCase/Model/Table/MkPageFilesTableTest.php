<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MkPageFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MkPageFilesTable Test Case
 */
class MkPageFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MkPageFilesTable
     */
    public $MkPageFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MkPageFiles',
        'app.MkAuthFiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MkPageFiles') ? [] : ['className' => MkPageFilesTable::class];
        $this->MkPageFiles = TableRegistry::getTableLocator()->get('MkPageFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MkPageFiles);

        parent::tearDown();
    }

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
