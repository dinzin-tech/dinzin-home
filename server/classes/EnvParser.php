<?php
namespace classes;

class EnvParser
{
    public static function parse($file)
    {
        $content = file_get_contents($file);
        $lines = explode("\n", $content);

        $env = [];

        foreach ($lines as $line) {
            $line = trim($line);

            // Ignore comments and empty lines
            if (empty($line) || strpos($line, '#') === 0) {
                continue;
            }

            list($key, $value) = explode('=', $line, 2);
            $env[$key] = $value;
        }

        return $env;
    }
}


?>