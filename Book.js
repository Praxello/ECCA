var VehicleData = [];
var BikeRecords = [];
var Discount = [];
var MonthsValue = new Map();
var rowIndex = null;
var GropusOfServices = new Map();
var OffersData = new Map();
var TotalCost = 0;
var bikeCost = 0;
$(document).ajaxStart(function() {
    $("#wait").css("display", "block");
});
$(document).ajaxComplete(function() {
    $("#wait").css("display", "none");
});
var api_url = 'https://praxello.com/theecca/users/';
// var api_url = '';
loadPackages();
var check = 0;
var flag = 0; //for showing bike li and div
offersData();

function offersData() {
    $.ajax({
        url: api_url + 'getOffersData.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.BikeRecords != null) {
                BikeRecords = [...response.BikeRecords];
            }
        }
    });
}

function loadPackages() {
    $.ajax({
        url: api_url + 'getAllPackages.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                var count = response.Data.length;
                var createVehicleOptions = '';
                VehicleData = [...response.Data];
                for (var i = 0; i < count; i++) {
                    createVehicleOptions += '<li data-id="regular-size-car" onclick="loadServices(' + (i) + ')" id="vehicle' + (i) + '">';
                    createVehicleOptions += '<div><div class="template-icon-vehicle-small-car"></div>';
                    createVehicleOptions += '<div>' + response.Data[i].title + '<br>' + response.Data[i].subTitle + '</div></div></li>';
                }
                //$('#vehicleCount').text(count);
                $('#packageList').html(createVehicleOptions);
                loadServices(0);
            }
        }
    });
}

function loadServices(index) {
    bikeCost = 0;
    $('#bikeDiv').hide();
    $('#offersText').hide();
    var serviceData = [];
    serviceData = VehicleData[index];
    var createServiceOptions = '';
    var costOfPackage = 0.00;
    var gst = 0.00;
    costOfPackage = parseFloat(serviceData.cost);
    gst = parseFloat(serviceData.gst);
    var Total = costOfPackage + gst;
    rowIndex = index;
    $('#packageList li').siblings().removeClass('template-state-selected');
    $('#vehicle' + index).addClass('template-state-selected');
    var count = 0;
    if (serviceData.PackageDetails != null) {
        var options = '';
        count = serviceData.PackageDetails.length;
        GropusOfServices.clear();
        for (var i = 0; i < count; i++) {
            if (GropusOfServices.has(serviceData.PackageDetails[i].categoryTitle)) {
                var arr = GropusOfServices.get(serviceData.PackageDetails[i].categoryTitle);
                arr.push(serviceData.PackageDetails[i]);
            } else {
                var arr = [];
                arr.push(serviceData.PackageDetails[i]);
                GropusOfServices.set(serviceData.PackageDetails[i].categoryTitle, arr);
            }
        }
        createServiceOptions = loadGroups();

    }
    if (serviceData.terms != '') {
        createServiceOptions += '<li data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck" class="template-clear-fix">';
        createServiceOptions += '<h5>' + serviceData.terms + '</h5></li>'
    }
    if (serviceData.DateDetails != null) {
        var optionVal = '<option>Select Number of Month</option>';
        var dateCount = serviceData.DateDetails.length;
        for (var j = 0; j < dateCount; j++) {
            MonthsValue.set(serviceData.DateDetails[j].MonthId, serviceData.DateDetails[j].Months);
            optionVal += '<option value="' + serviceData.DateDetails[j].MonthId + '">' + serviceData.DateDetails[j].Months + '</option>';
        }
        check = 1;
        createServiceOptions += '<li data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck" class="template-clear-fix">';
        createServiceOptions += '<center>Select Month <br><select style="width: 20%;height: 30px;border-radius: 4px;" id="opt" onchange="calculate(this.value)">' + optionVal + '</select></center></li>';

    }
    OffersData.clear();
    if (serviceData.Offers != null) {
        var offerCount = serviceData.Offers.length;
        for (var k = 0; k < offerCount; k++) {
            OffersData.set(serviceData.Offers[k].MonthId, serviceData.Offers[k]);
            //console.log(OffersData.get(serviceData.Offers[k].MonthId));
        }
    }
    if (serviceData.type == 1) {

        var bikeVal = '<option value="">Select Number Of Bikes</option>';
        bikeVal += '<option>1</option><option>2</option><option>3</option><option>4</option>';
        createServiceOptions += '<li data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck" class="template-clear-fix">';
        createServiceOptions += '<center>Number Of Bikes <br><select style="width: 20%;height: 30px;border-radius: 4px;" id="bike" onchange="calculateBikeCost(this.value)">' + bikeVal + '</select></center></li>';
    } else {
        $('#bikeDiv').hide();
    }
    Total = Total.toFixed(2);
    TotalCost = Total;

    $('#serviceList').html(createServiceOptions);
    $('#packagePrice').text(costOfPackage);
    $('#price').text(Total);
    $('#finalTotal').text(Total);
    $('#gstval').text(gst);

    $('#bikeCost').text('');
    $('#bikegst').text('');
    $('#bikeTotal').text('');

}
//change from here
function calculate(cost) {
    var Total = VehicleData[rowIndex].cost;
    var finalTotal = 0;
    var GST = 0;
    var CostOfPackage = VehicleData[rowIndex].cost;
    GST = VehicleData[rowIndex].gst;
    if (MonthsValue.has(cost)) {
        var mapValue = MonthsValue.get(cost);
        GST = parseFloat(GST) * parseFloat(mapValue);
        CostOfPackage = parseFloat(CostOfPackage) * parseFloat(mapValue);
        Total = (parseFloat(Total) * parseFloat(mapValue)) + GST;
        Total = Total.toFixed(2);
        finalTotal = Total;
        //for offers applicable
        for (let j of OffersData.keys()) {
            var a = OffersData.get(j);
            let months = a.Months;
            let title = a.Title;
            var b = parseInt(mapValue);
            if (months <= b) {

                $('#offersText').show();
                var data = OffersData.get(j);

                let discountPercentage = parseFloat(data.DiscountPercentage);
                let additionalDiscount = parseFloat(data.Price);
                if (discountPercentage > 0 || additionalDiscount > 0) {
                    $('#offerApplicable').show();
                    $('#offerApplicable1').show();
                }
                let totalDiscountVal = (parseFloat(Total) / 100) * (discountPercentage);
                finalTotal = parseFloat(Total) - (additionalDiscount + totalDiscountVal);
                $('#offersText').html('<h6 style="color:green;text-align:center;">Offer Applied - ' + title + '</h6>');
                $('#offerDiscount').text(totalDiscountVal.toFixed(2));
                $('#discountPercentage').text("(" + discountPercentage + " %)");
                $('#addDiscount').text(data.Price);
                break;
            } else {
                $('#offerApplicable').hide();
                $('#offerApplicable1').hide();
                $('#offersText').hide();

            }
        }
    } else {
        $('#offerApplicable').hide();
        $('#offerApplicable1').hide();
        $('#offersText').hide();
        Total = parseFloat(Total) + parseFloat(GST);
        Total = Total.toFixed(2);
        finalTotal = Total;
    }

    TotalCost = finalTotal;
    finalTotal = parseFloat(bikeCost) + parseFloat(finalTotal);
    $('#packagePrice').text(CostOfPackage);
    $('#gstval').text(GST.toFixed(2));
    $('#price').text(Total);
    $('#finalTotal').text(finalTotal.toFixed(2));
}

function calculateBikeCost(numberOfBikes) {
    var price = parseFloat(BikeRecords[0].OfferPrice);
    var gst = parseFloat(BikeRecords[0].GST);
    var totalValue = 0;
    if (numberOfBikes == '') {
        $('#bikeDiv').hide();
        totalValue = 0;
        bikeCost = totalValue;
    } else {
        $('#bikeDiv').show();
        totalValue = ((price + gst) * (numberOfBikes)).toFixed(2);
        bikeCost = totalValue;
    }
    $('#bikeCost').text(price * numberOfBikes);
    $('#bikegst').text(gst * numberOfBikes);
    $('#bikeTotal').text(totalValue);
    var Total = parseFloat(TotalCost);
    Total = Total + parseFloat(totalValue);
    Total = Total.toFixed(2);
    $('#finalTotal').text(Total);
}


function loadGroups() {
    var ServiceValues = '';
    for (let j of GropusOfServices.keys()) {
        ServiceValues += DisplayServices(j);
    }
    return ServiceValues;
}

function DisplayServices(key) {
    var createServiceOptions = '';
    var value = GropusOfServices.get(key);
    if (value.length > 0) {
        var count = value.length;
        createServiceOptions += '<li data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck" class="template-clear-fix">';
        createServiceOptions += '<h6 style="text-align:center;">' + key + '</h6></li>'
        for (var i = 0; i < count; i++) {
            createServiceOptions += '<li data-id-vehicle-rel="medium-size-car,compact-suv,minivan,pickup-truck,cargo-truck" class="template-clear-fix template-state-selected">';
            createServiceOptions += '<div class="template-component-booking-service-name">';
            createServiceOptions += '<span>' + value[i].serviceTitle + '</span></div>';
            createServiceOptions += '<div class="template-component-button-box" style="float:right;">';
            createServiceOptions += '<a href="#" class="template-component-button" >' + value[i].quota + '</a></div></li>';
        }
    }
    return createServiceOptions;
}

$('#book-appointment').on('click', function(e) {
    e.preventDefault();
    var packageDetails = [];
    packageDetails = VehicleData[rowIndex];
    var cost = $('#finalTotal').text();
    cost = parseFloat(cost);
    var months = '';
    if (check == 1) {
        var optVal = $("#opt option:selected").text();
        if (optVal != '') {
            if (optVal == 'Select Number of Month') {
                months = '';
            } else {
                months = optVal + ' Month';
            }
        }
    }
    var returnVal = $("#formvalidate").valid();
    if (returnVal) {
        var packageData = {
            firstName: $('#booking-form-first-name').val(),
            secondName: $('#booking-form-second-name').val(),
            emailForm: $('#booking-form-email').val(),
            contactNumber: $('#booking-form-phone').val(),
            vehiclemake: $('#booking-form-vehicle-make').val(),
            vehiclemodel: $('#booking-form-vehicle-model').val(),
            vehiclenumber: $('#vehicle-number').val(),
            Address: $('#bookingAddress').val(),
            bookingCity: $('#bookingCity').val(),
            zipcode: $('#zipcode').val(),
            State: $('#bookingstate').val(),
        };
        $('#payment_amount').val(cost);
        $('#billing_name').val(packageData.firstName + ' ' + packageData.secondName);
        $('#billing_tel').val(packageData.contactNumber);
        $('#billing_email').val(packageData.emailForm);
        $('#billing_city').val(packageData.bookingCity);
        $('#billing_state').val(packageData.State);
        $('#billing_zip').val(packageData.zipcode);
        $('#billing_address').val(packageData.Address);
        $('#billingNotes').val(packageDetails.title + '-' + months + ' ' + packageData.vehiclenumber);
        document.customerData.submit();
    }
});
$(function() {
    $("#formvalidate").validate({
        ignore: [],
        rules: {
            firstname: {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            secondname: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            bookingemail: {
                required: true,
                email: true
            },
            bookingphone: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10
            },
            Vehiclenumber: {
                required: true
            },
            bookingAddress: {
                required: true,
                minlength: 2,
                maxlength: 255
            },
            zipcode: {
                required: true,
                number: true,
                minlength: 6,
                maxlength: 6
            },
            bookingCity: {
                required: true
            },
            bookingstate: {
                required: true
            }
        }
    });

});