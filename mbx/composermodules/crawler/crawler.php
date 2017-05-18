<?php

namespace mbx\composermodules\crawler;


class crawler
{
    /**
     * @var DirectoryListInterface
     */
    private $directories;

    /**
     * crawler constructor.
     * @param DirectoryListInterface $directories
     */
    public function __construct(DirectoryListInterface $directories)
    {
        $this->directories = $directories;
    }

    /**
     * @param string $dir
     */
    public function readDirectories($dir = "")
    {
        if ($dir === "") {
            $this->readDirectories(getShopBasePath() . 'modules/vendor');
        } else {
            foreach (glob($dir . '/*') as $subdir) {
                if ($this->scanSubdirectory($dir, $subdir)) {
                    break;
                }
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
}