/*
  This is the script file for the form.html page
  Authors: Hunter Ahlquist, Cesar Escalona, Aubrey Davies, Zahrah Alsamach
  File: form_script.js
  Date: 02/08/2021
*/

document.getElementById("infoform").onsubmit = validate;

function validate() {
    let isValid = true;

    //clear all error msgs
    let errors = document.getElementsByClassName("err");
    for (let i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";
    }

    //check Company name
    let name = document.getElementById("companyName").value;
    if (name === "") {
        let errName = document.getElementById("err-name");
        errName.style.display = "inline";
        isValid = false;
    }

    //check category
    let category = document.getElementById("category").value;
    if (category === "Choose...") {
        let errCompany = document.getElementById("err-category");
        errCompany.style.display = "inline";
        isValid = false;
    }

    //check website
    let site = document.getElementById("website").value;

    if (site === "") {
        let errSite = document.getElementById("err-website");
        errSite.style.display = "inline";
        isValid = false;
    }

    //check about
    let about = document.getElementById("about").value;
    if (about === "") {
        let errAbout = document.getElementById("err-about");
        errAbout.style.display = "inline";
        isValid = false;
    }

    let address = document.getElementById("address").value;
    if (address != "") {
        //check city
        let city = document.getElementById("city").value;
        if (city === "") {
            let errCity = document.getElementById("err-city");
            errCity.style.display = "inline";
            isValid = false;
        }

        //check country
        let country = document.getElementById("country").value;
        if (country === "") {
            let errCountry = document.getElementById("err-country");
            errCountry.style.display = "inline";
            isValid = false;
        }

        //check state
        let state = document.getElementById("state").value;
        if (state === "") {
            let errState = document.getElementById("err-state");
            errState.style.display = "inline";
            isValid = false;
        }
    }



    //check Geographical area
    let geo = document.getElementById("geo").value;
    if (geo === "Choose...") {
        let errGeo = document.getElementById("err-geo");
        errGeo.style.display = "inline";
        isValid = false;
    }

    //check First name
    let custName = document.getElementById("privFName").value;
    if (custName === "") {
        let errCustName = document.getElementById("err-custName");
        errCustName.style.display = "inline";
        isValid = false;
    }

    //check Last name
    let custLastName = document.getElementById("privLName").value;
    if (custLastName === "") {
        let errCustLastName = document.getElementById("err-custLastName");
        errCustLastName.style.display = "inline";
        isValid = false;
    }

    //check Customer email
    let custEmail = document.getElementById("privEmail").value;
    if (custEmail === "") {
        let errcustEmail = document.getElementById("err-custEmail");
        errcustEmail.style.display = "inline";
        isValid = false;
    }

    //check keywords
    let custKeywords = document.getElementById("keywords").value;
    if (custKeywords === "") {
        let errcustKeywords = document.getElementById("err-hashtag");
        errcustKeywords.style.display = "inline";
        isValid = false;
    }

    //check Contact Phone number
    let contactPhoneNum = document.getElementById("privPhone").value;
    if (contactPhoneNum === "") {
        let errContactPhone = document.getElementById("err-contactPhone");
        errContactPhone.style.display = "inline";
        isValid = false;
    }

    //check Image
    let image = document.getElementById("image").value;
    if (image === "") {
        let errImage = document.getElementById("err-image");
        errImage.style.display = "inline";
        isValid = false;
    }
    if (!isValid)
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    return isValid;
}

