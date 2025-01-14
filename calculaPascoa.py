"""
File name: calculaPascoa.py
Author: Eduardo Barros
Brief: Implementa o cálculo do dia da Páscoa utilizando o algoritmo
       de J. M. Oudin.
"""

def calculaPascoa(a):
    '''
    Função responsável por fazer o cálculo do dia da Páscoa.
    
    :param a: Ano para o qual se deseja saber o dia da Páscoa.
    :return: O dia calculado da Páscoa.
    '''
    c = a//100
    n = a %19
    k = (c-17)//25
 
    i = c - c//4 - ((c-k)//3) + (19*n) + 15
    i = i - (30*(i//30))
    i = i - ((i//28)*(1-(i//28))*(29//(i+1))*((21-n)//11))

    j = a + a//4 + i + 2 - c + c//4
    j = j - (7*(j//7))

    l = i - j
    m = 3 + ((l+40)//44)
    d = l + 28 - (31*(m//4))

    return d

# Loop para continuar perguntando o ano a ser calculado
while True:
    lido = input("Digite o ano: ")
    try:
        ano = int(lido) #Se o valor digitado for um número
    except ValueError:
        print("Ano inválido!")
        break
    print("A Páscoa cai no dia ", calculaPascoa(ano))