import java.util.Scanner;

/**
 * Implementa o cálculo do dia da Páscoa utilizando o algoritmo
 * de J. M. Oudin.
 * @autor  Eduardo Barros
 */
public class CalculaPascoa{
    /**
    * Função responsável por fazer o cálculo do dia da Páscoa.
    * @param  a Ano para o qual se deseja saber o dia da Páscoa.
    * @return O dia calculado da Páscoa.
    */
    public static int calculaPascoa(int a){
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

    public static void main(String[] args){
        Scanner leitura = new Scanner(System.in);

        // Loop para continuar perguntando o ano a ser calculado
        while(true){
            System.out.print("Digite o ano: ");
            String lido = leitura.nextLine();

            try{
                int ano = Integer.parseInt(lido); //Se o valor digitado for um número
                System.out.printf("A pascoa cai no dia "+calculaPascoa(ano)+"!\n\n");
            }
            catch(NumberFormatException e){
                System.out.println("Ano inválido!");
                break;
            }
        }
        leitura.close();
    }
}