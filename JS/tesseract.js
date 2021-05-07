//import Tesseract from 'tesseract.js';

function recognisePicture(){
    alert("This may take up to 10 s")
    Tesseract.recognize(
    document.getElementById("receipt").src,
    'eng',
    { logger: m => console.log(m) }
    ).then(({ data: { text } }) => {
        text = text.toLowerCase();
        document.getElementById("result").innerHTML = text;
    //return text;
    })
};

function getFile(){
    document.getElementById("receipt").src = "ICO/PICTURES/samplePic.jpg";
};

function bigScreen(){
    document.getElementById("big-pic").src = document.getElementById("receipt").src;
    if(document.getElementById("big-pic").style.visibility == "hidden"){
        document.getElementById("big-pic").style.visibility = "visible"
    }else{
        document.getElementById("big-pic").style.visibility = "hidden";
    }
};

function getProducts(){
    var value = /\d+/g;
    var input = document.getElementById("result").textContent;
    var i;
    var output = "";
    i = input.search("reland.") + 7;
    do{
        output+= input.charAt(i);
        i++;
    }while(input.lastIndexOf("debit") != i);
    output = output.replaceAll("eur", "");
    var totals = output.match(value);// Gets all ints
    //alert(totals[1]);

    document.getElementById("products").innerHTML = output;
}