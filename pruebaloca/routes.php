<?php

class DirectoryManager {
    private $baseDir;

    public function __construct($baseDir = __DIR__) {
        $this->baseDir = rtrim($baseDir, '/') . '/';
    }

    public function createDirectory($subDir) {
        $dir = $this->baseDir . $subDir . '/';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir;
    }

    public function getDirectoryPath($subDir) {
        return $this->baseDir . $subDir . '/';
    }
}
?>