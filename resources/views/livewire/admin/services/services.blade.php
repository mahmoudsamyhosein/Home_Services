<div>
    <style>
        nav svg{
            height: 20px;
        }
        svg{
            
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1> Services </h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li> Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Services
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add_service')}}" class="btn btn-info pull-right">Add Service Category </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="panel-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <table class="table table-stripd">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td><img src="{{asset('images/services/thumbnails')}}/{{$item->thumbnail}}" alt="{{$item->name}}" width="120"></td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                @if($item->status)
                                                    Active                                                    
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>{{$item->created_at}}</td>

                                            <td>
                                                <a href="#" onclick="confirm('Are you sure, you want to delete this service?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteService({{$item->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                <a href="{{route('admin.edit_service',['service_slug'=>$item->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        {{$services->links()}}
                        </div>
                    </div>
                </div>        
            </div>           
        </div>
    </section>
</div>

