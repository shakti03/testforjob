<!-- Modal -->
<div class="modal fade" id="testCompleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header"  style="background:beige;">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h2 class="modal-title" id="myModalLabel">Congratulation! Your test has completed suvccessfully.</h2>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div id="modalStatisticsPart" style="font-size:16px">
                    </div>
                </div>
                <div class="col-md-8">
                    <style type="text/css">canvas{ position: absolute; z-index: 1;  }</style>
                    <div id="modalChartContainer" style="width:400px;height: 400px;position: relative;margin: 0 auto;">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"  style="background:beige;">
            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function(){
})
</script>