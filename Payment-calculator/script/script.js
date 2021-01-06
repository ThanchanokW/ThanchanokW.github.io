console.log("Hello World");
var intrate = 0;
var period = 3;
var amount = 0;
var monthly = 0;
$(document).ready(function() {
    
    $('input[type=radio][name="intrate"]').change(function() {
        intrate = parseInt($(this).val());
        // console.log(intrate);
    });

    $('input[type=radio][name="period"]').change(function() {
        period = parseInt($(this).val());
        // console.log(period);
    });
  })

function calculate() {
    amount = document.getElementById("amount").innerHTML;
    // var amount = document.getElementByName("amount").value;
    // console.log("This is from calculation" + amount);
    // console.log("This is from calculation" + intrate);
    // console.log("This is from calculation" + period);
    monthly = ((amount - (amount*0.1))*(intrate/100))+(amount - (amount*0.1))/period;
    payment.innerHTML = monthly.toFixed(2);
}


