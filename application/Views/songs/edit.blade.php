@extends ('base')


@section ('content')


<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Add a song
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="/updatesong/{{$song->id}}" method="POST">
                        <div class="form-row">
                            <div class="col-4">
                                <input type="text" name="artist" class="form-control" placeholder="" value="{{$song->artist}}">
                            </div>
                            <div class="col">
                                <input type="text" name="track" class="form-control" placeholder="" value="{{$song->track}}">
                            </div>
                            <div class="col">
                                <input type="text" name="link" class="form-control" placeholder="" value="{{$song->link}}">
                            </div>
                            <button class="btn btn-primary" type="submit" name="submit_update_song">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection