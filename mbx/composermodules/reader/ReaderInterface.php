<?php

namespace mbx\composermodules\reader;

interface ReaderInterface
{
    /**
     * @return array
     */
    public function getComposerModules();
}