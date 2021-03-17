$('.search-button').click(function () {
    let url = $(this).closest('form').attr('action');
    let category_id = $(this).closest('form').find('select[name="category_id"]');

    $.ajax({
        type: 'GET',
        url: url,
        data: category_id,
        success: function (data) {
            $('.post-list').remove()
            if (data.success === true) {
                let html = $(data.html);
                $('.post-content').append(html);
            }
        }
    });
});
