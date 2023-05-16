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
                        <input type="text" class="form-control" value="<?= $data_news['name'] ?>" required name="name"
                            id="name" placeholder="Vui lòng nhập tên sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mô tả ngắn</label>
                        <input type="text" class="form-control" value="<?= $data_news['des_news'] ?>" required
                            name="des_news" id="des_news" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nội dung</label>
                        <input type="Textarea" class="form-control" value="<?= htmlspecialchars($data_news['content']) ?>" required
                            name="content" id="content" placeholder="">
                    </div>
                    <a href="/admin/news" class="btn btn-danger"
                        style="color: white; background-color: #d9534f; border-color: #d43f3a; padding: 6px 12px; border-radius: 4px; text-decoration: none;">Cancel</a>
                    <button type="submit" name="editNewsSubmit" class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>
    </div>

</section>
<script>
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