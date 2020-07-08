<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST" id="adminDataDeleteForm">
        @method('DELETE')
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteLabel">Delete {{$title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this {{$title}} & related all the other information?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">Yes</button>
          </div>
        </div>
    </form>
  </div>
</div>