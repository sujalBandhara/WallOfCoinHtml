(function() {
    apiUrl = "https://woc.reference.genitrust.com";
    //apiurl = "http://woc.reference.genitrust.com";
    publisherId = 52;
    deviceName = "DASH WALLET (WEB)";
    deviceCode = "5571166-5571166-5571166-5571166";
    //var device = (Math.floor(Math.random()*9000000) + 1000000);
    //var deviceCode = device + "-" + device + "-" + device + "-" + device;

    localStorage.setItem("deviceName",deviceName);
    localStorage.setItem("deviceCode",deviceCode);

    /*code to delete object from json array*/

    /*var obj = localStorage.getItem("test");
    var object = JSON.parse(obj);
    console.log("before delete = "+object);*/

    //object.splice(1, 1);

    /*console.log("after delete = "+object);
    localStorage.setItem("test",JSON.stringify(object));
    var test = localStorage.getItem("test");
    console.log("test"+test);*/

    /*code end here*/

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
    localStorage.removeItem('amount');*/

    /*function getCrypto() {
        return ($('#crypto').is(':checked')?'DASH':'BTC');
    }*/

    function displayOption(options) {

        var cryptoCurrency = localStorage.getItem("CryptoDetails");
        var currency = JSON.parse(cryptoCurrency);

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
                success: function(data) {
                    //localStorage.removeItem("discoveryId");

                    if(data.singleDeposit == '')
                    {
                        alert("offers not available");
                    }
                    else
                    {
                        displayOption(data.singleDeposit);
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
                    /*localStorage.setItem("availableAuthSource",data.availableAuthSources);
                    var source = localStorage.getItem("availableAuthSource");
                    localStorage.setItem("recentDeviceName",data.recentDeviceName);*/

                    $('#createHoldWithTokenBtn').trigger('click');

                    /*if(source == "password,device")
                    {
                        var modal = document.getElementById('myModal');
                        modal.style.display = "block";
                    }
                    else if(source == "password")
                    {
                        var modal = document.getElementById('myModal');
                        modal.style.display = "block";
                    }
                    else
                    {
                        //var device_id = localStorage.getItem("deviceId");
                        $('#createHoldBtn').trigger('click');
                    }*/
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

            var requestHeader = {
                "X-Coins-Publisher": publisherId,
            }

            var postData = {
                'publisherId': publisherId,
                'phone': "+1"+phone,
                'email': localStorage.getItem("Email"),
                'offer': offer_Id,
                'deviceName': localStorage.getItem("deviceName"),
                'deviceCode': deviceCode,
            }

            /*alert(postData);
            alert(JSON.stringify(postData));
            return false;*/
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

                    var test = localStorage.getItem("test");
                    var obj = [];
                    if(test){
                        obj= JSON.parse(test);
                    }
                    obj.push({"phone": phone,"device_id": device_id,"device_code":localStorage.getItem("deviceCode"),"token":purchse_token});
                    localStorage.setItem("test",JSON.stringify(obj));
                    //var testone = localStorage.getItem("test");
                    //alert(testone);
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
                //alert(response);
                localStorage.setItem("Response",response);
                var number = localStorage.getItem("phone");
                var testone = localStorage.getItem("test");
                var obj = JSON.parse(testone);

                for (var i = 0; i < obj.length; i++) {
                    if(obj[i].phone == number)
                    {
                        obj[i]["response"] = localStorage.getItem("Response");
                        obj[i]["crypto"] = localStorage.getItem("Crypto");
                        localStorage.setItem("test",JSON.stringify(obj));
                    }
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
                    //alert(data.status);
                    location.href = "buy-dash-with-cash_with-order-history.html";
                },
                error: function (data) {
                    //alert(data.status);
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
                    //alert(data.status);
                    location.href = "buy-dash-with-cash_with-order-history.html";
                },
                error: function(data) {
                    //alert(data.status);
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
                    //alert(data);
                    location.href = "buy-more-dash.html";
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
                url: apiUrl + '/api/v1/auth/'+phone+'/authorize/',
                headers: {"X-Coins-Publisher": "52"},
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

                    location.href = "purchase-code.html";
                },
                error: function(data) {

                    location.href = "create-password.html";

                    //location.href = "buy-more-dash.html";
                    //$('#getOrdersBtn').trigger('click');
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
            'getCryptos'
        ];
        for (var i=0;i<clickHandlers.length;i++){
            $('#'+clickHandlers[i]+'Btn').click(actions[clickHandlers[i]]);
        }
    }

    init();
})();
