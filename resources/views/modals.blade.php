<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">确认放入回收站</h4>
            </div>

            <div class="modal-body">
                <p>此项目将被放入回收站，可以在回收站找到它。</p>
                <p>确定要进行此操作吗？</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取 消</button>
                <a class="btn btn-danger btn-ok">删 除</a>
            </div>
        </div>
    </div>
</div>


<script>
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<div class="modal fade" id="confirm-restore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">确认放回原处</h4>
            </div>

            <div class="modal-body">
                <p>此项目将被放回原处，可以在管理界面重新看到它。</p>
                <p>确定要进行此操作吗？</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取 消</button>
                <a class="btn btn-danger btn-ok">还 原</a>
            </div>
        </div>
    </div>
</div>


<script>
    $('#confirm-restore').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<div class="modal fade" id="confirm-perm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">确认永久删除</h4>
            </div>

            <div class="modal-body">
                <p>此项目将被永久删除，过程不可逆，删除后将无法恢复。</p>
                <p>确定要进行此操作吗？</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取 消</button>
                <a class="btn btn-danger btn-ok">永久删除</a>
            </div>
        </div>
    </div>
</div>


<script>
    $('#confirm-perm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>