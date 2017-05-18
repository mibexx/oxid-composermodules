<?php

class mbx_composermodules_oxmodulelist extends mbx_composermodules_oxmodulelist_parent
{
    public function getModulesFromDir($sModulesDir, $sVendorDir = null)
    {
        $sConfigModulesDir = oxRegistry::getConfig()->getModulesDir();
        $this->_aModules = parent::getModulesFromDir($sModulesDir, $sVendorDir);
        if ($sConfigModulesDir == $sModulesDir) {
            $this->_aModules = array_merge($this->_aModules, $this->getComposerModules());
        }
        return $this->_aModules;
    }

    /**
     * @return array
     */
    private function getComposerModules()
    {
        $directories = new mbx\composermodules\crawler\directorylist();
        $crawler = new mbx\composermodules\crawler\crawler($directories);
        $crawler->readDirectories();
        $modules = [];
        foreach ($directories->getDirectories() as $moduleDir) {
            $vendorDir = str_replace(getShopBasePath() . 'modules/', '', $moduleDir);
            $vendorModules = $this->getModulesFromDir($moduleDir, $vendorDir);
            $modules = array_merge($modules, $vendorModules);
        }
        return $modules;
    }
}