<a href="#" data-toggle="modal" data-taget="#deleteModal" data-userid="{{ $user['id] ]}}">Eliminar<i class="fa fa-trash-alt"></i></a>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Esta seguro de eliminar esto?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            </div>
                            <div class="modal-body">Seleccione "Eliminar"</div>
                            <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <form method="post" action="">
                            @method('DELETE')
                            @csrf
                                <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Eliminar</a>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>


@section('js_user_page')

    <script>
        $('#deleteModal').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var user_id = button.data('userid')

            var modal = $(this)
            modal.find('form').attr('action','/users/' + user_id)
        })
    </script>

@show