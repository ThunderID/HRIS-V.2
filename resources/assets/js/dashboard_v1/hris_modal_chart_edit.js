; var hris_modal_chart_edit = {

    init: function(){
        $('#chart_edit').on('show.bs.modal', function (e) {
            var id          = $(e.relatedTarget).attr('data-id');
            var title       = $(e.relatedTarget).attr('data-title');
            var parent      = $(e.relatedTarget).attr('data-parent');
            var parentid    = $(e.relatedTarget).attr('data-parentid');
            var name        = $(e.relatedTarget).attr('data-name');
            var department  = $(e.relatedTarget).attr('data-department');
            var action      = $(e.relatedTarget).attr('data-action');

            $('.mod_id').val(id);
            $('.modal_title').html(title);
            $('.modal_parent').val(parent);
            $('.modal_chart_id').val(parentid);
            $('.modal_name').val(name);
            $('.modal_department').val(department);
            $('.modal2').attr('action', action);
        }); 
    }
};

