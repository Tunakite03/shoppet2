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
                <?php
                $data = $data_category->fetchAll();
                ?>
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="container" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên danh muc</label>
                        <input type="text" class="form-control" value="<?= $data[0]['name_cate'] ?>" required name="name" id="name" placeholder="Vui lòng nhập tên sản phẩm">
                    </div>
                    <div class="mb-3 subcate-wrapper">
                        <?php
                        foreach ($data as $key => $value) {
                        ?>
                            <div class="">
                                <label for="subcate[<?= $value['subcate_id'] ?>]" class="form-label">Danh mục con</label>
                                <div class="d-flex">
                                    <input class="form-control" name="subcate[]" id="subcate[<?= $value['subcate_id'] ?>]" value="<?= $value['name_subcate'] ?>" style="width: 40%">
                                    <button onclick="this.parentElement.parentElement.remove()" type="button" class="btn ms-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" fill="red" stroke-width="0"></path>
                                        </svg></button>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                    <button type="submit" name="editCategorySubmit" class="btn btn-outline-success">Chỉnh sửa</button>
                    <button class="btn btn-primary ms-2" onclick="addSubcate()" type="button">Thêm danh mục con</button>
                </form>


            </div>
        </div>
    </div>

</section>
<script>
    let subcate_wrapper = document.querySelector(".subcate-wrapper")

    function addSubcate() {
        let template = `
        <div class="">
        <label class="form-label">Danh mục con </label>
                            <div class="d-flex">
                                <input class="form-control"  name="subcate[]"  style="width: 40%">
                                <button onclick="this.parentElement.parentElement.remove()" type="button" class="btn ms-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" fill="red" stroke-width="0"></path>
                                    </svg></button>
                            </div>
                            </div>
        `;

        subcate_wrapper.innerHTML += template;
    }
</script>