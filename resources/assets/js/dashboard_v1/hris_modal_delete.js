; var hris_modal_delete = {

    init: function(){
        $('#organisation_del').on('show.bs.modal', function (e) {
            var id      = $(e.relatedTarget).attr('data-id');
            var title   = $(e.relatedTarget).attr('data-title');
            var effect  = $(e.relatedTarget).attr('data-effect');
            var action  = $(e.relatedTarget).attr('data-action');

            $('.mod_id').val(id);
            $('.modal_title').html(title);
            $('.modal_effect').html(effect);
            $('.modal1').attr('action', action);
        }); 
    }
};

