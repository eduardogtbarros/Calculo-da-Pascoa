const readline = require('readline');

const leitura = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
});

function calculaPascoa(a){
    let c, n, k, i, j, l, m, d;

    c = Math.trunc(a/100);
    n = a %19;
    k = Math.trunc((c-17)/25);
    
    i = c - Math.trunc(c/4) - Math.trunc((c-k)/3) + (19*n) + 15;
    i = i - (30*Math.trunc(i/30));
    i = i - (Math.trunc(i/28)*(1-Math.trunc(i/28))*Math.trunc(29/(i+1))*Math.trunc((21-n)/11));
    
    j = a + Math.trunc(a/4) + i + 2 - c + Math.trunc(c/4);
    j = j - (7*Math.trunc(j/7));
    
    l = i - j;
    m = 3 + Math.trunc((l+40)/44);
    d = l + 28 - (31*Math.trunc(m/4));

    return d;
}

var ano;
function lerEntradas(){
    leitura.question('Digite o ano: ', (lido) => {
        if(!isNaN(lido)){
            ano = parseInt(lido);
            console.log(calculaPascoa(ano));
            lerEntradas();
        }else{
            console.log('Ano inválido.');
            leitura.close();
        }
    });
}

lerEntradas();