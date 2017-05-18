<?php
namespace mbx\composermodules\crawler;

interface DirectoryListInterface
{
    public function addDir($dir);

    /**
     * @return array
     */
    public function getDirectories();
}