
orderStatusSettings();

function orderStatusSettings() {
    var stageOne = document.getElementById("line1");
    var stageTwo = document.getElementById("line2");
    var stageThree = document.getElementById("line3");

    var pending = document.getElementById("pending");
    var processing = document.getElementById("processing");
    var shipped = document.getElementById("shipped");
    var delivered = document.getElementById("delivered");

    var pendingTxt = document.getElementById("pending2");
    var processingTxt = document.getElementById("processing2");
    var shippedTxt = document.getElementById("shipped2");
    var deliveredTxt = document.getElementById("delivered2");

    if (orderStatus == 'pending') {
        pending.style.backgroundColor = '#39c43e';
        pendingTxt.style.fontWeight = 700;
    }

    if (orderStatus == 'processing') {
        pending.style.backgroundColor = '#39c43e';
        processing.style.backgroundColor = '#39c43e';
        stageOne.style.backgroundColor = '#39c43e';
        processingTxt.style.fontWeight = 700;
    }

    if (orderStatus == 'shipped') {
        pending.style.backgroundColor = '#39c43e';
        processing.style.backgroundColor = '#39c43e';
        shipped.style.backgroundColor = '#39c43e';
        stageOne.style.backgroundColor = '#39c43e';
        stageTwo.style.backgroundColor = '#39c43e';
        shippedTxt.style.fontWeight = 700;
    }

    if (orderStatus == 'delivered') {
        pending.style.backgroundColor = '#39c43e';
        processing.style.backgroundColor = '#39c43e';
        shipped.style.backgroundColor = '#39c43e';
        delivered.style.backgroundColor = '#39c43e';
        stageOne.style.backgroundColor = '#39c43e';
        stageTwo.style.backgroundColor = '#39c43e';
        stageThree.style.backgroundColor = '#39c43e';
        deliveredTxt.style.fontWeight = 700;
    }

}