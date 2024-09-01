var file = "";

$(document).on("click", "button.open-add-category", function () {

    let modal = $("div.category-modal");
    modal.find("input#name").val("");
    modal.find("textarea#description").val("");
    modal.find("input#old_logo").val("");
    modal.find("div.choose-image img").attr("src", "/asset/image/no_image.webp");
    modal.find("button#category-accept").attr("data-id", "");

    let categoryModal = $("div.category-modal");
    categoryModal.find("h1").text("Add category");
    categoryModal.find("#category-accept").text("Save").addClass("accept-save-category").removeClass("accept-edit-category");;
    $("div.category-modal").modal("show");

}).on("click", "div.choose-image", function () {
    $(this).siblings("input#logo").click();
    $("input#logo").on("change", function (event) {
        file = event.target.files[0];
        $("div.choose-image").find("img").attr("src", URL.createObjectURL(file));
    });
}).on("click", "button.accept-save-category", function () {
    let name = $("input#name");
    let description = $("textarea#description").val();

    if (name.val() === "") {
        errorAlertMessage("Something wrong!", "Category name is required.");
        name.addClass("border-danger");
        return;
    } else {
        name.removeClass("border-danger");
    }
    addCategory(name.val(), description, file);
}).on("click", "div.open-edit-category", function () {

    let _this = $(this).parent("div.category");
    let name = _this.find("p.category-name").text();
    let description = _this.find("p.category-description").text();
    let image = _this.find("div.category-iamge img").attr("src");
    let id = _this.find("div.cart-category").attr("data-id");

    let modal = $("div.category-modal");
    modal.find("input#name").val(name);
    modal.find("textarea#description").val(description);
    modal.find("input#old_logo").val(image);
    modal.find("div.choose-image img").attr("src", image);
    modal.find("button#category-accept").attr("data-id", id);

    let categoryModal = $("div.category-modal");
    categoryModal.find("h1").text("Edit category");
    categoryModal.find("#category-accept").text("Save change").removeClass("accept-save-category").addClass("accept-edit-category");
    $("div.category-modal").modal("show");

});

function addCategory(name, description, file) {

    let form = new FormData();
    form.append("name", name);
    form.append("description", description ?? "");
    form.append("logo", file ?? "");

    $.ajax({
        type: "POST",
        url: "/api/admin/add-category",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form,
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (response) {

            if (response.status != "success") {
                errorAlertMessage("Failed", response.msg);
                return;
            }
            successAlertMessage("Category added", response.msg);
            let category = categoryRecords(response.record);
            $("div.category-list").append(category);
            $("div.category-modal").modal("hide");

        },
        error: function (xhr, status, error) {

        }
    });
}

function categoryRecords(category) {
    return `<div class="col-3 category p-2 d-flex justify-content-end">
                <div class="position-absolute p-2 open-edit-category" role="button">
                    <span><i class="fa-regular fa-pen-to-square fs-3 text-white"></i></span>
                </div>
                <p class="category-description d-none">${category.description}</p>
                <div class="col w-100 h-100 bg-second-color cart-category rounded" data-id="${btoa(category.id)}">
                    <div class="m-0 p-0 category-iamge d-flex justify-content-center p-1">
                        <img class="rounded-circle" src="${category.logo}" alt="">
                    </div>
                    <p class="text-center fs-5 fw-semibold text-white pt-2 category-name">${category.name}</p>
                </div> 
            </div>
            `;
}

function successAlertMessage(status, msg) {
    $("div.toast-header").addClass("bg-success text-white").removeClass("bg-danger").find("strong").text(status);
    $("div.toast-body").addClass("bg-success text-white").removeClass("bg-danger").text(msg);
    $("div.toast").toast("show");
}
function errorAlertMessage(status, msg) {
    $("div.toast-header").removeClass("bg-success").addClass("bg-danger text-white").find("strong").text(status);
    $("div.toast-body").removeClass("bg-success").addClass("bg-danger text-white").text(msg);
    $("div.toast").toast("show");
}