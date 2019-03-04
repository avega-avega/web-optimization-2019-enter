<?php


/**
 * @Revs(5)
 * @Iterations(5)
 */
class TimeConsumerBench
{
    public function benchGetAll()
    {
       ob_start();
       \getAll();
       ob_clean();
    }
}

