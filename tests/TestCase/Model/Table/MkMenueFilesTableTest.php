<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MkMenueFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MkMenueFilesTable Test Case
 */
class MkMenueFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MkMenueFilesTable
     */
    public $MkMenueFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MkMenueFiles',
        'app.MkMenueKbnFiles',
        'app.MkPageFiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MkMenueFiles') ? [] : ['className' => MkMenueFilesTable::class];
        $this->MkMenueFiles = TableRegistry::getTableLocator()->get('MkMenueFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MkMenueFiles);

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
