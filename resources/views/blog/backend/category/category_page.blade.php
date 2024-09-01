@extends('blog.backend.backend_master')
@section('admin-content')
    <button class="btn  btn-primary bg-main-color text-white m-2 open-add-category  ">
        <i class="fa-solid fa-plus"></i>
        Add category
    </button>
    <div class="m-0 p-0 row category-list"></div>
    @include('blog.modal.category')
    @include('message.message_alert')
@endsection
@section('script')
    <script>
        jQuery(function() {
            let records = "";
            $.ajax({
                type: "POST",
                url: "/api/admin/get-category",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {

                },
                success: function(response) {

                    if (response.status != "success") {
                        // message error
                        return;
                    }
                    response.records.forEach(category => {
                        records += categoryRecords(category);
                    });
                    $("div.category-list").html(records);
                },
                error: function(xhr, status, error) {

                }
            });
        });
    </script>
@endsection
