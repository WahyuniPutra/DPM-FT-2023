</main>
<footer class="bg-light">
    <div class="text-center p-3" style="background:#CCCCCC">
        Copyright &copy; 2023
    </div>
</footer>
<script>
$(document).ready(function () {
    $('#summernote').summernote({
        height: 200,
        toolbar: [
            ["style", ["bold", "italic", "underline", "clear"]],
            ["fontname", ["fontname"]],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["height", ["height"]],
            ["insert", ["link", "picture", "imageList", "video", "hr"]],
            ["help", ["help"]]
        ],
        dialogsInBody: true,
        imageList: {
            endpoint: "gambarList.php",
            fullUrlPrefix: "../gambar/",
            thumbUrlPrefix: "../gambar/"
        },
        callbacks: {
            onImageUpload: function (files) {
                for (let i = 0; i < files.length; i++) {
                    uploadImage(files[i]);
                }
            }
        }
    });

    function uploadImage(file) {
        let formData = new FormData();
        formData.append('file', file);

        $.ajax({
            method: 'POST',
            url: 'upload.php',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $('#summernote').summernote('insertImage', response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    }
});
</script>
</body>

</html>