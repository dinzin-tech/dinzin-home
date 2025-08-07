$(document).ready(function() {
    // Fetch modules to populate the select dropdown
    $.ajax({
        url: 'get_modules.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            let options = '<option value="">Select Module</option>';
            data.forEach(function(module) {
                options += `<option value="${module.id}">${module.name}</option>`;
            });
            $('#course_module').html(options);
        },
        error: function(err) {
            console.log('Error fetching modules', err);
        }
    });
});
