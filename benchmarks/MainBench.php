<?php
/**
 * Created by PhpStorm.
 * User: avega
 * Date: 3/4/19
 * Time: 8:20 AM
 */

use Acme\Main;


class MainBench
{
    /**
     * @Revs(5)
     * @Iterations(5)
     * @OutputTimeUnit("seconds")
     */
    public function benchWhoGreener()
    {
        ob_start();
        $test = new Main();
        $test->whoGreener();
        ob_clean();
    }
}