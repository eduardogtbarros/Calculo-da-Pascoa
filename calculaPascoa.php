<?php
/**
 * @file   calculaPascoa.php
 * @autor  Eduardo Barros
 * @brief  Implementa o cálculo do dia da Páscoa utilizando o algoritmo
 *         de J. M. Oudin.
 */

/**
 * Função responsável por fazer o cálculo do dia da Páscoa.
 * @param  int $a Ano para o qual se deseja saber o dia da Páscoa.
 * @return int    O dia calculado da Páscoa.
 */
    function calculaPascoa($a){
        $c = intdiv($a,100);
        $n = $a%19;
        $k = intdiv($c-17,25);
        
        $i = $c - intdiv($c,4) - intdiv($c-$k,3) + (19*$n) + 15;
        $i = $i - (30*intdiv($i,30));
        $i = $i - (intdiv($i,28)*(1-intdiv($i,28))*intdiv(29,$i+1)*intdiv(21-$n,11));
        
        $j = $a + intdiv($a,4) + $i + 2 - $c + intdiv($c,4);
        $j = $j - (7*intdiv($j,7));
        
        $l = $i - $j;
        $m = 3 + intdiv($l+40,44);
        $d = $l + 28 - (31*intdiv($m,4));
    
        return $d;
    }
    
    // Loop para continuar perguntando o ano a ser calculado
    while(true){
        echo "Digite o ano: ";
        $lido = trim(fgets(STDIN));
        if(is_numeric($lido)){ //Se o valor digitado for um número
            $ano = (int)$lido;
            echo "A Páscoa cai no dia " . calculaPascoa($ano) . "!\n";
        }
        else{
            echo "Ano inválido!\n";
            break;
        }
    }
?>