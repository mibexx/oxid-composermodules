<?php

class mbx_composermodules_oxmodulelist extends mbx_composermodules_oxmodulelist_parent
{
    /**
     * @var \mbx\composermodules\reader\modulereader
     */
    private $mbxModuleReader;

    public function getModulesFromDir($sModulesDir, $sVendorDir = null)
    {
        $sConfigModulesDir = $this->getConfig()->getModulesDir();
        $this->_aModules = parent::getModulesFromDir($sModulesDir, $sVendorDir);
        $this->mbxAddComposerModules($sModulesDir, $sConfigModulesDir);
        return $this->_aModules;
    }

    /**
     * @param $sModulesDir
     * @param $sConfigModulesDir
     */
    protected function mbxAddComposerModules($sModulesDir, $sConfigModulesDir)
    {
        if ($sConfigModulesDir == $sModulesDir) {
            $reader = $this->mbxGetComposerModuleReader();
            $this->_aModules = array_merge($this->_aModules, $reader->getComposerModules());
        }
    }

    /**
     * @return \mbx\composermodules\reader\modulereader
     */
    private function mbxGetComposerModuleReader()
    {
        if ($this->mbxModuleReader === null) {
            $this->mbxModuleReader = new \mbx\composermodules\reader\modulereader($this, getShopBasePath());
        }
        return $this->mbxModuleReader;
    }


}