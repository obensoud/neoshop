
<div class="container">
<div class="" id="tchat">
    
</div>


<div class="btn-group dropup">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon glyphicon-cog"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu pull-right" role="menu">
        <li><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Nouveau</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Tout Close</a></li>
        <li class="divider"></li>
        <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> invisible</a></li>
    </ul>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">La liste des Users connectés: </h4>
    </div>
    <div class="modal-body">
        <table class="table" id="manageTchatTable">
            <thead>
                <tr>                            
                    <th>Les users connectés</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
  </div>
  
</div>
</div>

</div>