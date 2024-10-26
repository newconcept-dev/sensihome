<?php

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
?>