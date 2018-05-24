@extends ('base')


@section ('content')


<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Edit song
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{--<form action="/updatesong/{{$song->id}}" method="POST">--}}
                        <div class="form-row">
                            <div class="col-4">
                                <input type="text" id="artist" name="artist" class="form-control" placeholder="" value="">
                            </div>
                            <div class="col">
                                <input type="text" id="track" name="track" class="form-control" placeholder="" value="">
                            </div>
                            <div class="col">
                                <input type="text" id="link" name="link" class="form-control" placeholder="" value="">
                            </div>
                            <button class="btn btn-primary" type="button" id="updateSong">Update</button>
                        </div>
                    {{--</form>--}}
                </div>
                <div id="message"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function getSongData()
        {
            $.ajax({
                url: '{{ route('api.edit.song', ['song_id' => $song]) }}',
                contentType: "application/json",
                success: function(data) {
                    data = JSON.parse(data);
                    $('#artist').val(data.artist);
                    $('#track').val(data.track);
                    $('#link').val(data.link);
                }
            });
        }

        $(document).ready(function () {
           getSongData();
        });

        $('#updateSong').click(function() {
            var artist = $('#artist').val();
            var track = $('#track').val();
            var link = $('#link').val();
            $.ajax({
                type: "post",
                url: '{{route('api.update.song', ['song_id' => $song])}}',
                data: ({artist: artist, track: track, link: link}),

                success: function(response) {
                    window.location.replace('/songs');
                }
            });
        });

    </script>
@endsection