<?php

namespace mbx\composermodules\crawler;


class directorylist implements DirectoryListInterface
{
    /**
     * @var array
     */
    private $directories;

    /**
     * directorylist constructor.
     * @param $directories
     */
    public function __construct()
    {
        $this->directories = [];
    }

    /**
     * @param string $dir
     */
    public function addDir($dir) {
        $this->directories[] = $dir;
    }

    /**
     * @return array
     */
    public function getDirectories()
    {
        return $this->directories;
    }
}