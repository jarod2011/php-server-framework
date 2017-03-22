<?php
namespace Framework\Helper;

/**
 * This is a helper class about files operations
 *
 * @author Jarod
 * @final
 *
 */
final class FilesHelper
{

    /**
     * Use iterator get directory files
     * If the directory is invalid or can't open, will return null
     *
     * @author Jarod
     * @static
     *
     * @access public
     * @param string $directory
     *            The directory will be scaned
     * @param string $reg_exp
     *            Can use RegExp to Fiter files. default this parameter is empty
     * @param bool $recursion_subdirectory
     *            This parameter can determine whether recursion scanning subdirectorys. default this parameter is false
     * @param bool $contains_directory
     *            This parameter can determine whether result contains full directory. default this parameter is true
     * @return \Generator
     */
    public static function getDirectoryFilesByIterator(string $directory, string $reg_exp = '', bool $recursion_subdirectory = false, bool $contains_directory = true)
    {
        if (! is_dir($directory)) {
            yield null;
        } else {
            if (substr($directory, - 1, 1) != DIRECTORY_SEPARATOR) {
                $directory .= DIRECTORY_SEPARATOR;
            }
            $dh = @opendir($directory);
            if ($dh) {
                while ($read = @readdir($dh)) {
                    if ($read != '.' && $read != '..') {
                        if (is_dir($directory . $read)) {
                            if ($recursion_subdirectory) {
                                foreach (self::getDirectoryFilesByIterator($directory . $read, $reg_exp, $recursion_subdirectory, $contains_directory) as $sub_file) {
                                    yield $sub_file;
                                }
                            }
                        } else {
                            if (! $reg_exp || ($reg_exp && preg_match($reg_exp, $read) > 0)) {
                                yield $contains_directory ? $directory . $read : $read;
                            }
                        }
                    }
                }
                @closedir($dh);
            } else {
                yield null;
            }
        }
    }
}