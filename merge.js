const data1 = require("./data1.json");
const data2 = require("./data2.json");
const fs = require('fs');

var allCars1 = [];
var allCars2 = [];
var count = 0;

const getOne = new Promise(function (resolve, reject) {
    for (const i in data1) {
        for (const j in data1[i]) {
            let imageTitle = data1[i][j].attributes['title'].replace(/[^a-zA-Z0-9 ]/g, '');
            imageTitle = imageTitle.replace(' ', '-');
            let imageUrl = "https://img-ik.cars.co.za/ik-seo/carsimages/" + data1[i][j].id + "/" + imageTitle + data1[i][j].attributes['image']['extension'];

            var inputData = {
                category: 1,
                id: data1[i][j].id,
                imgURL: imageUrl,
                mileage: data1[i][j].attributes.mileage,
                transmission: data1[i][j].attributes.transmission,
                province: data1[i][j].attributes.province,
                fuel_type: data1[i][j].attributes.fuel_type,
                colour: data1[i][j].attributes.colour ? data1[i][j].attributes.colour : "None",
                price: data1[i][j].attributes.price,
                new_or_used: data1[i][j].attributes.new_or_used ? data1[i][j].attributes.new_or_used : "None",
                title: data1[i][j].attributes.title ? data1[i][j].attributes.title : "None",
                location: data1[i][j].attributes.province ? data1[i][j].attributes.province : "None",
                model: data1[i][j].attributes.model ? data1[i][j].attributes.model : "None",
                fuel_type: data1[i][j].attributes.fuel_type,
                siteURL: data1[i][j].attributes.website_url,
                makeYear: data1[i][j].attributes.year ? data1[i][j].attributes.year : 0
            }
            allCars1.push(inputData);
            count++;
        }
    }
    resolve(allCars1);
});

const getTwo = new Promise(function (resolve, reject) {
    for (const i in data2) {
        var k = 0;
        var mileage = 0, new_or_used = "", transmission = "Manual";

        // if (data2[i].summaryIcons > 0) {
        if (data2[i].summaryIcons && (data2[i].summaryIcons).length > 0) {
            data2[i].summaryIcons.forEach(element => {
                if (k == 0) {
                    new_or_used = element.text
                    if (new_or_used == "New Car") {
                        new_or_used = "New";
                    }
                    if (new_or_used == "Used Car") {
                        new_or_used = "Used";
                    }
                }
                if (k == 1) {
                    element.text == "Automatic" || element.text == "Manual" ? mileage = 0 : mileage = element.text
                }
                if (k == 2) { transmission = element.text }
                k++;
            });
        }


        var price = data2[i].price;
        if (price) {
            price = price.substring(2);
        }
        else {
            price = 'None'
        }

        // var imgUrl = data2[i].imageUrl ? data2[i].imageUrl : "noimage";
        // var new_or_used = data2[i].new_or_used;
        // if (new_or_used == "New Car") {
        //     new_or_used = "New";
        // }
        var inputData = {
            category: 2,
            id: data2[i].listingId,
            imgURL: data2[i].imageUrl ? data2[i].imageUrl : "None",
            mileage: mileage ? mileage : "None",
            transmission: transmission ? transmission : "None",
            province: 'None',
            fuel_type: 'None',
            colour: 'None',
            price: parseInt(price),
            new_or_used: new_or_used ? new_or_used : "None",
            title: data2[i].makeModel,
            location: "None",
            model: data2[i].make ? data2[i].make : "None",
            fuel_type: "None",
            siteURL: 'https://www.autotrader.co.za' + data2[i]['listingUrl'],
            makeYear: data2[i].registrationYear ? data2[i].registrationYear : "0"
        }
        allCars2.push(inputData);
        count++;
        // }

    }
    resolve(allCars2);
});




Promise.all([getOne, getTwo]).then((values) => {
    var all = values[0].concat(values[1]);
    console.log(all);
    fs.writeFile("ALLCAR.json", JSON.stringify(all), function (err, result) {
        if (err) console.log('error', err);
    });
});



console.log(data1.length);
console.log(data2.length);


