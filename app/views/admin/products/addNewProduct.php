<section class="section-content">
    <div class="container-fluid">
        <?php
        if (!empty($successAdd)) {
        ?>
            <div class="alert alert-success text-center" role="alert">
                <h4 class="alert-heading">Thêm mới thành công</h4>
                <p>Bạn đã thêm thành công 1 sản phẩm thành công.</p>
                <hr>
            </div>
        <?php
        }
        ?>
        <?php
        if (!empty($errorsAdd)) {
        ?>
            <div class="alert alert-warning text-center" role="alert">
                <h4 class="alert-heading">Thêm mới không thành công</h4>
                <p><?= $errorsAdd ?></p>
                <hr>
            </div>
        <?php
        }
        ?>
        <div class="row mt-5">
            <div class=" col-md-12">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data" class="container" onsubmit="return validateForm()">
                    <label for="image" class="form-label">Hình ảnh</label> </br>
                    <div class="mb-3 d-flex flex-wrap">
                        <div class="me-4 d-block">
                            <input type="file" class="form-control" required name="image" id="image" style="width:fit-content; height: fit-content">
                        </div>
                        <img src="" alt="" id="preview-image" data-source="">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" required name="name" id="name" placeholder="Vui lòng nhập tên sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="pet_id" class="form-label">Thú cưng</label>
                        <select name="pet_id" id="pet_id" class="form-control">
                            <?php
                            if (isset($data_pets)) {
                                foreach ($data_pets as  $pet) {
                            ?>
                                    <option value="<?= $pet['id'] ?>"><?= $pet['name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" required name="quantity" id="quantity" placeholder="Vui lòng nhập số lượng">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá bán</label>
                        <input type="number" class="form-control" required name="price" id="price" placeholder="Vui lòng nhập giá bán">
                    </div>
                    <div class="mb-3">
                        <label for="cate_id" class="form-label">Danh mục</label>
                        <select name="cate_id" id="cate_id" class="form-control">
                            <?php
                            if (isset($data_categories)) {
                                foreach ($data_categories as  $category) {
                            ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php
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
                            <?php
                            if (isset($data_brands)) {
                                foreach ($data_brands as  $brand) {
                            ?>
                                    <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sale" class="form-label">Giảm giá</label>
                        <input type="number" class="form-control" required name="sale" id="sale" placeholder="Vui lòng nhập giảm giá">
                    </div>
                    <div class="mb-3">
                        <label for="des" class="form-label">Mô tả</label>
                        <textarea type="text" style="min-height: 250px;" class="form-control" required name="des" id="des"></textarea>
                    </div>
                    <button type="submit" name="addNewSubmit" class="btn btn-outline-success">Thêm mới</button>
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
        const subcategories = <?php echo json_encode($data_subCategory) ?>;
        const filteredSubcategories = subcategories.filter(sub => sub.id_category == categoryId);

        // Add the filtered subcategories as options in the subcategory selection menu
        filteredSubcategories.forEach(sub => {
            const option = document.createElement("option");
            option.value = sub.id;
            option.text = sub.name;
            subSelect.appendChild(option);
        });
    }

    // Call the updateSubcategories function when the category selection changes
    cateSelect.addEventListener("change", updateSubcategories);

    // Call the updateSubcategories function initially to populate the subcategory selection menu with the correct options
    updateSubcategories();
</script>