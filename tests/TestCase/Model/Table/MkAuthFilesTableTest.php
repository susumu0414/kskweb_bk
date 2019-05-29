<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MkAuthFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MkAuthFilesTable Test Case
 */
class MkAuthFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MkAuthFilesTable
     */
    public $MkAuthFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MkAuthFiles',
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
        $config = TableRegistry::getTableLocator()->exists('MkAuthFiles') ? [] : ['className' => MkAuthFilesTable::class];
        $this->MkAuthFiles = TableRegistry::getTableLocator()->get('MkAuthFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MkAuthFiles);

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
