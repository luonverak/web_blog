<div class="modal fade category-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Name</label>
                    <input type="text" class="form-control mb-2" id="name">
                    <label for="">Description (Optional)</label>
                    <textarea class="form-control mb-2" id="description"></textarea>
                    <label for="">Logo (Optional)</label>
                    <input type="file" class="d-none" id="logo">
                    <input type="hidden" id="old_logo">
                    <div class="choose-image border rounded" role="button">
                        <img class="w-100 h-100 rounded object-fit-cover" src="{{ emptyImage() }}" alt="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" id="category-accept" data-id="" class="btn btn-primary w-25 accept-save-category">Save</button>
            </div>
        </div>
    </div>
</div>
