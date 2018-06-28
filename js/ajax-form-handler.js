jQuery(document).ready(function($) {
  $("form").submit(function(e) {
    e.preventDefault();

    // Get Form ID for submission URL //
    let formID = $(this).attr("id");
    formID = formID.replace("gform_", "");
    let formURL = "/gravityformsapi/forms/" + formID + "/submissions";

    // Get Form Input Data and Format JSON for Endpoint //
    let formArray = $(this).serializeArray();
    let formData = [];
    $.each(formArray, function(index, data) {
      let name = data["name"];
      let value = data["value"];
      formData[name] = value;
    });
    formData = $.extend({}, formData);
    let data = { input_values: formData };

    // AJAX to Submit Form //
    $.ajax({
      url: formURL,
      method: "POST",
      data: JSON.stringify(data)
    }).done(function(data, textStatus, xhr) {
      // This is the HTML that is output as a part of the Confirmation Message //
      if (data.response.is_valid) {
        $("#input_5_31").val("");
        $("#confirmationModal")
          .find(".modal-body")
          .html(data.response.confirmation_message);
        $("#confirmationModal").modal("toggle");
      } else {
        $("#errorModal").modal("toggle");
      }
    });
  });
});
