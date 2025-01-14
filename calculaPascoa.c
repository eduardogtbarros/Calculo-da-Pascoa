/*-----------------------------------------------------------------*/
/**
  @file   calculaPascoa.c
  @author Eduardo Barros
  @brief  Implementa o cálculo do dia da Páscoa utilizando o algoritmo
          de J. M. Oudin.
 */
/*-----------------------------------------------------------------*/

#include <stdio.h>

/*-----------------------------------------------------------------*/
/**
   @brief Função responsável por fazer o cálculo do dia da Páscoa.
   @param  int a Ano para o qual se deseja saber o dia da Páscoa.
   @return O dia calculado da Páscoa.
*/
/*-----------------------------------------------------------------*/
int calculaPascoa(int a){
    int c, n, k, i, j, l, m, d;

    c = a/100;
    n = a %19;
    k = (c-17)/25;
 
    i = c - c/4 - ((c-k)/3) + (19*n) + 15;
    i = i - (30*(i/30));
    i = i - ((i/28)*(1-(i/28))*(29/(i+1))*((21-n)/11));

    j = a + a/4 + i + 2 - c + c/4;
    j = j - (7*(j/7));

    l = i - j;
    m = 3 + ((l+40)/44);
    d = l + 28 - (31*(m/4));

    return d;
}

int main(){
    int ano, resultado;
    
    // Loop para continuar perguntando o ano a ser calculado
    while(1){
        printf("Digite o ano: ");
        resultado = scanf("%d", &ano);
        if(resultado==1){ //Se o valor digitado for um número
            printf("A Páscoa cai no dia %d!\n", calculaPascoa(ano));
        }else{
            printf("Ano inválido!\n");
            break;
        }
    }
    return 0;
}