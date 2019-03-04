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
     *@Revs(5)
     *@Iterations(5)
     * @OutputTimeUnit("seconds")
     */
    public function benchGetFileList()
    {
        $test = new GreenImages();
        $test->getFileList();
    }
}