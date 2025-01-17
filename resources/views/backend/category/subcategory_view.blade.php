@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Subcategory List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category</th>
								<th>SubCategory en</th>
								<th>SubCategory nl</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($subcategory as $item)
							<tr>
								<td>{{ $item['category']['category_name_en'] }}  </td>
								<td>{{ $item->subcategory_name_en }}</td>
                                <td>{{ $item->subcategory_name_nl }}</td>
								<td>
                                    <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger" id="delete">Delete</a>

                                </td>
							</tr>
							@endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->         
			</div>
			<!-- /.col -->


<!------------- Add Category Page ------------------->

<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add SubCategory </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method="post" action="{{ route('subcategory.store') }}">
                        @csrf

                            
                            <div class="form-group">
								<h5>Select Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
                                    @error('category_id')
								        <span class="text-danger">{{ $message}}</span>
								    @enderror
								</div>
							</div>

                            <div class="form-group">
								<h5>Sub Category English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subcategory_name_en" class="form-control">
								@error('subcategory_name_en')
								<span class="text-danger">{{ $message}}</span>
								@enderror
								</div>
							</div>    


                            <div class="form-group">
								<h5>Sub Category Dutch <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subcategory_name_nl" class="form-control">
								@error('subcategory_name_nl')
								<span class="text-danger">{{ $message}}</span>
								@enderror
								</div>
							</div>  

                            

						<div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
						</div>
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->         
			</div>
			<!-- /.col -->  







		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>


@endsection