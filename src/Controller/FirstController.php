<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FirstController
 * @package App\Controller
 * @Route(path="first/")
 */

class FirstController
{
    private function isPrime(int $num) : bool
    {
        if ($num < 2) return false;
        $lim = sqrt($num);
        for ($i = 2; $i <= $lim; $i++)
        {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    private function getTable(int $min, int $max) : string
    {
        $tpl_table = file_get_contents("../templates/primes/table.html");
        $tpl_rowsep = file_get_contents("../templates/primes/rowsep.html");
        $tpl_normal = file_get_contents("../templates/primes/cellnormal.html");
        $tpl_prime = file_get_contents("../templates/primes/cellprime.html");

        $rows = "";
        $maxValue = 0;
    }

    /**
     * @param Request $request
     * @param int $minValue
     * @param int $maxValue
     * @return Response
     * @Route(name="primesAction", path="primes/{minValue}/{maxValue}", requirements={ "minValue": "\d+", "maxValue": "\d+" })
     */
    public function getNumberTable(Request $request, int $minValue = 0, int $maxValue = 999) : Response
    {
        $str = "TABLE FROM {$minValue} to {$maxValue}";
        return new Response($str);
    }
}
