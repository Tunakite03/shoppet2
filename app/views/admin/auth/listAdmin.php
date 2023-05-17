<section class="section-content">
    <div class="container-fluid">
        <div class="d-flex justify-content-end">
            <a href="/admin/addAdmin" class="btn btn-success my-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M16 19h6"></path>
                    <path d="M19 16v6"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                </svg>Thêm quản trị viên mới</a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="table_products" class="table table-bordered table-" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Quản trị viên</th>
                            <th>Email</th>
                            <th>Quyền hạn</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data) && !empty($data)) {
                            $data = $data_admin->fetchAll();
                        }
                        foreach ($data as $key => $value) {
                        ?>
                            <tr>
                                <td>
                                    <?= $key ?>
                                </td>
                                <td class="">
                                    <?= $value['name'] ?>
                                </td>
                                <td class="">
                                    <?= $value['email'] ?>
                                </td>
                                <td class="">
                                    <?= $value['role'] ?>
                                </td>
                                <td>
                                    <a name="" id="" class="btn btn-primary" href="/admin/editadmin/<?= $value['id'] ?>" role="button">Sửa</a>
                                    <a name="" id="" class="btn btn-warning my-2 delete-admin" href="/admin/deleteadmin/<?= $value['id'] ?>" role="button">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
<script>
    // Add an event listener to the delete button
    document.querySelectorAll('.delete-admin').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            // Show the SweetAlert confirmation dialog
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa sản phẩm này?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                // If the user clicked "OK", redirect to the delete URL
                if (result.isConfirmed) {
                    window.location.href = button.href;
                }
            });
        });
    });
</script>