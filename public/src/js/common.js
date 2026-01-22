// If var is empty
function isEmpty(value = ''){
    return value == null || value == undefined || value == '';
}

// Add notification
function addNotification(text = "", status = "info"){
	let notification = $("<div>", {
		text: text,
		class: "notification " + status,
		onclick: "hideNotification(this)"
	});

	$("#notification-list").append(notification);
    showNotification(notification);
    setTimeout(function(){
        hideNotification(notification); 
    }, 3000);
}

// Show notification
function showNotification(eObject){
	if(eObject != null) $(eObject).animate({"right": "+=400px"}, 500);
}

// Hide notification
function hideNotification(eObject){
	if(eObject != null) $(eObject).animate({"right": "-=400"}, 500, function(){
        $(eObject).remove();
    });
}

// Show loading screen
function showLoading($callback = null){
	$('#loading-screen').css('height', '100vh');
	$('#loading-screen').fadeIn(200, function(){
		if($callback != null) $callback();
	});;
}

// Hide loading screen
function hideLoading($callback = null){
	$('#loading-screen').fadeOut(200, function(){
		$('#loading-screen').css('height', '0vh');
		if($callback != null) $callback();
	});
}

// Initialize form as AJAX sending Json
function initAjaxJsonForm(formId = null, endpoint = null, method='GET'){

	if(formId != null || endpoint != null){

		$('#' + formId).on('submit', function(formInstance){

			formInstance.preventDefault();

			// Convert to JSON
			const formDataObject = {};
			const formDataArray = $(this).serializeArray();
			formDataArray.forEach(row => {
				formDataObject[row.name] = row.value;
			});
			const jsonData = JSON.stringify(formDataObject);

			// Send JSON
			showLoading(function(){

				$.ajax({
					url: endpoint,
					type: method,
					data: jsonData,
					contentType: 'application/json; charset=utf-8',
					dataType: 'json',
					success: function(response){

						if(!isEmpty(response['data']) && !isEmpty(response['data']['redirect']))
							window.location.href = response['data']['redirect'];

						if(!isEmpty(response['message'])){

							var type = 'info';
							if(response['success'] != undefined && response['success'] != null){
								if(response['success']) type = 'success';
								else type = 'error';
							}

							addNotification(response['message'], type);
						}

						hideLoading();
					},
					error: function(xhr, status, error){
						addNotification('Произошла внутренняя ошибка (см. консоль разработчика)', 'error');
						console.error(status + ": " + error + ". Trace:\n" + xhr.responseText);
						hideLoading();
					}
				});

			});

		});

	} else console.warn("Cannot initiate AJAX-form '" + formId + "'");

}