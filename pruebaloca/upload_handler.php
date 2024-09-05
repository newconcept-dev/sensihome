<?php
require 'routes.php';

class FileSize {
    private static $units = [
        'B' => 1,
        'KB' => 1024,
        'MB' => 1048576,
        'GB' => 1073741824,
        'TB' => 1099511627776,
    ];

    public static function toBytes($size) {
        $size = strtoupper($size);
        if (preg_match('/^(\d+)(B|KB|MB|GB|TB)$/', $size, $matches)) {
            $value = (int)$matches[1];
            $unit = $matches[2];
            if (isset(self::$units[$unit])) {
                return $value * self::$units[$unit];
            }
        }
        throw new InvalidArgumentException("Invalid size format: $size");
    }
}

class FileUploader {
    private $file;
    private $fileType;
    private $uploadOk;
    private $uniqueId;
    private $directoryManager;

    public function __construct($file, $directoryManager) {
        $this->file = $file;
        $this->directoryManager = $directoryManager;
        $this->fileType = strtolower(pathinfo($this->file["name"], PATHINFO_EXTENSION));
        $this->uploadOk = 1;
        $this->uniqueId = $this->generateUniqueId();
    }

    private function generateUniqueId() {
        return uniqid();
    }

    private function checkFileType($allowedTypes) {
        if (!in_array($this->fileType, $allowedTypes)) {
            echo "Lo siento, solo se permiten archivos " . implode(", ", $allowedTypes) . ".<br>";
            $this->uploadOk = 0;
        }
    }

    private function checkFileSize($maxSize) {
        if ($this->file["size"] > $maxSize) {
            echo "Lo siento, tu archivo es demasiado grande.<br>";
            $this->uploadOk = 0;
        }
    }

    private function checkIfImage() {
        $check = getimagesize($this->file["tmp_name"]);
        if ($check !== false) {
            echo "El archivo es una imagen - " . $check["mime"] . ".<br>";
        } else {
            echo "El archivo no es una imagen.<br>";
            $this->uploadOk = 0;
        }
    }

    private function moveFile($targetFile) {
        if ($this->uploadOk == 0) {
            echo "Lo siento, tu archivo no fue subido.<br>";
        } else {
            if (move_uploaded_file($this->file["tmp_name"], $targetFile)) {
                echo "El archivo " . htmlspecialchars(basename($this->file["name"])) . " ha sido subido como " . basename($targetFile) . ".<br>";
            } else {
                echo "Lo siento, hubo un error al subir tu archivo.<br>";
            }
        }
    }

    public function uploadImage($maxSize = '500KB') {
        $this->checkIfImage();
        $this->checkFileSize(FileSize::toBytes($maxSize));
        $this->checkFileType(['jpg', 'jpeg', 'png', 'gif']);
        $targetDir = $this->directoryManager->createDirectory('images');
        $targetFile = $targetDir . $this->uniqueId . '.' . $this->fileType;
        $this->moveFile($targetFile);
    }

    public function uploadVideo($maxSize = '50MB') {
        $this->checkFileSize(FileSize::toBytes($maxSize));
        $this->checkFileType(['mp4', 'avi', 'mov']);
        $targetDir = $this->directoryManager->createDirectory('videos');
        $targetFile = $targetDir . $this->uniqueId . '.' . $this->fileType;
        $this->moveFile($targetFile);
    }

    public function uploadDocument($maxSize = '10MB') {
        $this->checkFileSize(FileSize::toBytes($maxSize));
        $this->checkFileType(['pdf', 'doc', 'docx', 'xls', 'xlsx']);
        $targetDir = $this->directoryManager->createDirectory('documents');
        $targetFile = $targetDir . $this->uniqueId . '.' . $this->fileType;
        $this->moveFile($targetFile);
    }
}
?>