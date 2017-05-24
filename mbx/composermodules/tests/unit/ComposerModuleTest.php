<?php

if (!class_exists('oxModuleList')) {
    class oxModuleList
    {

    }
}


class ComposerModuleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testModuleReader()
    {
        $moduleList = $this->getMockBuilder('oxModuleList')
                           ->setMethods(array('getModulesFromDir'))
                           ->getMock();

        $moduleList->expects($this->once())
                   ->method("getModulesFromDir")
                   ->with($this->equalTo(__DIR__ . '/testModules/modules/vendor/mbx'))
                   ->willReturn(
                       [
                           'mod1',
                           'mod2'
                       ]
                   );

        $reader = $this->getMockBuilder('\mbx\composermodules\reader\modulereader')
                       ->setMethods(null)
                       ->setConstructorArgs(
                           array(
                               $moduleList,
                               __DIR__ . '/testModules/'
                           )
                       )
                       ->getMock();

        $this->assertEquals(array('mod1', 'mod2'), $reader->getComposerModules());
    }
}