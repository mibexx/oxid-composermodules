<?php

namespace mbx\composermodules\reader;


class modulereader implements ReaderInterface
{
    /**
     * @var \oxModuleList
     */
    private $moduleList;

    /**
     * modulereader constructor.
     * @param \oxModuleList $moduleList
     */
    public function __construct(\oxModuleList $moduleList)
    {
        $this->moduleList = $moduleList;
    }

    /**
     * @return array
     */
    public function getComposerModules()
    {
        $directories = $this->mbxGetEmptyDirectoryList();
        $crawler = $this->mbxGetDirectoryCrawler($directories);
        $crawler->readDirectories();
        $modules = $this->getModulesFromDirectories($directories);
        return $modules;
    }

    /**
     * @param $directories
     * @return array
     */
    private function getModulesFromDirectories($directories)
    {
        $modules = [];
        foreach ($directories->getDirectories() as $moduleDir) {
            $vendorDir = str_replace(getShopBasePath() . 'modules/', '', $moduleDir);
            $vendorModules = $this->moduleList->getModulesFromDir($moduleDir, $vendorDir);
            $modules = array_merge($modules, $vendorModules);
        }
        return $modules;
    }

    /**
     * @return \mbx\composermodules\crawler\directorylist
     */
    private function mbxGetEmptyDirectoryList()
    {
        $directories = new \mbx\composermodules\crawler\directorylist();
        return $directories;
    }

    /**
     * @param $directories
     * @return \mbx\composermodules\crawler\crawler
     */
    private function mbxGetDirectoryCrawler($directories)
    {
        $crawler = new \mbx\composermodules\crawler\crawler($directories);
        return $crawler;
    }
}