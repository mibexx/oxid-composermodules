<?php


class CrawlerTest extends \Codeception\Test\Unit
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

    public function testInstance()
    {
        $directory = new \mbx\composermodules\crawler\directorylist();
        $crawler = new \mbx\composermodules\crawler\crawler($directory, __DIR__ . '/testModules/');

        $this->assertInstanceOf('\mbx\composermodules\crawler\crawler', $crawler);
    }

    public function testReadDirectories()
    {
        $directory = new \mbx\composermodules\crawler\directorylist();
        $crawler = $this->getMockBuilder('\mbx\composermodules\crawler\crawler')
            ->setConstructorArgs(array($directory, __DIR__ . '/testModules/'))
            ->setMethods(null)
            ->getMock();

        $crawler->readDirectories();
        $this->assertEquals(array(__DIR__ . '/testModules/modules/vendor'), $directory->getDirectories());
    }
}