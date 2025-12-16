function calculaPascoa(a::Int)
    c = a ÷ 100
    n = a % 19
    k = (c - 17) ÷ 25

    i = c - c÷4 - ((c-k)÷3) + (19*n) + 15
    i = i - (30*(i÷30))
    i = i - ((i÷28)*(1-(i÷28))*(29÷(i+1))*((21-n)÷11))

    j = a + a÷4 + i + 2 - c + c÷4
    j = j - (7*(j÷7))

    l = i - j
    m = 3 + ((l+40)÷44)
    d = l + 28 - (31*(m÷4))
    return d
end

# Loop para continuar perguntando o ano a ser calculado
while true
    print("Digite o ano: ")
    lido = readline()
    ano = Int

    try
        ano = parse(Int, lido) #Se o valor digitado for um número
    catch e
        print("Ano inválido!")
        break
    end
    println("A Páscoa cai no dia $(calculaPascoa(ano))!")
end
        