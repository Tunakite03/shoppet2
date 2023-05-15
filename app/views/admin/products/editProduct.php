<section class="section-content">
    <div class="container-fluid">
        <?php
        if (!empty($successEdit)) {
        ?>
            <div class="alert alert-success text-center" role="alert">
                <h4 class="alert-heading">Chỉnh sửa thành công</h4>
                <p>Bạn đã chỉnh sửa thành công.</p>
                <hr>
            </div>
        <?php
        }
        ?>
        <?php
        if (!empty($errorsEdit)) {
        ?>
            <div class="alert alert-warning text-center" role="alert">
                <h4 class="alert-heading">Chỉnh sửa không thành công</h4>
                <p><?= $errorsEdit ?></p>
                <hr>
            </div>
        <?php
        }
        ?>
        <div class="row mt-5">
            <div class=" col-md-12">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data" class="container">
                    <label for="image" class="form-label">Hình ảnh</label> </br>
                    <div class="mb-3 d-flex flex-wrap">
                        <div class="me-4 d-block">
                            <input type="file" class="form-control" name="image" id="image" style="width:fit-content; height: fit-content">
                            <button onclick="resetImage()" class="btn btn-outline-primary my-2" type="button">Reset<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-360" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17 15.328c2.414 -.718 4 -1.94 4 -3.328c0 -2.21 -4.03 -4 -9 -4s-9 1.79 -9 4s4.03 4 9 4"></path>
                                    <path d="M9 13l3 3l-3 3"></path>
                                </svg></button> </br>
                            <button type="submit" name="editImageSubmit" class="btn btn-outline-success">Thay đổi ảnh</button>
                        </div>
                        <img src="<?= _WEB_ROOT ?>/public/assets/img/img_pet/<?= $data_product['image'] ?>" alt="" id="preview-image" data-source="<?= _WEB_ROOT ?>/public/assets/img/img_pet/<?= $data_product['image'] ?>">
                    </div>
                </form>
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="container" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" value="<?= $data_product['name'] ?>" required name="name" id="name" placeholder="Vui lòng nhập tên sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="pet_id" class="form-label">Thú cưng</label>
                        <select name="pet_id" id="pet_id" class="form-control">
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
                        <input type="number" class="form-control" required name="price" value="<?= $data_product['price'] ?>" id="price" placeholder="Vui lòng nhập giá bán">
                    </div>
                    <div class="mb-3">
                        <label for="cate_id" class="form-label">Danh mục</label>
                        <select name="cate_id" id="cate_id" class="form-control">
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
                        <label for="sub_id" class="form-label">Danh mục con</label>
                        <select name="sub_id" id="sub_id" class="form-control">
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Thương hiệu</label>
                        <select name="brand_id" id="brand_id" class="form-control">
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
                        <textarea type="text" style="min-height: 250px;" class="form-control" required name="des" id="des"><?= $data_product['des'] ?></textarea>
                    </div>
                    <button type="submit" name="editProductSubmit" class="btn btn-outline-success">Chỉnh sửa</button>
                </form>
            </div>
        </div>
    </div>

</section>
<script>
    // Get references to the form and form fields
    const nameField = document.getElementById('name');
    const quantityField = document.getElementById('quantity');
    const priceField = document.getElementById('price');
    const saleField = document.getElementById('sale');
    const desField = document.getElementById('des');

    // Define a function to validate the form fields
    function validateForm() {
        let isValid = true;
        let firstInvalidField = null;
        // Validate the name field
        if (nameField.value.trim() === '') {
            nameField.classList.add('is-invalid');
            isValid = false;
            if (!firstInvalidField) {
                firstInvalidField = nameField;
            }
        } else {
            nameField.classList.remove('is-invalid');

        }

        // Validate the quantity field
        if (quantityField.value.trim() === '' || quantityField.value <= 0) {
            quantityField.classList.add('is-invalid');
            isValid = false;
            if (!firstInvalidField) {
                firstInvalidField = quantityField;
            }
        } else {
            quantityField.classList.remove('is-invalid');
        }

        // Validate the price field
        if (priceField.value.trim() === '' || priceField.value <= 0) {
            priceField.classList.add('is-invalid');
            isValid = false;
            if (!firstInvalidField) {
                firstInvalidField = priceField;
            }
        } else {
            priceField.classList.remove('is-invalid');
        }

        // Validate the sale field
        if (saleField.value.trim() === '' || saleField.value < 0) {
            saleField.classList.add('is-invalid');
            isValid = false;
            if (!firstInvalidField) {
                firstInvalidField = saleField;
            }
        } else {
            saleField.classList.remove('is-invalid');
        }

        // Validate the description field
        if (desField.value.trim() === '') {
            desField.classList.add('is-invalid');
            isValid = false;
            if (!firstInvalidField) {
                firstInvalidField = desField;
            }
        } else {
            desField.classList.remove('is-invalid');
        }
        if (!isValid && firstInvalidField) {
            firstInvalidField.focus();
        }
        return isValid;
    }

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

    // Select
    // Get references to the category and subcategory selection menus
    const cateSelect = document.getElementById("cate_id");
    const subSelect = document.getElementById("sub_id");

    // Define a function to update the subcategory selection menu
    function updateSubcategories() {
        // Clear the existing options in the subcategory selection menu
        subSelect.innerHTML = "";

        // Get the selected category ID
        const categoryId = cateSelect.value;

        // Find the subcategories that belong to the selected category
        const subcategories = <?php echo json_encode($data_subCategory); ?>;
        const filteredSubcategories = subcategories.filter(sub => sub.id_category == categoryId);

        // Add the filtered subcategories as options in the subcategory selection menu
        filteredSubcategories.forEach(sub => {
            const option = document.createElement("option");
            option.value = sub.id;
            option.text = sub.name;

            // Check if the current subcategory ID matches the ID of the selected subcategory
            if (sub.id == <?php echo $data_product['id_type']; ?>) {
                option.setAttribute("selected", "selected");
            }

            subSelect.appendChild(option);
        });
    }

    // Call the updateSubcategories function when the category selection changes
    cateSelect.addEventListener("change", updateSubcategories);

    // Call the updateSubcategories function initially to populate the subcategory selection menu with the correct options
    updateSubcategories();
</script>