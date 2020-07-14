@extends('admin.theme.layouts.app')  
@section('content')

   <section class="content-partner">
		<div class="container">
			<div class="row">
					
				<div class="col-sm-12">
				<div class="col-sm-12">
				<div class="progress" style="height:40px;">
    <div class="progress-bar bg-success" style="width:30%; font-size:20px;">
    1. Upload File
    </div>
    <div class="progress-bar bg-secondary" style="width:30%; font-size:20px;">
     2. Map Fields
    </div>
    <div class="progress-bar bg-secondary" style="width:40%; font-size:20px;">
      3. Save Records
    </div>
  </div>											
				</div><br>
					<h2>Import File</h2>
					<div class="my-address">
						<div class="edit-account">
							 <form class="form-horizontal" method="POST" action="{{ route('admin.import.process') }}">
    {{ csrf_field() }}
<input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />
    <table class="table">
        @foreach ($csv_data as $row)
            <tr>
            @foreach ($row as $key => $value)
                <td>{{ $value }}</td>
            @endforeach
            </tr>
        @endforeach
        <tr>
            @foreach ($csv_data[0] as $key => $value)
                <td>
                    <select name="fields[{{ $key }}]">
                        @foreach (config('app.db_fields') as $db_field)
                            <option value="{{ $loop->index }}">{{ $db_field }}</option>
                        @endforeach
                    </select>
                </td>
            @endforeach
        </tr>
    </table>

    <button type="submit" class="btn btn-primary">
        Import Data
    </button>
</form>
			</div>
			</div>
			</div>
		</div>
	</div>
</section>







@endsection