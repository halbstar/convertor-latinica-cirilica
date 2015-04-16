/**
 * Created by umbra on 21.1.2015.
 */
var mapCirLat = {
    А:'A',
    Б:'B',
    В:'V',
    Г:'G',
    Д:'D',
    Ђ:'Đ',
    Е:'E',
    Ж:'Ž',
    З:'Z',
    И:'I',
    Ј:'J',
    К:'K',
    Л:'L',
    Љ:'Lj',
    М:'M',
    Н:'N',
    Њ:'Nj',
    О:'O',
    П:'P',
    Р:'R',
    С:'S',
    Т:'T',
    Ћ:'Ć',
    У:'U',
    Ф:'F',
    Х:'H',
    Ц:'C',
    Ч:'Č',
    Џ:'Dž',
    Ш:'Š',
    а:'a',
    б:'b',
    в:'v',
    г:'g',
    д:'d',
    ђ:'đ',
    е:'e',
    ж:'ž',
    з:'z',
    и:'i',
    ј:'j',
    к:'k',
    л:'l',
    љ:'lj',
    м:'m',
    н:'n',
    њ:'nj',
    о:'o',
    п:'p',
    р:'r',
    с:'s',
    т:'t',
    ћ:'ć',
    у:'u',
    ф:'f',
    х:'h',
    ц:'c',
    ч:'č',
    џ:'dž',
    ш:'š'
};
var mapLatCir = {
    A:'А',
        B:'Б',
        V:'В',
        G:'Г',
        Đ:'Ђ',
        E:'Е',
        Ž:'Ж',
        Z:'З',
        I:'И',
        J:'Ј',
        K:'К',
        M:'М',
        O:'О',
        P:'П',
        R:'Р',
        S:'С',
        T:'Т',
        Ć:'Ћ',
        U:'У',
        F:'Ф',
        H:'Х',
        Č:'Ч',
        Š:'Ш',
        a:'а',
        b:'б',
        v:'в',
        g:'г',
        đ:'ђ',
        e:'е',
        ž:'ж',
        z:'з',
        i:'и',
        j:'ј',
        k:'к',
        m:'м',
        o:'о',
        p:'п',
        r:'р',
        s:'с',
        t:'т',
        ć:'ћ',
        u:'у',
        f:'ф',
        h:'х',
        č:'ч',
        š:'ш'
};
var mapBeforeSpecial = {
        D:'Д',
        L:'Л',
        N:'Н',
        d:'д',
        l:'л',
        n:'н',
        c:'ц',
        C:'Ц'
};
var mapSpecial = {
        Lj:'Љ',
        Nj:'Њ',
        Dž:'Џ',
        lj:'љ',
        nj:'њ',
        dž:'џ',
        dj:'ђ',
        Dj:'Ђ',
        lž:'лж',
        nž:'Нж',
        Lž:'Лж',
        Nž:'Нж',
        cj:'ћ',
        Cj:'Ћ'
};
/*basic primer function*/
function convert(str, convertLat){
    //if(convertLat == undefined){
    //    convertLat = true;
    //}
     var convStr = "";
     for (var x = 0; x < str.length; x++)
     {
         // Slovo na poziciji
         var c = str.charAt(x);
         // Jedno slovo posle njega
         var a = (str.charAt(x+1));
         // Kombinovano slovo (lj, nj, dj, cj....)
         var b = (c+a);
         // Ako je cirilicno slovo
         if(mapCirLat[c] != undefined){
             convStr  += mapCirLat[c];
         }
         // Ako je latinicno
         else if(mapLatCir[c] != undefined && convertLat){
             convStr += mapLatCir[c];
         }
         // Ako je kombinovano sa j ili ž
         else if(mapBeforeSpecial[c] != undefined && (a =="j" || a =="ž" ) && convertLat){
             convStr  += mapSpecial[b];
             x++;
         }
         // Ako je L, D, N... a nije kombinovano sa j ili ž
         else if(mapBeforeSpecial[c] != undefined  && convertLat){
             convStr += mapBeforeSpecial[c];
         }
         // Sve ostalo (praznine i interpunkcije)
         else{
             convStr +=  c;
         }

     }
     return convStr;
}

// test
//console.log(convert("Макивић Жељко?, Makivić Željko!... lž Nž lud Djоrdjevicj",true));
