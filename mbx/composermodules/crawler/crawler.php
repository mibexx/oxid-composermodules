<?php

namespace mbx\composermodules\crawler;


class crawler
{
    /**
     * @var DirectoryListInterface
     */
    private $directories;

    /**
     * @var string
     */
    private $basePath;

    /**
     * crawler constructor.
     * @param DirectoryListInterface $directories
     */
    public function __construct(DirectoryListInterface $directories, $basePath)
    {
        $this->directories = $directories;
        $this->basePath = $basePath;
    }

    /**
     * @param string $dir
     */
    public function readDirectories($dir = "")
    {
        if ($dir === "") {
            $dir = $this->getDefaultDirectory();
        }

        foreach ($this->getSubdirectories($dir) as $subdir) {
            if ($this->scanSubdirectory($dir, $subdir)) {
                break;
            }
        }
    }

    /**
     * @param string $dir
     * @param string $subdir
     * @return bool
     */
    private function scanSubdirectory($dir, $subdir)
    {
        $found = false;
        if (is_dir($subdir)) {
            if (is_file($subdir . '/metadata.php')) {
                $this->directories->addDir($dir);
                $found = true;
            }
            else {
                $this->readDirectories($subdir);
            }
            return $found;
        }
    }

    private function getDefaultDirectory()
    {
        return $this->basePath . 'modules/vendor';
    }

    /**
     * @param $dir
     * @return array
     */
    private function getSubdirectories($dir)
    {
        return glob($dir . '/*');
    }
}