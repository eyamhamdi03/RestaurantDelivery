function somme(){
    let o=parseFloat(document.getElementById("order").innerHTML);
    let d=parseFloat(document.getElementById("Discount").innerHTML);
    let D=parseFloat(document.getElementById("Delivery").innerHTML);
    let t=(o+D)-d
    document.getElementById("total").innerHTML=t+"Dt";

};
somme();
