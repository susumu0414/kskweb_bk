<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MkReleasenoteFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MkReleasenoteFilesTable Test Case
 */
class MkReleasenoteFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MkReleasenoteFilesTable
     */
    public $MkReleasenoteFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MkReleasenoteFiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MkReleasenoteFiles') ? [] : ['className' => MkReleasenoteFilesTable::class];
        $this->MkReleasenoteFiles = TableRegistry::getTableLocator()->get('MkReleasenoteFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MkReleasenoteFiles);

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
