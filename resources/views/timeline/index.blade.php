@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="#" method="post" role="form">
                <div class="form-group">
                    <textarea name="status" id="status" cols="30" rows="2" placeholder="What's up Waleed?" class="form-control"></textarea>
                </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Status</button>
                <br>
            </form>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>test</h4>
        </div>
    </div>
@endsection
