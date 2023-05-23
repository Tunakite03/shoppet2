<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class=" col-md-12">

                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="container">
                    <!-- <label for="image" class="form-label">Hình ảnh</label> </br>

                    <div class="mb-3 d-flex flex-wrap">
                        <div class=" me-4">
                            <input type="file" class="form-control" name="img_news" id="img_news"
                                style="width:fit-content; height: fit-content">
                            <button onclick="resetImage()" class="btn btn-outline-primary my-2" type="button">Reset <svg
                                    xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-360"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M17 15.328c2.414 -.718 4 -1.94 4 -3.328c0 -2.21 -4.03 -4 -9 -4s-9 1.79 -9 4s4.03 4 9 4">
                                    </path>
                                    <path d="M9 13l3 3l-3 3"></path>
                                </svg></button>
                        </div>
                        <img src="<?= _WEB_ROOT ?>/public/assets/img/img_news/ <?= $data_news['img_news'] ?>" alt=""
                            id="preview-image"
                            data-source="<?= _WEB_ROOT ?>/public/assets/img/img_news/ <?= $data_news['img_news'] ?>">
                    </div> -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" value="<?= $data_news['name'] ?>" required name="name" id="name" placeholder="Vui lòng nhập tên sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mô tả ngắn</label>
                        <input type="text" class="form-control" value="<?= $data_news['des_news'] ?>" required name="des_news" id="des_news" placeholder="">
                    </div>
                    <div class="mb-3">
                        <textarea id="mytextarea" style="min-height: 600px;" name="content">
                    <?= htmlspecialchars($data_news['content']) ?>
                     </textarea>
                    </div>
                    <div class="mb-3 d-flex gap-4 container">
                        <a href="/admin/news" class="btn btn-info form-control mb-3">Cancel</a>
                        <button type="submit" name="editNewSubmit" class="btn btn-success form-control mb-3">Update</button>
                    </div>
                    <a href="/admin/news" class="btn btn-danger"
                        style="color: white; background-color: #d9534f; border-color: #d43f3a; padding: 6px 12px; border-radius: 4px; text-decoration: none;">Cancel</a>
                    <button type="submit" name="editNewSubmit" class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>
    </div>

</section>
<script>
    tinymce.init({
        selector: '#mytextarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        file_picker_types: 'file',
        file_picker_callback: function(callback, value, meta) {
            if (meta.filetype == 'image') {
                // Open the file picker dialog and handle the selected file
                // For example, using jQuery File Upload:
                $('#fileupload').fileupload({
                    dataType: 'json',
                    done: function(e, data) {
                        // Get the URL of the uploaded image and call the callback function
                        var url = data.result.url;
                        callback(url);
                    }
                }).click();
            }
        }
    });
    const fileInput = document.getElementById('image');
    const previewImg = document.getElementById('preview-image');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const url = URL.createObjectURL(file);
        previewImg.src = url;
    });

    function resetImage() {
        console.log(previewImg.dataset.source);
        previewImg.src = previewImg.dataset.source;
    }
</script>