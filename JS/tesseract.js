//import Tesseract from 'tesseract.js';

function recognisePicture(){
    Tesseract.recognize(
    document.getElementById("receipt").src,
    'eng',
    { logger: m => console.log(m) }
    ).then(({ data: { text } }) => {
    document.getElementById("output").innerHTML = text;
    })
}