function range(inicio, fin) {
    const NUMEROS = [];
    for (let $i = inicio ; $i < (fin + 1); $i++) {
        NUMEROS.push($i)
    }
    return NUMEROS;
}

const NUMEROS = range(1,100);

for (const num of NUMEROS) {
    var $divTres = num % 3 == 0;
    var $divCinco = num % 5 == 0;

    if ($divTres && $divCinco) {
        console.log("fizzbuzz");
    } else if ($divTres) {
        console.log("fizz");
    } else if ($divCinco) {
        console.log("buzz");
    } else {
        console.log(num);
    }
}
