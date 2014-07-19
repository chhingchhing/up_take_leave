<!-- Modal For add new and edit employee -->
<div class="modal fade" id="clickNewEditEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" role="form" action="application/controllers/departments/save.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Departement Information</h4>
      </div>
      <div id="feedback_error_modal"></div>
      <div class="modal-body modal-detail-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save" id="btnSaveEmployee" name="btnSaveEmployee" />
      </div>
      </form>
    </div>
  </div>
</div>