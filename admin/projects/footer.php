    </div>
    <script src="js/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.text-editor',
            height: 400,
            plugins: 'advlist lists link code preview searchreplace wordcount media table emoticons image imagetools',
            toolbar: 'undo redo bold italic | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | code preview searchreplace table',
            toolbar_mode: 'scrolling',
        });

        /*document.querySelector('button[type="submit"]').addEventListener('click', function() {
            tinymce.triggerSave();
        }*/
    </script>
</body>
</html>