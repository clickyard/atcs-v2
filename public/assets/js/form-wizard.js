$(function() {
	'use strict'
	$('#wizard1').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		labels: {next:"بعد",previous:"قبل",finish: "النهاية"},
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>', 
		onFinished: function (event, currentIndex) {
			var form = $(this);

			// Submit form input
			form.submit();
		},
	});
	$('#wizard2').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		labels: {next:"بعد",previous:"قبل",finish: "النهاية"},
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		onStepChanging: function(event, currentIndex, newIndex) {
			if (currentIndex < newIndex) {
				// Step 1 form validation
				if (currentIndex === 0) {

					var name = $('#name').parsley();
					var nationalityNo = $('#nationalityNo').parsley();
					var passport = $('#passport').parsley();
					var residenceNo = $('#residenceNo').parsley();
					var passportDate = $('#passportDate').parsley();				
					var residenceDate = $('#residenceDate').parsley();
					if (name.isValid()
							&& nationalityNo.isValid() 
							&& passport.isValid() 
							&& passportDate.isValid() 
							&& residenceNo.isValid() 
							&& residenceDate.isValid()
					 ) {
						return true;
					} else {
						name.validate();
						nationalityNo.validate();
						passport.validate();
						passportDate.validate();
						residenceNo.validate();
						residenceDate.validate();
					
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {
					//return true;
					var email = $('#email').parsley();
					if (email.isValid()) {
						return true;
					} else {
						email.validate();
					}
					
				}
			else {
				return true;
			}
		}
	},
	onFinished: function (event, currentIndex) {
		var form = $(this);
  
		// Submit form input
		form.submit();
	  }

});
	$('#wizard3').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
	//	labels: {next:"بعد",previous:"قبل",finish: "النهاية"},
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		stepsOrientation: 1,
		onFinished: function (event, currentIndex) {
			var form = $(this);
	  
			// Submit form input
			form.submit();
		  }
	});
});