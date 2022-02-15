window.addEventListener("load", function(){

    document.getElementById("acf-field_5f5f0de08464b-row-0-field_61edf989805c0").addEventListener("keyup", function() {

        let permalink = document.querySelector("#sample-permalink a").getAttribute("href");
        let mailchimpLink = document.querySelector("#acf-field_5f5f0de08464b-row-0-field_61edf989805c0").value;
        let fullLink = permalink + '?' + mailchimpLink;

        document.querySelector("#acf-field_5f5f0de08464b-row-0-field_61ee02196c316").value = fullLink;
    });

});