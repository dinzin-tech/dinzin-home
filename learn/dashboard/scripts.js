$(document).ready(function() {
    // Function to apply dark mode based on user preference
    function applyDarkMode(isDarkMode) {
        if (isDarkMode) {
            $('body').addClass('dark-mode').removeClass('light-mode');
            $('.sidebar').addClass('dark-mode').removeClass('light-mode');
            $('.module h3').addClass('dark-mode').removeClass('light-mode');
            $('.topics a').addClass('dark-mode').removeClass('light-mode');
        } else {
            $('body').addClass('light-mode').removeClass('dark-mode');
            $('.sidebar').addClass('light-mode').removeClass('dark-mode');
            $('.module h3').addClass('light-mode').removeClass('dark-mode');
            $('.topics a').addClass('light-mode').removeClass('dark-mode');
        }
    }

    // Function to load modules and topics
    function loadModules(courseId) {
        $.ajax({
            url: 'course.php',
            method: 'GET',
            data: { courseId: courseId },
            success: function(data) {
                const modules = data.modules;
                $('#modules').empty();
                modules.forEach(function(module) {
                    const moduleHtml = `
                        <div class="module">
                            <h3>${module.name}</h3>
                            <div class="topics">
                                ${module.topics.map(topic => `<a href="#" data-topic-id="${topic.id}">${topic.name}</a>`).join('')}
                            </div>
                        </div>
                    `;
                    $('#modules').append(moduleHtml);
                });

                // Attach click event to module headers
                $('.module h3').on('click', function() {
                    $(this).next('.topics').slideToggle();
                });

                // Load the first topic's content by default
                if (modules.length > 0 && modules[0].topics.length > 0) {
                    const firstTopicId = modules[0].topics[0].id;
                    // console.log(firstTopicId);
                    loadTopicContent(firstTopicId);
                    $(".module h3").length;
                    $(`[data-topic-id="${firstTopicId}"]`).parent().css("display", "block");
                }

                // attach click event for topic links
                $('.topics a').on('click', function() {
                    loadTopicContent($(this).attr("data-topic-id"));
                    toggleSidebar();
                });
            }
        });
    }

    // Function to load topic content
    function loadTopicContent(topicId) {
        let topics = document.querySelectorAll(".topics a");
        // console.log(topics.length);
        for(let i = 0; i < topics.length; i ++) {
            topics[i].classList.remove("active-link");
        }

        $(`[data-topic-id="${topicId}"]`).addClass("active-link");

        $.ajax({
            url: 'course.php',
            method: 'GET',
            data: { topicId: topicId },
            success: function(data) {
                $('#topicTitle').text(data.name);
                $(`[data-topic-id="${topicId}"]`).addClass("active-link");
                let content = '';
                if (data.video_link) {
                    content += `
                        <iframe id="topicVideo" src="https://www.youtube.com/embed/${data.video_link}?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        <div class='video-credit'>Credit | ${data.video_credit}</div>
                    `;
                }
                
                content += `
                    <p>${data.description}</p>
                `;
                
                if (data.document_link) {
                    content += `
                        <a href="${data.document_link}" target="_blank">View Document</a>
                    `;
                }

                if (data.type === "assignment") {
                    content += `
                        <div id="assignment_submission">
                            <form id="submission" action="submit_assignment.php" method="post" enctype="multipart/form-data">
                                <label for="fileUpload">Upload Your Assignment (ZIP only):</label>
                                <input type="file" id="fileUpload" name="assignment_file" accept=".zip" required>
                                <input type="hidden" id="module_id" value="${topicId}">
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    `;
                }

                if (data.type === "quiz") {
                    content += `
                        <div id="quiz_section">
                            <button id="start_quiz" onclick="function(e) {e.preventDefault();}" type="submit" >Start Quiz</button>
                        </div>
                        `;
                }

                $('#topicContent').html(content);
            }
        });
    }

    // Check for course ID in URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const courseId = urlParams.get('course');
    if (courseId) {
        loadModules(courseId); // Load modules and topics for the specified course
    }

    // Check for dark mode preference in localStorage
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    applyDarkMode(isDarkMode);

    // Toggle dark mode
    $('#darkModeToggle').on('click', function() {
        const newDarkMode = !$('body').hasClass('dark-mode');
        applyDarkMode(newDarkMode);
        localStorage.setItem('darkMode', newDarkMode);
    });

    $('#sidebarToggle').click(function(){toggleSidebar();});

    function toggleSidebar() {
        $('#sidebar').toggleClass('open');
        if($(".material-icons", "#sidebarToggle").text() == 'close') {
            $(".material-icons", "#sidebarToggle").text('menu');
        }
        else {
            $(".material-icons", "#sidebarToggle").text('close');
        }
    }

});


// $(document).ready(function() {
//     // Apply dark mode and other initializations
//     // Function to apply dark mode based on user preference
//     function applyDarkMode(isDarkMode) {
//         if (isDarkMode) {
//             $('body').addClass('dark-mode').removeClass('light-mode');
//             $('.sidebar').addClass('dark-mode').removeClass('light-mode');
//             $('.module h3').addClass('dark-mode').removeClass('light-mode');
//             $('.topics a').addClass('dark-mode').removeClass('light-mode');
//         } else {
//             $('body').addClass('light-mode').removeClass('dark-mode');
//             $('.sidebar').addClass('light-mode').removeClass('dark-mode');
//             $('.module h3').addClass('light-mode').removeClass('dark-mode');
//             $('.topics a').addClass('light-mode').removeClass('dark-mode');
//         }
//     }

//     function updateProgress(studentId, courseId, moduleId, topicId, status) {
//         $.ajax({
//             url: 'update_progress.php',
//             method: 'POST',
//             data: { student_id: studentId, course_id: courseId, module_id: moduleId, topic_id: topicId, status: status },
//             success: function(response) {
//                 console.log(response);
//             }
//         });
//     }

//     function checkModuleCompletion(studentId, courseId, moduleId, callback) {
//         $.ajax({
//             url: 'get_progress.php',
//             method: 'GET',
//             data: { student_id: studentId, course_id: courseId, module_id: moduleId },
//             success: function(data) {
//                 callback(data);
//             }
//         });
//     }

//     function loadModules(courseId) {
//         $.ajax({
//             url: 'course.php',
//             method: 'GET',
//             data: { courseId: courseId },
//             success: function(data) {
//                 const modules = data.modules;
//                 $('#modules').empty();
//                 modules.forEach(function(module, index) {
//                     const moduleHtml = `
//                         <div class="module" data-module-id="${module.id}">
//                             <h3>${module.name}</h3>
//                             <div class="topics">
//                                 ${module.topics.map(topic => `<a href="#" data-topic-id="${topic.id}">${topic.name}</a>`).join('')}
//                             </div>
//                         </div>
//                     `;
//                     $('#modules').append(moduleHtml);

//                     checkModuleCompletion(studentId, courseId, module.id, function(progress) {
//                         if (progress.completed) {
//                             $(`[data-module-id="${module.id}"]`).removeClass('locked');
//                         } else {
//                             $(`[data-module-id="${module.id}"]`).addClass('locked');
//                         }
//                     });
//                 });

//                 $('.module h3').on('click', function() {
//                     if (!$(this).parent('.module').hasClass('locked')) {
//                         $(this).next('.topics').slideToggle();
//                     }
//                 });

//                 // Load the first topic's content by default
//                 if (modules.length > 0 && modules[0].topics.length > 0) {
//                     const firstTopicId = modules[0].topics[0].id;
//                     loadTopicContent(firstTopicId);
//                     $(".module h3").length;
//                     $(`[data-topic-id="${firstTopicId}"]`).parent().css("display", "block");
//                 }

//                 // Attach click event for topic links
//                 $('.topics a').on('click', function() {
//                     loadTopicContent($(this).attr("data-topic-id"));
//                     updateProgress(studentId, courseId, $(this).closest('.module').data('module-id'), $(this).data('topic-id'), 'in_progress');
//                 });
//             }
//         });
//     }

//     function loadTopicContent(topicId) {
//         let topics = document.querySelectorAll(".topics a");
//         for(let i = 0; i < topics.length; i ++) {
//             topics[i].classList.remove("active-link");
//         }

//         $(`[data-topic-id="${topicId}"]`).addClass("active-link");

//         $.ajax({
//             url: 'course.php',
//             method: 'GET',
//             data: { topicId: topicId },
//             success: function(data) {
//                 $('#topicTitle').text(data.name);
//                 $(`[data-topic-id="${topicId}"]`).addClass("active-link");
//                 let content = '';
//                 if (data.video_link) {
//                     content += `
//                         <iframe id="topicVideo" src="https://www.youtube.com/embed/${data.video_link}?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
//                     `;
//                 }
                
//                 content += `
//                     <p>${data.description}</p>
//                 `;
                
//                 if (data.document_link) {
//                     content += `
//                         <a href="${data.document_link}" target="_blank">View Document</a>
//                     `;
//                 }

//                 if (data.type === "assignment") {
//                     content += `
//                         <div id="assignment_submission">
//                             <form id="submission" action="submit_assignment.php" method="post" enctype="multipart/form-data">
//                                 <label for="fileUpload">Upload Your Assignment (ZIP only):</label>
//                                 <input type="file" id="fileUpload" name="assignment_file" accept=".zip" required>
//                                 <input type="hidden" id="module_id" value="${topicId}">
//                                 <button type="submit">Submit</button>
//                             </form>
//                         </div>
//                     `;
//                 }

//                 if (data.type === "quiz") {
//                     content += `
//                         <div id="quiz_section">
//                             <button id="start_quiz" onclick="function(e) {e.preventDefault();}" type="submit" >Start Quiz</button>
//                         </div>
//                     `;
//                 }

//                 $('#topicContent').html(content);
//             }
//         });
//     }

//     const urlParams = new URLSearchParams(window.location.search);
//     const courseId = urlParams.get('course');
//     const studentId = 1; // Replace with actual logged-in student ID
//     if (courseId) {
//         loadModules(courseId);
//     }

//     const isDarkMode = localStorage.getItem('darkMode') === 'true';
//     applyDarkMode(isDarkMode);

//     $('#darkModeToggle').on('click', function() {
//         const newDarkMode = !$('body').hasClass('dark-mode');
//         applyDarkMode(newDarkMode);
//         localStorage.setItem('darkMode', newDarkMode);
//     });
// });
