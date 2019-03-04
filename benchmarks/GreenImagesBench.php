<?php
/**
 * Created by PhpStorm.
 * User: avega
 * Date: 3/4/19
 * Time: 8:20 AM
 */

use Acme\GreenImages;

class GreenImagesBench
{
    /**
     *@Revs(1)
     *@Iterations(5)
     * @OutputTimeUnit("seconds")
     */
    public function benchGetFileList()
    {
        ob_start();
        $test = new GreenImages();
        $test->getFileList();
        ob_clean();
    }
}