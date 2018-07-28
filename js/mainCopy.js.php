(function() {
    apiUrl = "https://woc.reference.genitrust.com";
    //apiurl = "http://woc.reference.genitrust.com";
    publisherId = 52;
    deviceName = "DASH WALLET (WEB)"

    //var device = (Math.floor(Math.random()*9000000) + 1000000);
    //var deviceCode = device + "-" + device + "-" + device + "-" + device;

    localStorage.setItem("deviceName", deviceName);
    //localStorage.setItem("deviceCode", deviceCode);

    var device = localStorage.getItem("deviceCode");

    if(device != null) {
        deviceCode = device;
    }
    else{
        deviceCode = "5571166-5571166-5571166-5571166";
    }

    /*localStorage.removeItem("deviceName");
    localStorage.removeItem("Email");
    localStorage.removeItem("Offer");
    localStorage.removeItem("deviceCode");
    localStorage.removeItem("PurchaseCode");
    localStorage.removeItem("PurchaseToken");
    localStorage.removeItem("PurchaseId");
    localStorage.removeItem("deviceId");
    localStorage.removeItem("storageName");
    localStorage.removeItem("bank");
    localStorage.removeItem("phone");
    localStorage.removeItem("discoveryId");
    localStorage.removeItem("availableAuthSource");
    localStorage.removeItem("recentDeviceName");
    localStorage.removeItem("Response");
    localStorage.removeItem("test");
    localStorage.removeItem("signInNumber");
    localStorage.removeItem("Crypto");
    localStorage.removeItem("CryptoDetails");
    localStorage.removeItem('amount');
    localStorage.removeItem("holds");
    localStorage.removeItem("holdId");
    localStorage.removeItem("orders");
    localStorage.removeItem("WDOrder");*/

    /*function getCrypto() {
        return ($('#crypto').is(':checked')?'DASH':'BTC');
    }*/

    function displayOption(options,doubleDeposit,multipleBanks) {

        var cryptoCurrency = localStorage.getItem("CryptoDetails");
        var currency = JSON.parse(cryptoCurrency);

        /*for single deposit*/
        if(options.length > 0){
            $('<h5 style="text-align: center;">Below are offers for $'+localStorage.getItem("amount")+'. You must click the ORDER button before you receive instructions to pay at the Cash Payment center. </h5>').insertAfter('#header');
        }

        for(var j = 0; j < currency.length; j++) {

            for (var i = 0; i < options.length; i++) {

                var address = options[i].address;

                if(options[i].crypto == currency[j].code) {

                    if (options[i].crypto == 'DASH') {

                        if (address != '') {

                            $("#offer_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + options[i].bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + options[i].amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + options.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + options[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + options[i].amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + options[i].bankName + '</span></a></p><small class="pull-right">Pay $' + options[i].deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + options[i].address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#offer_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + options[i].bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + options[i].amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + options.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + options[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + options[i].amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + options[i].bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + options[i].deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + options[i].bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (options[i].crypto == 'PIVX'){

                        if (address != '') {
                            $("#offer_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + options[i].bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + options[i].amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + options.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + options[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + options[i].amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + options[i].bankName + '</span></a></p><small class="pull-right">Pay $' + options[i].deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + options[i].address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#offer_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + options[i].bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + options[i].amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + options.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + options[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + options[i].amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + options[i].bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + options[i].deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + options[i].bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (options[i].crypto == 'BTC'){

                        if (address != '') {
                            $("#offer_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + options[i].bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + options[i].amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + options.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + options[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + options[i].amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + options[i].bankName + '</span></a></p><small class="pull-right">Pay $' + options[i].deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + options[i].address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#offer_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + options[i].bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + options[i].amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + options.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + options[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + options[i].amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + options[i].bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + options[i].deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + options[i].bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                }
            }
        }
        /*code end here*/

        /*for double deposit*/
        if(doubleDeposit.length > 0){
            $('<h5 style="text-align: center;">Best Value Options: More '+localStorage.getItem("Crypto")+' for $'+localStorage.getItem("amount")+' Cash</h5>').insertAfter('#offer_div');

        }

        /*for(var j = 0; j < currency.length; j++) {
            for (var i = 0; i < doubleDeposit.length; i++) {

                var firstOffer = doubleDeposit[i].firstOffer;

                if(firstOffer.crypto == currency[j].code) {

                    if (firstOffer.crypto == 'DASH') {

                        if (address != '') {

                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + firstOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + firstOffer.amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + firstOffer.amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + firstOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + firstOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + firstOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + firstOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + firstOffer.amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + firstOffer.amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + firstOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + firstOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + firstOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (firstOffer.crypto == 'PIVX'){

                        if (address != '') {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + firstOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + firstOffer.amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + firstOffer.amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + firstOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + firstOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + firstOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + firstOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + firstOffer.amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + firstOffer.amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + firstOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + firstOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + firstOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (firstOffer.crypto == 'BTC'){

                        if (address != '') {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + firstOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + firstOffer.amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + firstOffer.amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + firstOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + firstOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + firstOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + firstOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + firstOffer.amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + firstOffer.amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + firstOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + firstOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + firstOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                }

                var secondOffer = doubleDeposit[i].secondOffer;

                if(secondOffer.crypto == currency[j].code) {

                    if (secondOffer.crypto == 'DASH') {

                        if (address != '') {

                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + secondOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + secondOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (secondOffer.crypto == 'PIVX'){

                        if (address != '') {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + firstOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + secondOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (secondOffer.crypto == 'BTC'){

                        if (address != '') {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + secondOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="offerId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + secondOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                }
            }
        }*/
        /*code end here*/

        /*for double deposit with single offer*/
        for(var j = 0; j < currency.length; j++) {
            for (var i = 0; i < doubleDeposit.length; i++) {

                var firstOffer = doubleDeposit[i].firstOffer;
                var deposit = doubleDeposit[i].totalDeposit;
                var totalAmount = 0;
                var totalDots = 0;
                var firstOffer_amount = 0;
                var firstOffer_dots = 0;
                var pay = deposit.amount;


                if(firstOffer.crypto == currency[j].code) {

                    if (firstOffer.crypto == 'DASH') {

                        var firstOffer_amount = firstOffer.amount.DASH;
                        var firstOffer_dots = firstOffer.amount.dots;

                    }
                    else if (firstOffer.crypto == 'PIVX'){

                        var firstOffer_amount = firstOffer.amount.PIVX;
                        var firstOffer_dots = firstOffer.amount.uPiv;
                    }
                    else if (firstOffer.crypto == 'BTC'){

                        var firstOffer_amount = firstOffer.amount.BTC;
                        var firstOffer_dots = firstOffer.amount.bits;
                    }
                }


                var secondOffer = doubleDeposit[i].secondOffer;

                if(secondOffer.crypto == currency[j].code) {

                    if (secondOffer.crypto == 'DASH') {

                        var secondOffer_amount = secondOffer.amount.DASH;
                        var secondOffer_dots = secondOffer.amount.dots;

                        var totalAmount = Number(firstOffer_amount)+Number(secondOffer_amount);
                        var totalDots = parseFloat(firstOffer_dots)+parseFloat(secondOffer_dots);

                        if (address != '') {

                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + currency[j].symbol + ' ' + totalAmount + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="doubleofferId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">(' + currency[j].minorSymbol + ' ' + totalDots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + pay + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + currency[j].symbol + ' ' + totalAmount + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="doubleofferId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">(' + currency[j].minorSymbol + ' ' + totalDots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + pay + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }


                    }
                    else if (secondOffer.crypto == 'PIVX'){

                        var secondOffer_amount = secondOffer.amount.PIVX;
                        var secondOffer_dots = secondOffer.amount.uPiv;

                        var totalAmount = Number(firstOffer_amount)+Number(secondOffer_amount);
                        var totalDots = parseFloat(firstOffer_dots)+parseFloat(secondOffer_dots);

                        if (address != '') {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + totalAmount + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="doubleofferId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + totalDots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + firstOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + totalAmount + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="doubleofferId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + totalDots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + secondOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (secondOffer.crypto == 'BTC'){

                        var secondOffer_amount = secondOffer.amount.BTC;
                        var secondOffer_dots = secondOffer.amount.bits;

                        var totalAmount = Number(firstOffer_amount)+Number(secondOffer_amount);
                        var totalDots = parseFloat(firstOffer_dots)+parseFloat(secondOffer_dots);

                        if (address != '') {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + totalAmount + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="doubleofferId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + totalDots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + secondOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#doubleDeposit_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + totalAmount + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="CreateHold(' + i + ',' + doubleDeposit.length + ');">ORDER</button><input type="hidden" id="doubleofferId_' + i + '" name="doubleofferId_' + i + '" value="' + doubleDeposit[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + totalDots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + secondOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                }
            }
        }
        /*code end here*/

        /*for multiple banks*/
        if(multipleBanks.length > 0){
            $('<h5 style="text-align: center;">Best Value Options: More '+localStorage.getItem("Crypto")+' for $'+localStorage.getItem("amount")+' Cash</h5>').insertAfter('#doubleDeposit_div');
        }

        for(var j = 0; j < currency.length; j++) {
            for (var i = 0; i < multipleBanks.length; i++) {

                var multipleOffer = multipleBanks[i].firstOffer;

                if(multipleOffer.crypto == currency[j].code) {

                    if (multipleOffer.crypto == 'DASH') {

                        if (address != '') {

                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + multipleOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + multipleOffer.amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + multipleOffer.amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + multipleOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + multipleOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + multipleOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + multipleOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + multipleOffer.amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + multipleOffer.amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + multipleOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + multipleOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + multipleOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (multipleOffer.crypto == 'PIVX'){

                        if (address != '') {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + multipleOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + multipleOffer.amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + multipleOffer.amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + multipleOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + multipleOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + multipleOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + multipleOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + multipleOffer.amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + multipleOffer.amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + multipleOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + multipleOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + multipleOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (multipleOffer.crypto == 'BTC'){

                        if (address != '') {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + multipleOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + multipleOffer.amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + multipleOffer.amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + multipleOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + multipleOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + multipleOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + multipleOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + multipleOffer.amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + multipleOffer.amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + multipleOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + multipleOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + multipleOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                }

                var secondOffer = multipleBanks[i].secondOffer;

                if(secondOffer.crypto == currency[j].code) {

                    if (secondOffer.crypto == 'DASH') {

                        if (address != '') {

                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + secondOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.DASH + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.dots + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + secondOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (secondOffer.crypto == 'PIVX'){

                        if (address != '') {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + secondOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.PIVX + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.uPiv + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + secondOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                    else if (secondOffer.crypto == 'BTC'){

                        if (address != '') {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span></a></p><small class="pull-right">Pay $' + secondOffer.deposit.amount + '</small><p style="margin: 0px; text-align: left;">' + secondOffer.address + '</p></div></div></div></div></div>');
                        }
                        else {
                            $("#multiplebanks_div").append('<div class="row list-group"><div class="col-sm-12"><div class="list bgc-fff pad-10 box-shad  property-listing"><div class="media"><a class="pull-left" href="#" target="_parent"><img alt="image" style="height: 50px; width: 50px;"class="img-responsive" src=' + secondOffer.bankLogo + '></a><div class="media-body fnt-smaller"><a href="#" target="_parent"  style="color: #080808;"></a><p class="media-heading" style="text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>'+currency[j].symbol+' ' + secondOffer.amount.BTC + '</span><small class="pull-right"><button type="button" class="btn btn-success" id="orderBtn" name="orderBtn" onclick="holdCreate(' + i + ',' + multipleBanks.length + ');">ORDER</button><input type="hidden" id="offerId_' + i + '" name="offerId_' + i + '" value="' + multipleBanks[i].id + '"></small></a></p><p style="margin: 0px; text-align: left;">('+currency[j].minorSymbol+' ' + secondOffer.amount.bits + ')</p><p class="media-heading" style="margin: 0px; text-align: left;"><a href="#" target="_parent" style="color: #080808;"><span>' + secondOffer.bankName + '</span><small class="pull-right" style="margin-right: -60px; margin-top: 5px;">Pay $' + secondOffer.deposit.amount + '</small></a></p><p style="margin: 0px; text-align: left;">Subject to local availability  ' + '<a class="pull-right" href="' + secondOffer.bankLocationUrl + '">Check Location' + '</a></p></div></div></div></div></div>');
                        }
                    }
                }
            }
        }
        /*code end*/
    }

    function displayBankOptions(options) {
        $('#banks').html('<option value="">Select Payment Center</option>');
        for(var i=0;i<options.length;i++){
            $('#banks').append('<option value="'+options[i].id+'">'+options[i].name+'</option>');
        }
    }

    function displayCryptoOptions(options) {

        for(var i=0;i<options.length;i++){
            $('#crypto').append('<option value="'+options[i].code+'">'+options[i].symbol+' '+options[i].name+'</option>');
            //$('#crypto').append('<option value="'+options[i].code+'"><span class="fa-fa circle">'+options[i].symbol+'</span>'+options[i].name+'</option>');

        }
    }

    var actions = {
        getBanks: function () {
            var reqUrl = apiUrl+'/api/v1/banks/';
            $.ajax({
                url: reqUrl,
                headers: {"X-Coins-Publisher": publisherId},
                success: function(data) {
                    displayBankOptions(data);
                },
            });
        },
        discovery: function () {
            var reqUrl = apiUrl +'/api/v1/discoveryInputs/';
            var zip = localStorage.getItem("storageName");
            var amount = $('#amount').val();

            var latitude = localStorage.getItem("latitude");
            var longitude = localStorage.getItem("longitude");

            var cryptoCurrency = localStorage.getItem("Crypto");

            if(latitude !=null && longitude !=null)
            {
                var postData = {
                    "browserLocation": [
                        "latitude", latitude,
                        "longitude", longitude
                    ],
                    "country": "us",
                    "crypto": cryptoCurrency,
                    "cryptoAmount": "0",
                    "usdAmount": amount,
                }
            }
            else
            {
                if(zip == null || zip == "undefined")
                {
                    var bank = localStorage.getItem("bank");
                }

                var postData = {
                    'publisherId': publisherId,
                    'usdAmount': amount,
                    'crypto': cryptoCurrency,
                    'bank': bank,
                    'zipCode': zip,
                    'cryptoAmount': '0'
                };
            }

            $.ajax({
                url: reqUrl,
                headers: {"X-Coins-Publisher": publisherId},
                data: postData,
                method: 'POST',
                success: function(data) {
                    localStorage.removeItem("latitude");
                    localStorage.removeItem("longitude");
                    localStorage.removeItem("bank");
                    localStorage.removeItem("storageName");
                    localStorage.setItem("discoveryId",data.id);
                    location.href = "order.html";
                }
            });
        },
        getOffers: function () {
            $.ajax({
                url: apiUrl+'/api/v1/discoveryInputs/'+localStorage.getItem("discoveryId")+'/offers/',
                headers: {"X-Coins-Publisher": publisherId},
                success: function(data) {
                    //localStorage.removeItem("discoveryId");


                    if(data.singleDeposit == '' && data.doubleDeposit == '' && data.multipleBanks == '')
                    {
                        alert("offers not available");
                    }
                    else
                    {
                        displayOption(data.singleDeposit,data.doubleDeposit,data.multipleBanks);
                    }
                }
            });
        },
        authUser: function () {
            var phone = $('#phone').val();
            $.ajax({
                url: apiUrl+'/api/v1/auth/+1'+phone+'/',
                headers: {"X-Coins-Publisher": publisherId},
                method: 'GET',
                success: function(data) {
                    localStorage.setItem("availableAuthSource",data.availableAuthSources);
                    var source = localStorage.getItem("availableAuthSource");
                    localStorage.setItem("recentDeviceName",data.recentDeviceName);

                    var sign_in_number = localStorage.getItem("signInNumber");

                    //$('#createHoldWithTokenBtn').trigger('click');
                    if(source == "password,device") {
                        if(sign_in_number == null){
                            var modal = document.getElementById('myModal');
                            modal.style.display = "block";
                        }
                    }
                    else if(source == "password") {
                        if(sign_in_number == null) {
                            var modal = document.getElementById('myModal');
                            modal.style.display = "block";
                        }
                    }
                    else {
                        //var device_id = localStorage.getItem("deviceId");
                        $('#createHoldWithTokenBtn').trigger('click');
                    }
                },
                error: function (data) {

                    if(data.status == 404)
                    {
                        $('#createHoldBtn').trigger('click');
                    }
                }
            });
        },
        createHold: function () {
            var phone = $('#phone').val();
            var offer_Id = localStorage.getItem("Offer");
            //var deviceCode = "6525648B-71DD-4846-9274-5B7815F85C85";
            localStorage.setItem("signInNumber",phone);

            var check_number = JSON.parse(localStorage.getItem("test"));
            var phoneNUmber = localStorage.getItem("phone");

            if(check_number != null) {
                for(var i = 0; i < check_number.length; i++) {
                    if(phoneNUmber == check_number[i].phone) {
                        localStorage.setItem("deviceCode",check_number[i].device_code);
                    }
                    else {

                        var testCode = deviceCode.split("-");
                        var code = testCode[3];
                        var device = Number(code)+1;
                        var device_code = "5571166-5571166-5571166-"+device;
                        deviceCode = device_code;
                        localStorage.setItem("deviceCode", device_code);
                        //deviceCode + 1;
                    }
                }
            }
            else {
                localStorage.setItem("deviceCode", deviceCode);
            }

            var requestHeader = {
                "X-Coins-Publisher": publisherId,
            }

            var postData = {
                'phone': "+1"+phone,
                'email': localStorage.getItem("Email"),
                'offer': offer_Id,
                'deviceName': localStorage.getItem("deviceName"),
                'deviceCode': localStorage.getItem("deviceCode"),
            }
            $.ajax({
                url: apiUrl+'/api/v1/holds/',
                headers: requestHeader,
                data: postData,
                method: 'POST',
                success: function(data) {
                    localStorage.removeItem("Offer");
                    localStorage.removeItem("Email");

                    var purchase_code = data.__PURCHASE_CODE;
                    var purchse_token = data.token;
                    var id = data.id;
                    var device_id = data.deviceId;

                    localStorage.setItem("PurchaseCode",purchase_code);
                    localStorage.setItem("PurchaseToken",purchse_token);
                    localStorage.setItem("PurchaseId",id);
                    localStorage.setItem("deviceId",device_id);

                    /* for reference */
                    var test = localStorage.getItem("test");
                    var obj = [];
                    if(test){
                        obj= JSON.parse(test);
                    }
                    if(obj.length > 0){
                        for(var i = 0; i<obj.length; i++){
                            if(obj[i].phone != localStorage.getItem("phone")){
                                obj.push({"phone": phone,"device_id": device_id,"device_code":localStorage.getItem("deviceCode"),"token":purchse_token});
                            }
                        }
                    }
                    else {
                        obj.push({"phone": phone,"device_id": device_id,"device_code":localStorage.getItem("deviceCode"),"token":purchse_token});
                    }

                    localStorage.setItem("test",JSON.stringify(obj));
                    /* code end here */

                    /* for order list to show order for deposit or cancel */
                    /*var order = localStorage.getItem("orders");
                    var Orderobj = [];
                    if(order){
                        Orderobj = JSON.parse(order);
                    }
                    for(var i = 0; i<Orderobj.length; i++){
                        if(Orderobj[i].phone != localStorage.getItem("phone")){
                            Orderobj.push({"phone": phone,"device_id": device_id,"device_code":localStorage.getItem("deviceCode"),"token":purchse_token});
                        }
                    }
                    localStorage.setItem("orders",JSON.stringify(Orderobj));*/
                    /* code end here */
                    location.href = "purchase-code.html";
                }
            });


            /*$.ajax({
                url: apiUrl+'/api/v1/holds/',
                data: postData,
                method: 'POST',
                beforeSend: function(xhrObj) {
                    xhrObj.setRequestHeader("X-Coins-Publisher", publisherId);
                    xhrObj.setRequestHeader("Accept","application/json");
                },
                success: function(data) {
                    localStorage.removeItem("Offer");
                    localStorage.removeItem("Email");

                    var purchase_code = data.__PURCHASE_CODE;
                    var purchse_token = data.token;
                    var id = data.id;
                    var device_id = data.deviceId;

                    localStorage.setItem("PurchaseCode",purchase_code);
                    localStorage.setItem("PurchaseToken",purchse_token);
                    localStorage.setItem("PurchaseId",id);
                    localStorage.setItem("deviceId",device_id);

                    var test = localStorage.getItem("test");
                    var obj = [];
                    if(test){
                        obj = JSON.parse(test);
                    }
                    obj.push({"phone": phone,"device_id": device_id,"device_code":localStorage.getItem("deviceCode"),"token":purchse_token});
                    localStorage.setItem("test",JSON.stringify(obj));
                    location.href = "purchase-code.html";
                }
            });*/
        },
        confirm: function () { //capture hold api
            var token = localStorage.getItem("PurchaseToken");
            var id = localStorage.getItem("PurchaseId");

            var form = new FormData();
            form.append("verificationCode", localStorage.getItem("PurchaseCode"));

            var settings = {
                "async": true,
                "crossDomain": true,
                "url": apiUrl+"/api/v1/holds/"+id+"/capture/",
                "method": "POST",
                "headers": {
                    "X-Coins-Publisher": publisherId,
                    "X-Coins-Api-Token": token,
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            }

            $.ajax(settings).done(function (response) {

                localStorage.setItem("Response",response);

                var number = localStorage.getItem("phone");
                var testone = localStorage.getItem("test");

                if(testone != null) {
                    var obj = JSON.parse(testone);
                    for (var i = 0; i < obj.length; i++) {
                        if(obj[i].phone == number) {
                            obj[i]["response"] = localStorage.getItem("Response");
                            obj[i]["crypto"] = localStorage.getItem("Crypto");
                            localStorage.setItem("test",JSON.stringify(obj));
                        }
                    }

                    var order = localStorage.getItem("orders");
                    if(order != null) {
                        var obj = JSON.parse(order);
                        for (var i = 0; i < obj.length; i++) {
                            if(obj[i].phone == number) {
                                obj[i]["response"] = localStorage.getItem("Response");
                                obj[i]["crypto"] = localStorage.getItem("Crypto");
                                localStorage.setItem("orders",JSON.stringify(obj));
                            }
                        }
                    }
                }
                else {
                    var device_id = localStorage.getItem("deviceId");
                    var purchse_token = localStorage.getItem("PurchaseToken");

                    /* for order list to show wd order to deposit or cancel*/
                    var order = localStorage.getItem("orders");
                    var jsonobj = [];
                    if(order){ jsonobj = JSON.parse(order); }
                    jsonobj.push({"phone": number,"device_id": device_id,"device_code":localStorage.getItem("deviceCode"),"token":purchse_token});
                    localStorage.setItem("orders",JSON.stringify(jsonobj));

                    var testone = localStorage.getItem("orders");

                    if(testone != null){
                        var obj = JSON.parse(testone);
                        for (var i = 0; i < obj.length; i++) {
                            if(obj[i].phone == number) {
                                obj[i]["response"] = localStorage.getItem("Response");
                                obj[i]["crypto"] = localStorage.getItem("Crypto");
                                localStorage.setItem("orders",JSON.stringify(obj));
                            }
                        }
                    }
                    /* for order list to show wd order to deposit or cancel code end here*/

                    /* used for reference before */
                    var test = localStorage.getItem("test");
                    var obj = [];
                    if(test){
                        obj= JSON.parse(test);
                    }
                    obj.push({"phone": number,"device_id": device_id,"device_code":localStorage.getItem("deviceCode"),"token":purchse_token});
                    localStorage.setItem("test",JSON.stringify(obj));

                    var testone = localStorage.getItem("test");

                    if(testone != null){
                        var obj = JSON.parse(testone);
                        for (var i = 0; i < obj.length; i++) {
                            if(obj[i].phone == number)
                            {
                                obj[i]["response"] = localStorage.getItem("Response");
                                obj[i]["crypto"] = localStorage.getItem("Crypto");
                                localStorage.setItem("test",JSON.stringify(obj));
                            }
                        }
                    }
                    /* code end here */

                    /*localStorage.setItem("test",response);
                    alert(localStorage.getItem("test"));*/
                }

                location.href = "deposit.html";
            });
        },
        confirmDeposit: function () {
            var order_id = $('#order_id').val();

            /*var settings = {
                /!*"async": true,*!/
                /!*"crossDomain": true,*!/
                "url": apiUrl+"/api/v1/orders/"+order_id+"/confirmDeposit/",
                "method": "POST",
                "headers": {
                    "X-Coins-Publisher": publisherId,
                    "X-Coins-Api-Token": localStorage.getItem("PurchaseToken")
                },
                /!*"processData": false,*!/
                /!*"contentType": false,*!/
                /!*"mimeType": "multipart/form-data",*!/
            }

            $.ajax(settings).done(function (response) {
                //console.log(response);
                location.href = "buy-more-dash.html";
            });*/

            /*var requestHeader = {
                "X-Coins-Publisher": publisherId,
                "X-Coins-Api-Token": localStorage.getItem("PurchaseToken")
            }*/

            $.ajax({
                async: true,
                url: apiUrl+'/api/v1/orders/'+order_id+'/confirmDeposit/',
                headers: {
                    "X-Coins-Publisher": publisherId,
                    "X-Coins-Api-Token": localStorage.getItem("PurchaseToken"),
                },
                method: 'POST',
                data: '',
                dataType: 'json',
                contentType: false,
                success: function(data) {

                    var phone_number = localStorage.getItem("phone");
                    localStorage.setItem("signInNumber",phone_number);
                    location.href = "buy-more-dash.html";
                },
                error: function (data) {

                    var phone_number = localStorage.getItem("phone");
                    localStorage.setItem("signInNumber",phone_number);
                    location.href = "buy-more-dash.html";
                }
            });
        },
        cancelOrder: function (e) {
            var order_id = $('#order_id').val();

            var requestHeader = {
                "X-Coins-Publisher": publisherId,
                "X-Coins-Api-Token": localStorage.getItem("PurchaseToken"),
            }
            $.ajax({
                async: true,
                crossDomain: true,
                url: apiUrl+'/api/v1/orders/'+order_id+'/',
                headers: requestHeader,
                method: 'DELETE',
                processData: false,
                contentType: false,
                success: function(data) {

                    var phone_number = localStorage.getItem("phone");
                    localStorage.setItem("signInNumber",phone_number);
                    location.href = "buy-more-dash.html";
                },
                error: function(data) {

                    var phone_number = localStorage.getItem("phone");
                    localStorage.setItem("signInNumber",phone_number);
                    location.href = "buy-more-dash.html";
                }
            });
        },
        getOrders: function () {
            $.ajax({
                url: apiUrl+'/api/v1/orders/',
                headers: {
                    "X-Coins-Publisher": publisherId,
                    "X-Coins-Api-Token": localStorage.getItem("PurchaseToken")
                },
                method: "GET",
                success: function(data) {

                    /*localStorage.setItem("orders",JSON.stringify(data));*/
                    localStorage.setItem("orderList",JSON.stringify(data));
                    var phone = localStorage.getItem("phone");
                    var signInNumber = localStorage.getItem("signInNumber");

                    if(signInNumber == null) {
                        localStorage.setItem("signInNumber",phone);
                        var signInNumber = localStorage.getItem("signInNumber");
                    }

                    var test = JSON.stringify(data);
                    var orders = JSON.parse(test);
                    if(orders.length > 0) {
                        if(phone == signInNumber) {
                            for(var i = 0; i<orders.length; i++){
                                if(orders[i].status == "WD") {
                                    /*localStorage.setItem("WDOrder",orders[i]);
                                    alert(localStorage.getItem("WDOrder"));*/
                                    location.href = "deposit.html";
                                }
                            }
                        }
                        setTimeout(function () {
                            location.href = "buy-more-dash.html";
                        },2000);
                    }
                    else {
                        location.href = "buy-more-dash.html";
                    }
                },
                error: function (data) {
                    location.href = "buy-more-dash.html";
                }
            });
        },
        /*signIn: function () {
            alert("test");
            return false;
            var phone = localStorage.getItem("phone");
            $.ajax({
                url: apiUrl+'/api/v1/auth/'+phone+'/',
                headers: {"X-Coins-Publisher": publisherId},
                method: 'GET',
                success: function(data) {
                    location.href = "buy-dash-with-cash_with-sign-out.html";
                }
            });
        },*/
        signOut: function () {
            var phone = localStorage.getItem("phone");
            $.ajax({
                url: apiUrl+'/api/v1/auth/+1'+phone+'/',
                headers: {"X-Coins-Publisher": publisherId},
                method: 'DELETE',
                success: function(data) {
                    localStorage.removeItem("signInNumber");
                    localStorage.removeItem("phone");
                    localStorage.removeItem("Crypto");
                    /*localStorage.removeItem("orders");*/
                    /*localStorage.removeItem("test");*/
                    localStorage.removeItem("orderList");
                    //location.href = "buy-dash-with-cash.html";
                    location.href = "index.html";
                }
            });
        },
        getAuthToken: function () {
            var phone = localStorage.getItem("phone");
            var password = $('#password').val();

            var postData = {
                'password': password,
            }
            $.ajax({
                //url: 'https://woc.reference.genitrust.com' + '/api/v1/auth/' + (phone[0]=='+'?phone.substring(1):phone) + '/authorize/',
                url: apiUrl + '/api/v1/auth/+1'+phone+'/authorize/',
                headers: {"X-Coins-Publisher": publisherId},
                data: postData,
                method: 'POST',
                success: function(data) {

                    var token = data.token;
                    localStorage.setItem("PurchaseToken",token);
                    $('#createHoldWithTokenBtn').trigger('click');
                },
                error: function(data) {
                    //location.href = "confirm-deposite.html";
                },
            });
        },
        createHoldWithToken: function () {
            var requestHeader = {
                "X-Coins-Publisher": publisherId,
                "X-Coins-Api-Token": localStorage.getItem("PurchaseToken")
            }

            var check = localStorage.getItem("test");

            var postData = {
                'offer': localStorage.getItem("Offer")
            }

            $.ajax({
                url: apiUrl+'/api/v1/holds/',
                headers: requestHeader,
                data: postData,
                method: 'POST',
                success: function(data) {

                    var purchase_code = data.__PURCHASE_CODE;
                    var id = data.id;

                    localStorage.setItem("PurchaseCode",purchase_code);
                    localStorage.setItem("PurchaseId",id);

                    /* for reference */
                    var test = localStorage.getItem("test");
                    var obj = [];
                    if(test){
                        obj= JSON.parse(test);
                    }
                    for(var i = 0; i<obj.length; i++){
                        if(obj[i].phone != localStorage.getItem("phone")){
                            obj.push({"phone": localStorage.getItem("phone"),"device_id": localStorage.getItem("deviceId"),"device_code":localStorage.getItem("deviceCode"),"token":localStorage.getItem("PurchaseToken")});
                        }
                    }
                    /*obj.push({"phone": localStorage.getItem("phone"),"device_id": localStorage.getItem("deviceId"),"device_code":localStorage.getItem("deviceCode"),"token":localStorage.getItem("PurchaseToken")});*/
                    localStorage.setItem("test",JSON.stringify(obj));
                    /* code end here */

                    /* for order list to show order for deposit or cancel */
                    var order = localStorage.getItem("orders");
                    var Orderobj = [];
                    if(order){
                        Orderobj = JSON.parse(order);
                    }
                    for(var i = 0; i<Orderobj.length; i++){
                        if(Orderobj[i].phone != localStorage.getItem("phone")){
                            Orderobj.push({"phone": localStorage.getItem("phone"),"device_id": localStorage.getItem("deviceId"),"device_code":localStorage.getItem("deviceCode"),"token":localStorage.getItem("PurchaseToken")});
                        }
                    }
                    localStorage.setItem("orders",JSON.stringify(Orderobj));
                    /* code end here */

                    location.href = "purchase-code.html";
                },
                error: function(data) {

                    $('#getHoldsBtn').trigger('click');
                    //location.href = "create-password.html";
                }
            });
        },
        getCryptos: function () {
            var requestHeader = {
                "X-Coins-Publisher": publisherId,
            }
            $.ajax({
                url: apiUrl+'/api/v1/crypto/',
                headers: requestHeader,
                data: '',
                method: 'GET',
                success: function(data) {
                    localStorage.setItem("CryptoDetails",JSON.stringify(data));
                    displayCryptoOptions(data);
                },
                error: function(data) {
                }
            });
        },
        getHolds: function () {
            var requestHeader = {
                "X-Coins-Publisher": publisherId,
                "X-Coins-Api-Token": localStorage.getItem("PurchaseToken")
            }
            $.ajax({
                url: apiUrl+'/api/v1/holds/',
                headers: requestHeader,
                data: '',
                method: 'GET',
                success: function(data) {

                    localStorage.setItem("holds",JSON.stringify(data));
                    var holds = JSON.parse(localStorage.getItem("holds"));

                    if(holds.length > 0) {
                        for(var i = 0; i< holds.length; i++) {
                            if(holds[i].status == "AC"){
                                localStorage.setItem("holdId",holds[i].id);
                                $('#deleteHoldBtn').trigger('click');
                            }
                        }
                        $('#getOrdersBtn').trigger('click');
                    }
                    else{
                        $('#createHoldWithTokenBtn').trigger('click');
                    }
                },
                error: function(data) {
                    //alert(data.status);
                }
            });
        },
        deleteHold: function () {
            var hold_id = localStorage.getItem("holdId");
            var requestHeader = {
                "X-Coins-Publisher": publisherId,
                "X-Coins-Api-Token": localStorage.getItem("PurchaseToken")
            }
            $.ajax({
                url: apiUrl+'/api/v1/holds/'+hold_id,
                headers: requestHeader,
                data: '',
                method: 'DELETE',
                success: function(data) {
                    $('#createHoldWithTokenBtn').trigger('click');
                },
                error: function(data) {
                    //alert(data.status);
                }
            });
        }
    }

    function init() {
        var clickHandlers = [
            'getBanks',
            'discovery',
            'getOffers',
            'authUser',
            'createHold',
            'getOrders',
            'confirm',
            'confirmDeposit',
            'cancelOrder',
            //'signIn',
            'signOut',
            'getAuthToken',
            'createHoldWithToken',
            'getCryptos',
            'getHolds',
            'deleteHold'
        ];
        for (var i=0;i<clickHandlers.length;i++){
            $('#'+clickHandlers[i]+'Btn').click(actions[clickHandlers[i]]);
        }
    }

    init();
})();
