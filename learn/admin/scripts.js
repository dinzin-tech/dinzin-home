$(document).ready(function() {
    function loadDropdowns() {
        $.ajax({
            url: 'admin.php',
            method: 'GET',
            success: function(data) {
                const courses = data.courses;
                const modules = data.modules;
                const topics = data.topics;

                $('#courseSelect').empty();
                $('#courseSelect').append('<option value="">Select Course</option>');
                courses.forEach(function(course) {
                    $('#courseSelect').append('<option value="' + course.id + '">' + course.name + '</option>');
                });

                $('#moduleSelect').empty();
                $('#moduleSelect').append('<option value="">Select Module</option>');
                modules.forEach(function(module) {
                    $('#moduleSelect').append('<option value="' + module.id + '">' + module.name + '</option>');
                });

                // List courses, modules, and topics
                listCourses(courses);
                listModules(modules);
                listTopics(topics);
            }
        });
    }
    
    function listCourses(courses) {
        $('#courseList').empty();
        courses.forEach(function(course) {
            $('#courseList').append('<tr data-id='+course.id+'><li><td>' + course.name + '</td> <td><button class="editCourseBtn" data-id="' + course.id + '">Edit</button></td> <td><button class="deleteCourseBtn" data-id="' + course.id + '">Delete</button></td></li></tr>');
        });
    }

    function listModules(modules) {
        $('#moduleList').empty();
        modules.forEach(function(module) {
            $('#moduleList').append('<tr data-id='+module.id+'><li><td>' + module.name + '</td> <td><button class="editModuleBtn" data-id="' + module.id + '">Edit</button></td> <td><button class="deleteModuleBtn" data-id="' + module.id + '">Delete</button></td></li></tr>');
        });
    }

    function listTopics(topics) {
        // Implement listing of topics similarly if needed
        $('#topicList').empty();
        topics.forEach(function(topic) {
            $('#topicList').append('<tr data-id='+topic.id+'><li><td>' + topic.name + '</td> <td><button class="editTopicBtn" data-id="' + topic.id + '">Edit</button></td> <td><button class="deleteTopicBtn" data-id="' + topic.id + '">Delete</button></td></li></tr>');
        });
    }

    loadDropdowns();

    function getData(dataId, type, callback) {
        $.ajax({
            url: 'admin.php',
            method: 'GET',
            data: {action: 'GET_DATA', id: dataId, type: type},
            success: function(data) {
                callback(data);
            },
            error: function(error) {
                alert(error);
            }
        });
    }

    function deleteData(dataId, type, callback) {
        $.ajax({
            url: 'admin.php',
            method: 'POST',
            data: {action: 'DELETE_DATA', id: dataId, type: type},
            success: function(data) {
                callback(data);
            },
            error: function(error) {
                alert(error);
            }
        });
    }

    // Event handlers for edit and delete buttons (example for courses)
    $(document).on('click', '.editCourseBtn', function() {
        var courseId = $(this).data('id');
        // Implement edit functionality
        getData(courseId, 'courses', function(response) {
            $("#courseId").val(response.data.id);
            $("#courseName").val(response.data.name);
            tinymce.get('courseDescription').setContent(`${response.data.description}`);
        });
    });

    $(document).on('click', '.deleteCourseBtn', function() {
        var courseId = $(this).data('id');
        // Implement delete functionality
        console.log(courseId);
        deleteData(courseId, 'courses', function(response) {
            if(response.status == "success") {
                alert(response.message);

                $(`[data-id='${courseId}']`).remove();
            }
        });
    });

    // Similar handlers can be added for modules and topics
    $(document).on('click', '.editTopicBtn', function() {
        var courseId = $(this).data('id');
        // Implement edit functionality
        getData(courseId, 'topics', function(response) {
            console.log(response);
            $("#topicId").val(response.data.id);
            $("#moduleSelect").val(response.data.module_id);
            $("#topicName").val(response.data.name);
            $("#type").val(response.data.type);
            $("#videoLink").val(response.data.video_link);
            $("#videoCredit").val(response.data.video_credit);
            $("#documentLink").val(response.data.document_link);
            tinymce.get('description').setContent(`${response.data.description}`);

            if(!$("#addTopicSection").hasClass("open")) {
                $("#addTopicSection").addClass("open");
            }
        });
    });

    $(document).on('click', '.editModuleBtn', function() {
        var courseId = $(this).data('id');
        // Implement edit functionality
        getData(courseId, 'modules', function(response) {
            console.log(response);
            $("#moduleId").val(response.data.id);
            $("#courseSelect").val(response.data.course_id);
            $("#moduleName").val(response.data.name);
            tinymce.get('moduleDescription').setContent(`${response.data.description}`);

            if(!$("#addModuleSection").hasClass("open")) {
                $("#addModuleSection").addClass("open");
            }

            $(".container, #addModuleSection").animate({
                scrollTop: 0
            }, 'fast');
        });
    });

    $('#courseForm').on('submit', function(e) {
        e.preventDefault();
        tinymce.triggerSave();

        if ($('#courseDescription').val() === '') {
            alert('Course Description is required');
            return;
        }

        $.ajax({
            url: 'admin.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                loadDropdowns();
                $('#courseForm')[0].reset();
                tinymce.get('courseDescription').setContent('');

                // courseId must be empty
                $("#courseId").val("");
            }
        });
    });

    $('#moduleForm').on('submit', function(e) {
        e.preventDefault();
        tinymce.triggerSave();

        if ($('#moduleDescription').val() === '') {
            alert('Module Description is required');
            return;
        }

        $.ajax({
            url: 'admin.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                loadDropdowns();
                $('#moduleForm')[0].reset();
                tinymce.get('moduleDescription').setContent('');

                // make sure moduleId is cleared
                $("#moduleId").val("");
            }
        });
    });

    $('#topicForm').on('submit', function(e) {
        e.preventDefault();
        tinymce.triggerSave();
        $.ajax({
            url: 'admin.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                let data = JSON.parse(response);
                console.log(data);
                alert(data.msg);
                $('#topicForm')[0].reset();

                tinymce.get('description').setContent('');

                if(data.type == 'lecture')
                    $("#type").val(data.type);

                $("#moduleSelect").val(data.module);
                
                $("#topicId").val("");
            }
        });
    });
});
