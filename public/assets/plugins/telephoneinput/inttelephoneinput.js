$(function() {

	// International Telephone Input
	var input = document.querySelector("#tel");
  var tel2= document.querySelector("#tel2");
  var whatsup=document.querySelector("#whatsup");
  var ctel0= document.querySelector("#ctel0");
  var ctel1= document.querySelector("#ctel1");
  var gtel= document.querySelector("#gtel");
  var gtel2= document.querySelector("#gtel2");

    window.intlTelInput(input, {
      onlyCountries: ["sd" ],
      autoHideDialCode: false,
      nationalMode: true,
      separateDialCode: true,
      utilsScript: "assets/plugins/telephoneinput/utils.js",
    });

    window.intlTelInput(tel2, {
      onlyCountries: ["sd" ],
      autoHideDialCode: false,
      nationalMode: true,
      separateDialCode: true,
      utilsScript: "assets/plugins/telephoneinput/utils.js",
    });
    window.intlTelInput(whatsup, {
      onlyCountries: ["sd" ],
      autoHideDialCode: false,
      nationalMode: true,
      separateDialCode: true,
      utilsScript: "assets/plugins/telephoneinput/utils.js",
    });
    window.intlTelInput(ctel0, {
      onlyCountries: ["sd" ],
      autoHideDialCode: false,
      nationalMode: true,
      separateDialCode: true,
      utilsScript: "assets/plugins/telephoneinput/utils.js",
    });

    window.intlTelInput(ctel0, {
      onlyCountries: ["sd" ],
      autoHideDialCode: false,
      nationalMode: true,
      separateDialCode: true,
      utilsScript: "assets/plugins/telephoneinput/utils.js",
    });

    window.intlTelInput(ctel1, {
      onlyCountries: ["sd" ],
      autoHideDialCode: false,
      nationalMode: true,
      separateDialCode: true,
      utilsScript: "assets/plugins/telephoneinput/utils.js",
    });

    window.intlTelInput(gtel, {
      onlyCountries: [ "ae" ,"sa"],
      autoHideDialCode: false,
      nationalMode: true,
      separateDialCode: true,
      utilsScript: "assets/plugins/telephoneinput/utils.js",
    });
    window.intlTelInput(gtel2, {
      onlyCountries: [ "ae" ,"sa"],
      autoHideDialCode: false,
      nationalMode: true,
      separateDialCode: true,
      utilsScript: "assets/plugins/telephoneinput/utils.js",
    });
});

