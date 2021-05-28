// var data = "- | reland. v coconut drink eur1.71 coffee eur4.00 yogurt eur1.49 total eur7.20 debit mastercard 7.20 peipass 1)) aid : ad000000041010 number o oxxxxxxxxxxxx3421 icc pan seq no : 00 auth code : 686998 merchant : 48369322 change due euro.00 !!*!****k*l*l*t*x*x‘k****x*‘k*!’k***ﬂi***** join clubcard today this visit could have earned you 7 clubcard points. to join, visit tesco.com/clubcard/join , | text 'join' to 80850 or call us on either 0800 591688 or 0330 1231688 | a chance to win | €250 tesco giftcard | by telling us about your trip @ www.tescoviews.ie | and collect 25 clubcard points. for full terms and conditions please visit tescoviews.ie thank you for shopping at carlow square 1890928446 | slan abhaile you do not have to live with b control and abuse in your home. support 1s right here in your community. visit www.safefreland.ie to find your local service or call the national domestic violence helpling 1 800 341 900 #safehomessafeconmunities 27/04/21 15:59 3693 072 9072 6031";

// var product = ["milk", "tomatoe"];
// var price = [1,2];
// var data1 = [product,price];

// function recognisePicture(){
//     alert("This may take up to 10 s")
//     Tesseract.recognize(
//     document.getElementById("receipt").src,
//     'eng',
//     { logger: m => console.log(m) }
//     ).then(({ data: { text } }) => {
//         text = text.toLowerCase();
//         text = getProducts(text);// change to text
//         shopDetails(text);
//         prompt(text);
//     })
//     return false;
// };//Read image with the Tesseract

// function getProducts(input){
//     var value = /\d+/g;
//     var i;
//     var output = "";
//     i = input.search("reland.");
//     do{
//         output+= input.charAt(i);
//         i++;
//     }while(input.lastIndexOf("total") != i);
    
//     //remove values
//     output = output.replaceAll("eur", "");
//     output = output.replaceAll("€", "");

//     //Get int values
//     var totals = output.match(value);// Gets all ints
//     var prices = [];
//     //alert(totals[1]);
//     for( i = 0 ; i < totals.length() ; i++ ){
//         prices = totals[i] + "." + totals[i+1];
        
//     }


//     document.getElementById("result").innerHTML =  input;
//     return output;
// }
// function shopDetails(input){
//     var storeName = "";
//     var storeAddress = "";
//     var i;
    
//     input = input.split();

//     //In this I tried to find text that would correspond to a location on earth
//     //Also the name of the store
//     //// for(i =0; i < input.length() ;i++){
//     //     // const cities = require('all-the-cities');
//     //     // cities.filter(city => city.name.match('Albuquerque'));
//     //// }


//     document.getElementById("storeName").value = storeName;
//     document.getElementById("storeAddress").value = storeAddress;
// };//get the location of the receipt


function bigScreen(){
    document.getElementById("big-pic").src = document.getElementById("receipt").src;
    if(document.getElementById("big-pic").style.visibility == "hidden"){
        document.getElementById("big-pic").style.visibility = "visible"
    }else{
        document.getElementById("big-pic").style.visibility = "hidden";
    }
};//Create a Big Screen

var loadFile = function(event){
    var img = document.getElementById('receipt');
    img.src = URL.createObjectURL(event.target.files[0]);
}//set the img tag to img

