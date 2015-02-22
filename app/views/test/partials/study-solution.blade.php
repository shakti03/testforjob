<div id="studysolution" class="modal modal-wide fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Study solution</h4>
      </div>
      <div class="modal-body">
        <img id="solutionImg" src="" >
        <input name="hide_qid" type="hidden"/>
        <input name="hide_uid" type="hidden"/>
        <!-- Discussion forum comments -->
        <div class="show-discussion" style="display:none;">
          <div class="show-discuss-comments">

          </div>
          <div class="edit-discuss-comment">
            <label for="comment">Comment:</label>
            <textarea  id="txt_comment" class="form-control" rows="5"></textarea>
            <button id="submit_comment" type="button" class="btn btn-md btn-primary">Comment</button>    
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="show_discussion" type="button" class="btn btn-primary">Discussion Forum</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->