<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TkOpehisFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TkOpehisFilesTable Test Case
 */
class TkOpehisFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TkOpehisFilesTable
     */
    public $TkOpehisFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TkOpehisFiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TkOpehisFiles') ? [] : ['className' => TkOpehisFilesTable::class];
        $this->TkOpehisFiles = TableRegistry::getTableLocator()->get('TkOpehisFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TkOpehisFiles);

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
