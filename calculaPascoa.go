// file   calculaPascoa.js
// author Eduardo Barros
// brief  Implementa o cálculo do dia da Páscoa utilizando o algoritmo
//        de J. M. Oudin.

package main
import (
		"fmt"
		"bufio"
		"os"
		"strings"
		"strconv"
	)

// calculaPascoa Função responsável por fazer o cálculo do dia da Páscoa.
// a Ano para o qual se deseja saber o dia da Páscoa. 
// Retorna o dia calculado da Páscoa.
func calculaPascoa(a int) int{
	c := a/100
    n := a%19
    k := (c-17)/25
 
    i := c - c/4 - ((c-k)/3) + (19*n) + 15
    i = i - (30*(i/30))
    i = i - ((i/28)*(1-(i/28))*(29/(i+1))*((21-n)/11))

    j := a + a/4 + i + 2 - c + c/4
    j = j - (7*(j/7))

    l := i - j
    m := 3 + ((l+40)/44)
    d := l + 28 - (31*(m/4))

	return d
}

func main() {
	leitura := bufio.NewReader(os.Stdin)

	for{
		fmt.Print("Digite o ano: ")
		lido, _ := leitura.ReadString('\n')
		lido = strings.TrimSpace(lido) // Remove o \n

		ano, erro := strconv.Atoi(lido) //Tenta converter o valor digitado para um número
		if erro == nil { //Se der erro
			fmt.Printf("A Páscoa cai no dia %d!\n\n", calculaPascoa(ano))
		} else {
			fmt.Println("Ano inválido!")
            break
		}
	}
}