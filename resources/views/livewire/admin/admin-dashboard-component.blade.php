<div>
    <h1>Admin Dashboard</h1>
</div>
<div>
    <style>
        h2 {
        text-align: center;
        }

        .p {
        text-align: center;
        padding-top: 130px;
        }
    </style>
    <div class="container">
      </div>
      <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Add Service Category</h4>
            </div>
            <div class="modal-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
              <form class="form-horizontal">
                  @csrf
                  <div class="form-group">
                      <label for="name" class="control-label col-sm-3">Category Name:</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" wire:keyup='generatslug'>
                          @error('name') <p class="text-danger">{{$message}}</p>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="slug" class="control-label col-sm-3">Category Slug:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="slug" wire:model='slug'>
                        @error('slug') <p class="text-danger">{{$message}}</p>

                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="control-label col-sm-3">Category Image:</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control-file" name="image" wire:model='image'>
                        @error('image') <p class="text-danger">{{$message}}</p>

                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</div>