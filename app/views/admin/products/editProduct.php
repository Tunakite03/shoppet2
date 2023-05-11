<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class=" col-md-12">
                <form action="/admin/editproduct" method="post" enctype="multipart/form-data" class="container">
                    <label for="image" class="form-label">Hình ảnh</label> </br>

                    <div class="mb-3 d-flex flex-wrap">
                        <div class=" me-4">
                            <input type="file" class="form-control" required name="image" id="image" style="width:fit-content; height: fit-content">
                            <button onclick="resetImage()" class="btn btn-outline-primary my-2" type="button">Reset <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-360" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17 15.328c2.414 -.718 4 -1.94 4 -3.328c0 -2.21 -4.03 -4 -9 -4s-9 1.79 -9 4s4.03 4 9 4"></path>
                                    <path d="M9 13l3 3l-3 3"></path>
                                </svg></button>
                        </div>
                        <img src="<?= _WEB_ROOT ?>/public/assets/img/img_pet/<?= strtolower($data_product['pet_name']) . '/' . $data_product['image'] ?>" alt="" id="preview-image" data-source="<?= _WEB_ROOT ?>/public/assets/img/img_pet/<?= strtolower($data_product['pet_name']) . '/' . $data_product['image'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" value="<?= $data_product['name'] ?>" required name="name" id="name" placeholder="Vui lòng nhập tên sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="pet_id" class="form-label">Thú cưng</label>
                        <select name="id_pet" id="pet_id" class="form-control">
                            <option value="<?= $data_product['id_pet'] ?>"><?= $data_product['pet_name'] ?></option>
                            <?php
                            if (isset($data_pets)) {
                                foreach ($data_pets as  $pet) {
                                    if ($pet['id'] != $data_product['id_pet']) {
                            ?>
                                        <option value="<?= $pet['id'] ?>"><?= $pet['name'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" required name="quantity" value="<?= $data_product['quantity'] ?>" id="quantity" placeholder="Vui lòng nhập số lượng">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá bán</label>
                        <input type="email" class="form-control" required name="price" value="<?= $data_product['price'] ?>" id="price" placeholder="Vui lòng nhập giá bán">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Danh mục</label>
                        <select name="id_pet" id="pet_id" class="form-control">
                            <option value="<?= $data_product['id_cate'] ?>"><?= $data_product['cate_name'] ?></option>
                            <?php
                            if (isset($data_categories)) {
                                foreach ($data_categories as  $category) {
                                    if ($category['id'] != $data_product['id_cate']) {
                            ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Danh mục con</label>
                        <select name="id_pet" id="pet_id" class="form-control">
                            <option value="<?= $data_product['id_pet'] ?>"><?= $data_product['pet_name'] ?></option>
                            <?php
                            if (isset($data_pets)) {
                                foreach ($data_pets as  $pet) {
                                    if ($pet['id'] != $data_product['id_pet']) {
                            ?>
                                        <option value="<?= $pet['id'] ?>"><?= $pet['name'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Thương hiệu</label>
                        <select name="" id="brand_id" class="form-control">
                            <option value="<?= $data_product['id_brand'] ?>"><?= $data_product['brand_name'] ?></option>
                            <?php
                            if (isset($data_brands)) {
                                foreach ($data_brands as  $brand) {
                                    if ($brand['id'] != $data_product['id_brand']) {
                            ?>
                                        <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sale" class="form-label">Giảm giá</label>
                        <input type="number" class="form-control" required name="sale" value="<?= $data_product['sale'] ?>" id="sale" placeholder="Vui lòng nhập giảm giá">
                    </div>
                    <div class="mb-3">
                        <label for="des" class="form-label">Mô tả</label>
                        <textarea type="text" style="min-height: 250px;" class="form-control" required name="des" id="des" placeholder="Vui lòng nhập mô tả sản phẩm">
                        <?= $data_product['des'] ?>
                        </textarea>
                    </div>
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